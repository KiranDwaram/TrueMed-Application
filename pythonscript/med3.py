#!/usr/bin/python

import requests

import json

import MySQLdb

db = MySQLdb.connect("localhost","root","password","medicine_test")
cursor = db.cursor()

# sql = "SELECT * FROM medicine_test.t_medname "
sql = "SELECT * FROM medicine_test.t_medname"
cursor.execute(sql)

data = cursor.fetchall ()

# for row in data:
print len(data)
cnt = 0
manuf = {}
for row in data:
	print "get details for " + row[1]
	cnt = cnt + 1
	print cnt
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
			# print "med =>  " + medicine['brand']
			# print "manu  => " + medicine['manufacturer']
			sql_manu = 'select manufacturer_id from manufacturer where manufacturer_name = "%s"' % (medicine['manufacturer'])
			cursor.execute(sql_manu)
			data1 = cursor.fetchall()
			med_name = medicine['brand']
			category = medicine['category']
			manu_id = 1
			if data1[0][0] is not None:
				manu_id = data1[0][0]
			gid = medicine['generic_id']
			sql_med = 'insert into medicine (name,category,manufacturer_id,generic_id) values ("%s","%s","%s","%s")' % (med_name,category,manu_id,gid)
			try:
			    affected_count = cursor.execute(sql_med)
			    db.commit()
			    print "medicine affected count" + str(affected_count)
			except MySQLdb.IntegrityError:
			    print("failed to insert values "  )
			current_med_id = cursor.lastrowid
			package_price = medicine['package_price']
			package_qty= medicine['package_qty']
			package_type = medicine['package_type']
			package_price = medicine['package_price']
			unit_price = medicine['unit_price']
			unit_qty = medicine['unit_qty']
			unit_type = medicine['unit_type']
			metric_sql = 'insert into metrics (pckg_qty,pckg_type,pckg_price,unit_qty,unit_type,medicine_id) values ("%s","%s","%s","%s","%s",%s)' % (package_qty,package_type,package_price,unit_qty,unit_type,current_med_id)
			try:
				affected_count = cursor.execute(metric_sql)
				db.commit()
				print "metric affected count" + str(affected_count)
			except MySQLdb.IntegrityError:
			    print("failed to insert values "  )
			for cons in constituents:
				if cons is not None:
					print cons
					generic_id = cons['generic_id']
					cname = cons['name']
					cqty = cons['qty']
					strength = cons['strength']
					cons_sql = 'insert into constituents (name,strength,qty,generic_id,medicine_id) values("%s","%s","%s","%s",%s) ' % (cname,strength,cqty,generic_id,current_med_id)
					try:
						affected_count = cursor.execute(cons_sql)
						db.commit()
						print "constituent affected count" + str(affected_count)
					except MySQLdb.IntegrityError:
						print("failed to insert values ")
					# print constituents
					# print json_data['status'] 	
		else:
			print "No details for " + row[1]
	else:
		print "request not ok"