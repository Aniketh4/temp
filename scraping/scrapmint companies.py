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

# URL of the webpage
url = "https://www.livemint.com/companies"

# Send an HTTP request to the URL
response = requests.get(url)

# Check if the request was successful
if response.status_code == 200:
    # Parse the HTML content of the webpage
    soup = BeautifulSoup(response.content, "html.parser")

    # Lists to store extracted information
    simgs = []
    titles = []
    urls = []

    # Find all divs with class="listtostory clearfix"
    divs = soup.find_all("div", class_="listtostory clearfix")

    # Iterate through each div
    for div in divs:
        # Find divs with class "thumbnail"
        thumbnail_divs = div.find_all("div", class_="thumbnail")
        for thumbnail_div in thumbnail_divs:
            # Find anchor tags inside thumbnail divs
            anchor_tag = thumbnail_div.find("a")
            if anchor_tag:
                # Find img tag inside anchor tag and append its src to simgs list
                img_tag = anchor_tag.find("img")
                if img_tag:
                    simgs.append(img_tag['src'])

        # Find h2 tags with class "headline" and extract text and href from anchor tags inside
        h2_tags = div.find_all("h2", class_="headline")
        for h2_tag in h2_tags:
            anchor_tag = h2_tag.find("a")
            if anchor_tag:
                titles.append(anchor_tag.text.strip())
                ur="https://www.livemint.com/" + anchor_tag['href']
                urls.append(ur)

    # Print the extracted information
    print("Image URLs:", simgs)
    print("Titles:", titles)
    print("URLs:", urls)
    print(len(titles),len(simgs),len(urls))

else:
    print("Failed to fetch the webpage:", response.status_code)

desc_list = []
pic_list=[]


for url in urls:
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

print(desc_list[0],pic_list[0])


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
        for i in range(1, 15):
                update_query = """
                    UPDATE news
                    SET Title = %s, Description = %s, Sphoto = %s, Lphoto = %s
                    WHERE Type = %s AND Num = %s
                """
                values = (titles[i-1], desc_list[i-1], simgs[i-1], pic_list[i-1], 'Finance', i+7)
                cursor.execute(update_query, values)

        # Commit the changes
        connection.commit()

finally:
    # Close the connection
    connection.close()
