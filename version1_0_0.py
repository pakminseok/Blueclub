from Tkinter import *
import time
import csv
import Tkinter
import tkMessageBox
#from sql import *
import pymysql.cursors
matrix = []
 
f= open('carA.log.csv', 'r')
csvReader = csv.reader(f)
for row in csvReader:
    matrix.append(row)
f.close()

root = Tk()
root.geometry("400x400")
Label(root, text="Velocity").grid(row=0)
Label(root, text="Latitude").grid(row=1)
Label(root, text="Longitude").grid(row=2)
Label(root, text="Impulse").grid(row=3)


count = 1
label = Label(root, text = str(matrix[count][7]))
label.grid(row=0, column=1)
label2 = Label(root, text = str(matrix[count][5]))
label2.grid(row=1, column=1)
label3 = Label(root, text = str(matrix[count][6]))
label3.grid(row=2, column=1)
label4 = Label(root, text = str(matrix[count][15]))
label4.grid(row=3, column=1)

def AccidentReport(count):
    carID = str(matrix[count][1])
    accidentdata = matrix[count][2]
    hour = int(matrix[count][3]) / 10000
    minute =(int(matrix[count][3]) - hour*10000)/ 100
    second = int(matrix[count][4])+int(matrix[count][3]) - (hour*10000) - (minute*100)

    connection = pymysql.connect(host='127.0.0.1', user='root', password='apmsetup', db='hackathon', cursorclass=pymysql.cursors.DictCursor)
    try:
        with connection.cursor() as cursor:
        # Create a new record
            sql="INSERT INTO acc(CarID, AccDate, AccHour, AccMinute, AccSeconds,OppositeValue, AccLatitude, AccLongitude,Road, City, Town, ModelYear, ModelCode,report) VALUES('"+carID+"','"+accidentdata+"','"+str(hour)+"','"+str(minute)+"','"+str(second)+"','jjjjj','"+matrix[count][5]+"','"+matrix[count][6]+"','"+matrix[count][11]+"','"+matrix[count][9]+"','"+matrix[count][10]+"','"+matrix[count][13]+"','"+matrix[count][14]+"','yes')"
            cursor.execute(sql)
            # connection is not autocommit by default. So you must commit to save
            # your changes.
        connection.commit()
    finally:
        connection.close()


def messagebox(impulse, count):
    if impulse > 0:
            answer = tkMessageBox.askquestion('Accident Report', 'Do you want to report this accident?')
            if answer == 'yes':
                print AccidentReport(count)
            else:
                answer_repeatly = tkMessageBox.askquestion('Hit And Run??', 'Do not you want to report this accident? \n If you choose yes, you may be suspected as Hit And Run!!')
                if answer_repeatly == 'yes' :
                    print 'hit and run'
                else:
                    messagebox(impulse,count)
    

def countup(count):
    count += 1
    label['text'] = str(matrix[count][7])
    label2['text'] = str(matrix[count][5])
    label3['text'] = str(matrix[count][6])
    label4['text'] = str(matrix[count][15])
    messagebox(int(matrix[count][15]), count)
                    
    if count < len(matrix)-1:
        root.after(1000, countup, count)
            

root.after(1000, countup, count)
root.mainloop()
