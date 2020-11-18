#!/usr/bin/python
import sys
import serial
from create_log import connect
from time import sleep

ser = serial.Serial('/dev/ttyACM0', 9600, timeout=1)
ser.flush()

data = sys.argv[1]

response = ''

while response == '':
	ser.write(str(data).encode('utf-8'))
	sleep(0.5)	
	response = ser.readline().decode('utf-8').rstrip()
	print("Sent from arduino: {} ".format(response))

	if response != '':	
		if data == '1':
			print('ID: ', response)
			connect(response, "IN")
			ser.flush()
			break
		if data[0] == '2':
			pass
		if data  == '4':
			print('ID: ', response)
			connect(response, "OUT")
			ser.flush()
			break
		
ser.flush()
sys.exit(0)
