#!/usr/bin/python

import requests

import MySQLdb

data = None
finalarry = []
db = None
medname = {}
alph = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z']
db = MySQLdb.connect("localhost","root","password","medicine_test")
cursor = db.cursor()

for letter in alph:
	print "getting for" + letter
	global data
	global finalarry
	url = 'http://www.truemd.in/api/typeahead.json?id='+letter+'&key=yash6992&limit=100099'
	r = requests.get(url)
	print r.status_code
	if r.ok:
		print "request ok for " + letter;
		# print   r.text
		data = r.json()
		finalarry = list(set(finalarry) | set(data))
		print "len of final array after letter "+ letter + "   len is " +  str(len(finalarry))
	else:
		print "request failed for letter " +  letter


for val in finalarry:
	medname[val] = 1
	sql = 'insert into med (med_name) values( "%s")' % (val)
	try:
	   # Execute the SQL command
	   cursor.execute(sql)
	   # Commit your changes in the database
	   db.commit()
	   print "insert success buddy";
	except MySQLdb.Error, e:
	    try:
	    	db.rollback()
	    	print "insert failed buddy"
	        print "MySQL Error [%d]: %s" % (e.args[0], e.args[1])
	    except IndexError:
	        print "MySQL Error: %s" % str(e)
	   # Rollback in case there is any error

# disconnect from server
db.close()


print "len of hash " + str(len(medname))
print "End!"