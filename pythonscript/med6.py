#!/usr/bin/python

import requests

import json

import MySQLdb


db1 = db = MySQLdb.connect("localhost","root","password","sample")
cursor1 = db1.cursor()


count = 1

years = ["2010","2011","2012","2013","2014"]
months = {"Q1":"01","Q2":"02","Q3":"03","Q4":"04"}

for year in years:
	for key,value in months.iteritems():
		
		sql2 = 'insert INTO sample.calender (CalenderKey, Quarter, year) values (%s,"%s","%s")' % (count,key,str(year))
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
		print str(count)
		
db1.close()





