#!/usr/bin/python

import requests

import json

import MySQLdb

db = MySQLdb.connect("localhost","root","password","medicine_test")
cursor = db.cursor()

# sql = "SELECT * FROM medicine_test.t_medname "
sql = "SELECT medicine_id ,manufacturer_id FROM medicine_test.medicine "
cursor.execute(sql)

data = cursor.fetchall()

# for row in data:
print len(data)

db1 =  MySQLdb.connect("localhost","root","password","sample")
cursor1 = db1.cursor()

sql_cal = "SELECT CalenderKey FROM sample.calender;"
cursor1.execute(sql_cal)
data_cal = cursor1.fetchall()



count = 1000
for value in data:
	med_id = value[0]
	man_id = value[1]
	for calkey in data_cal:
		sql2 = 'insert INTO sample.production ( Calenderkey, ManufacturerKey, MedicineKey,unitsManufactured) VALUES (%s,%s,%s,%s)'  % (calkey[0],man_id,med_id,count)
		try:
		   # Execute the SQL command
		   cursor1.execute(sql2)
		   # Commit your changes in the database
		   db1.commit()
		   print "insert success buddy";
		except MySQLdb.Error, e:
		    try:
		    	db1.rollback()
		    	print "insert failed buddy for " + str(sql2)
		        print "MySQL Error [%d]: %s" % (e.args[0], e.args[1])
		    except IndexError:
		        print "MySQL Error: %s" % str(e)
		count = count +1
		# break
	# break	      

db.close()
db1.close()





