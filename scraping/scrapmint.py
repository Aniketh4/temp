def remove_non_bmp_in_place(string):
    # Convert the string into a list of characters for in-place modification
    char_list = list(string)
    
    # Iterate through each character in the input string
    i = 0
    while i < len(char_list):
        # Check if the character is within the BMP range
        if ord(char_list[i]) > 0xFFFF:
            # If it's outside the BMP range, remove it from the list
            del char_list[i]
        else:
            # Move to the next character if it's within the BMP range
            i += 1
    
    # Convert the modified list back to a string
    modified_string = ''.join(char_list)
    
    # Return the modified string
    return modified_string


from warnings import catch_warnings
from bs4 import BeautifulSoup
import requests
import json
import pymysql

source = requests.get("https://www.livemint.com")
if source.status_code == 200:
    soup = BeautifulSoup(source.text, 'html.parser')

    # Find all script tags with type "application/ld+json"
    script_tags = soup.find_all('script', type='application/ld+json')

    # Check if there are at least 4 script tags of this type
    if len(script_tags) >= 4:
        # Get the content of the 4th script tag
        fourth_script_content = script_tags[3].string

        # Parse the JSON content
        if fourth_script_content:
            try:
                data = json.loads(fourth_script_content)

                # Access the 'itemListElement' key
                items = data.get('itemListElement')

                if items:
                    # Initialize lists to store names, descriptions, and URLs
                    names_list = []
                    descriptions_list = []
                    urls_list = []

                    # Iterate over each item in the list
                    for item in items:
                        # Extract name, description, and url
                        name = item.get('name')
                        description = item.get('description')
                        url = item.get('url')

                        # Append extracted information to respective lists
                        names_list.append(name)
                        descriptions_list.append(description)
                        urls_list.append(url)

                    # Print the extracted information
                    print("Names:", names_list)
                    print("Descriptions:", descriptions_list)
                    print("URLs:", urls_list)
                else:
                    print("No items found in 'itemListElement'.")
            except json.JSONDecodeError:
                print("Error: Unable to parse JSON content.")
        else:
            print("Content of the 4th script tag is empty.")
    else:
        print("There are not enough script tags with type 'application/ld+json'.")
else:
    print('Failed to retrieve the webpage. Status code:', source.status_code)
print()
print()
print()
print("dfs")

desc_list = []
pic_list=[]

for url in urls_list:
    try:
        response = requests.get(url)
        if response.status_code == 200:
            soup = BeautifulSoup(response.content, 'html.parser')
            
            # Find the first <picture> tag and get its src attribute
            picture_tag = soup.find('picture')
            if picture_tag:
                src = picture_tag.find('source').get('srcset') if picture_tag.find('source') else picture_tag.find('img').get('src')
                pic_list.append(src)
            else:
                print(f"No <picture> tag found in {url}.")
            
            main_area_div = soup.find('div', class_='mainArea')  # Change to search by class
            if main_area_div:
                paragraphs = main_area_div.find_all('p')  # Get all <p> tags
                desc_text = ''
                for paragraph in paragraphs:
                    if 'milestone' in paragraph.get('class', []):
                        break  # Stop appending when a <p> tag with class 'milestone' is reached
                    paragraph_text = paragraph.get_text(strip=True)
                    desc_text += paragraph_text + '\n\n'  # Add two line breaks after each paragraph
                desc_list.append(desc_text)
            else:
                print(f"No div with class 'mainArea' found in {url}.")
        else:
            print(f"Failed to retrieve {url}. Status code: {response.status_code}")
    except Exception as e:
        print(f"Error occurred while processing {url}: {str(e)}")

for i in range(len(desc_list)):
    desc_list[i]=remove_non_bmp_in_place(desc_list[i])

# Database connection parameters
host = 'tbf-db.chwiu8qak8lg.eu-north-1.rds.amazonaws.com'
port = 3306  # Default MySQL port
user = 'admin'
password = 'Aniketh2204'
database = 'test'

# Connect to the database
connection = pymysql.connect(host=host,
                            port=port,
                            user=user,
                            password=password,
                            database=database,
                            cursorclass=pymysql.cursors.DictCursor)

try:
    # Create a cursor object
    with connection.cursor() as cursor:
        # Iterate through the data and insert into the table
        for i in range(1, 8):
                update_query = """
                    UPDATE news
                    SET Title = %s, Description = %s, Sphoto = '', Lphoto = %s
                    WHERE Type = %s AND Num = %s
                """
                values = (names_list[i-1], desc_list[i-1], pic_list[i-1], 'Finance', i)
                cursor.execute(update_query, values)

        # Commit the changes
        connection.commit()

finally:
    # Close the connection
    connection.close()
