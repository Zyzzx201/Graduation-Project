import glob
import cv2
import mysql
import numpy as np
from mysql.connector import Error
import os
from PIL import Image
import base64
import io
import PIL.Image

#from database
def TrafficDec():
    try:
        connection = mysql.connector.connect(host='localhost',
                                 database='graduation',#gp
                                 user='root',
                                 password='')
        if connection.is_connected():
           db_Info = connection.get_server_info()
           print("Connected to MySQL database... MySQL Server version on ",db_Info)

           cursor = connection.cursor()
           cursor.execute("select database();")
           record = cursor.fetchone()
           print ("Your connected to - ", record)

           sql_select_Query = "SELECT image FROM dataset ORDER BY ID DESC LIMIT 1"
           cursor = connection.cursor()
           cursor.execute(sql_select_Query)
           records = cursor.fetchall()
           print("Total number of rows in python_developers is : ", cursor.rowcount)
           num = 0
           num2=0
           files = glob.glob("C:/new_xampp/htdocs/gp2/pos/*.jpg")
           num_samples = len(files)
           print("number of images ", num_samples)


           for row in records:
               # Load image from database
               num = 0
               data1 = base64.b64decode(row[0])
               file_like = io.BytesIO(data1)
               print(file_like)
               img = PIL.Image.open(file_like)
               img.save("userimage.png", "PNG")

               image = cv2.imread("userimage.png")
               # cv2.imshow("n", image)
               # cv2.waitKey(0)

           img_id = 'SELECT id FROM dataset ORDER BY ID DESC LIMIT 1'
           #
           cursor2 = connection.cursor(prepared=True)
           cursor2.execute(img_id)
           records = cursor2.fetchall()
           for row in records:
               x = row[0]
               print(x)
           for myFile in files:
               temp = cv2.imread(myFile, cv2.IMREAD_GRAYSCALE)
               image2 = cv2.imread("userimage.jpg", cv2.IMREAD_GRAYSCALE)
               image2_rgb = cv2.imread('userImage.jpg')
               surf = cv2.xfeatures2d.SURF_create()
               kp1, des1 = surf.detectAndCompute(temp, None)
               kp2, des2 = surf.detectAndCompute(image, None)
               index_params = dict(algorithm=0, trees=5)
               search_params = dict()
               flann = cv2.FlannBasedMatcher(index_params, search_params)
               matches = flann.knnMatch(des1, des2, k=2)
               good_points = []
               for m, n in matches:
                   if m.distance < 0.7 * n.distance:  # distance is for how good is the match comparing the distances
                       good_points.append(m)
                       print(good_points)

               # img3=cv2.drawMatches(img,kp1,img2,kp2,good_points,img2)



               # Homography
               if len(good_points) > 3:  # if the good points is greater than 10 it will draw the homography
                   print("found a traffic light")
                   query_pts = np.float32([kp1[m.queryIdx].pt for m in good_points]).reshape(-1, 1,
                                                                                             2)  # queryIdx is for extracting the position of good points
                   train_pts = np.float32([kp2[m.trainIdx].pt for m in good_points]).reshape(-1, 1, 2)
                   matrix, mask = cv2.findHomography(query_pts, train_pts, cv2.RANSAC,
                                                     5.0)  # extract the points and put it into list
                   matches_mask = mask.ravel().tolist()
                   # Perspective transform
                   h, w = temp.shape
                   pts = np.float32([[0, 0], [0, h], [w, h], [w, 0]]).reshape(-1, 1, 2)
                   dst = cv2.perspectiveTransform(pts, matrix)
                   homography = cv2.polylines(image2_rgb, [np.int32(dst)], True, (255, 0, 0), 3)

                   #update in the database
                   cursor = connection.cursor(prepared=True)
                   sql_select_Query = """UPDATE `dataset` SET `result1_id`=%s where id= %s """

                   result1_id = 1
                   id = x
                   input = (result1_id, id)
                   cursor.execute(sql_select_Query, input)

                   connection.commit()

                   # cv2.imshow("Homography", homography)
                   break
               else:
                   # cv2.imshow("Homography", img2)
                   # update in the database
                   cursor = connection.cursor(prepared=True)
                   sql_select_Query = """UPDATE `dataset` SET `result1_id`=%s where id= %s """

                   result1_id = 2
                   id = x
                   input = (result1_id, id)
                   cursor.execute(sql_select_Query, input)

                   connection.commit()
                   # print("hena")











    except Error as e :
        print ("Error while connecting to MySQL", e)
    finally:
        #closing database connection.
        if(connection.is_connected()):
            cv2.destroyAllWindows()
            cursor.close()
            connection.close()
            print("MySQL connection is closed")

    # cv2.waitKey(0)
    return (result1_id)
print(TrafficDec())