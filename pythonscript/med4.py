#!/usr/bin/python

import requests

import json

import MySQLdb

db = MySQLdb.connect("localhost","root","password","medicine_test")
cursor = db.cursor()

# sql = "SELECT * FROM medicine_test.t_medname "
sql = "SELECT * FROM medicine_test.medicine"
cursor.execute(sql)

data = cursor.fetchall()

# for row in data:
print len(data)

db1 = db = MySQLdb.connect("localhost","root","password","sample")
cursor1 = db1.cursor()

sql1 = "SELECT * FROM sample.medicine"
cursor1.execute(sql1)
data1 = cursor1.fetchall()
# print data1
count = 0
for value in data:
	med_name = value[1]
	med_id = value[0]
	cat= value[4]
	gid = value[6]
	sql2 = 'insert INTO sample.medicine (MedicineKey, medicine_id, medicine_name, generic_id, category_type) VALUES (%s,%s,"%s","%s","%s")' % (med_id,med_id,med_name,gid,cat)
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
	# break
	count = count +1
	print value[1] + str(count)        


# for key, value in manuf.iteritems():
# 	print "value => " + key
# 	sql_1 = 'insert into manufacturer (manufacturer_name,street,city,zip,state,country) values ("%s","%s","%s","%s","%s","%s")' % (key,"UNKNOWN","UNKNOWN","UNKNOWN","UNKNOWN","India")
# 	try:
# 	   # Execute the SQL command
# 	   cursor.execute(sql_1)
# 	   # Commit your changes in the database
# 	   db.commit()
# 	   print "insert success buddy";
# 	except MySQLdb.Error, e:
# 	    try:
# 	    	db.rollback()
# 	    	print "insert failed buddy for " + str(sql_1)
# 	        print "MySQL Error [%d]: %s" % (e.args[0], e.args[1])
# 	    except IndexError:
# 	        print "MySQL Error: %s" % str(e)

# # print manuf	

db.close()
db1.close()





