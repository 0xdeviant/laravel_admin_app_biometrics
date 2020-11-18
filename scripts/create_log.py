
#!/usr/bin/python

import mysql.connector as mysql
from datetime import datetime

def connect(id, direction):
	user = "bio"
	password = "password1"
	host = "localhost"
	database = "biometrics"  

	conn = mysql.connect(user=user, password=password, host=host, database=database)

	if conn:
		print('Connected!')
		# Get the ID information [ firstname, lastname ]
		sql = "SELECT * FROM people WHERE id=%s"
		cursor_select = conn.cursor()
		cursor_select.execute(sql, (id, ))
		data = cursor_select.fetchall()
		
		if len(data) > 0:

			print(data[0][0])
		# Insert new data to logs
			sql = "INSERT INTO logs (userid, fname, lname, direction, created_at) VALUES (%s, %s,%s, %s, %s)"
			cursor = conn.cursor()	
	
			cursor.execute(sql,(id, data[0][1], data[0][2], direction, datetime.now()))

			conn.commit()
		conn.close()
		
		return
	
	print('Failed')


if __name__ == '__main__':
	connect()
	
	
