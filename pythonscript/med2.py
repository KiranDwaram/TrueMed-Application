#!/usr/bin/python

import requests

import json

import MySQLdb

db = MySQLdb.connect("localhost","root","password","medicine_test")
cursor = db.cursor()

# sql = "SELECT * FROM medicine_test.t_medname "
sql = "SELECT * FROM medicine_test.t_medname"
cursor.execute(sql)

data = cursor.fetchall()

# for row in data:
print len(data)

manuf = {}
for row in data:
	print "get details for " + row[1]
	url = 'http://www.truemd.in/api/medicine_details?id='+row[1]+'&key=yash6992'
	r = requests.get(url)
	if r.ok:
		print "request ok : status : " + str(r.status_code)
		res = r.json()
		# json_data = json.loads(r.text)
		print res
		if res['response']['medicine'] is not None:
			medicine =  res['response']['medicine']
			constituents =  res['response']['constituents']
			print "med =>  " + medicine['brand']
			print "manu  => " + medicine['manufacturer']
			manuf[medicine['manufacturer']] = 1
			# print constituents
			# print json_data['status']
		else:
			print "No details for " + row[1]
	else:
		print "request not ok"
	
print len(manuf)

for key, value in manuf.iteritems():
	print "value => " + key
	sql_1 = 'insert into manufacturer (manufacturer_name,street,city,zip,state,country) values ("%s","%s","%s","%s","%s","%s")' % (key,"UNKNOWN","UNKNOWN","UNKNOWN","UNKNOWN","India")
	try:
	   # Execute the SQL command
	   cursor.execute(sql_1)
	   # Commit your changes in the database
	   db.commit()
	   print "insert success buddy";
	except MySQLdb.Error, e:
	    try:
	    	db.rollback()
	    	print "insert failed buddy for " + str(sql_1)
	        print "MySQL Error [%d]: %s" % (e.args[0], e.args[1])
	    except IndexError:
	        print "MySQL Error: %s" % str(e)

# print manuf	

db.close()




