from math import e
from bs4 import BeautifulSoup
import requests

url = "https://www.hindustantimes.com/lifestyle"
headers = {
    "User-Agent": "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36"
}

try:
    response = requests.get(url, headers=headers)
    response.raise_for_status()
    soup = BeautifulSoup(response.text, 'html.parser')
    hdg3_elements = soup.find_all(class_='hdg3')
    img_tags = soup.find_all('img', class_='lazy')
    img_tags = img_tags[4:]
    hdg3_elements = hdg3_elements[1:]
    img_tags = img_tags[:20]
    hdg3_elements = hdg3_elements[:20]

    urls = []  # List to store extracted URLs
    bigimg = []  # List to store image src from <picture> tag
    Desc_list = []  # List to store description for each URL
    headings=[]
    smallimg=[]
    for i in range(1,len(img_tags)):
        if i < len(hdg3_elements):
            hdg3_text = hdg3_elements[i].text.strip()
            print("Heading:", hdg3_text)
            headings.append(hdg3_text)
            # Extracting <a> tags inside hdg3 element
            a_tags = hdg3_elements[i].find_all('a')
            for a_tag in a_tags:
                link = a_tag.get('href')
                # Check if the link is a relative URL
                if link.startswith('/'):
                    urls.append("https://www.hindustantimes.com" + link)
                else:
                    urls.append(link)
                print("URL:", urls[-1])
                
                # Navigate to the URL
                url_response = requests.get(urls[-1], headers=headers)
                url_response.raise_for_status()
                url_soup = BeautifulSoup(url_response.text, 'html.parser')
                
                # Find <div class="storyParagraphFigure">
                story_paragraph_figure = url_soup.find('div', class_='detail')
                if story_paragraph_figure:
                    # Find <picture> tag within storyParagraphFigure
                    picture_tag = story_paragraph_figure.find('picture')
                    if picture_tag:
                        img_src = picture_tag.find('img').get('src')
                        bigimg.append(img_src)
                        print("Big Image src:", img_src)
                    
                    # Extract all <p> and <h2> tags within storyParagraphFigure
                    paragraph_elements = story_paragraph_figure.find_all(['p', 'h2'])
                    description = '\n\n'.join(tag.text.strip() for tag in paragraph_elements)
                    Desc_list.append(description)
                else:
                    bigimg.append("assets/img/clock.png")
                    Desc_list.append("SOMETHING WENT WRONG")

        if i < len(img_tags):
            img_src = img_tags[i].get('data-src')
            smallimg.append(img_src)

    print(len(headings),len(smallimg),len(Desc_list),len(bigimg))

except:
    print("error")

import pymysql
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
        for i in range(1,20):
                update_query = """
                    UPDATE news
                    SET Title = %s, Description = %s, Sphoto = %s, Lphoto = %s
                    WHERE Type = %s AND Num = %s
                """
                values = (headings[i-1], Desc_list[i-1], smallimg[i-1], bigimg[i-1],'Lifestyle', i)
                cursor.execute(update_query, values)

        # Commit the changes
        connection.commit()

finally:
    # Close the connection
    connection.close()
