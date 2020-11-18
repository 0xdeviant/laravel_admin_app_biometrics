#!/usr/bin/python

import sys
import serial
from time import sleep

ser = serial.Serial('/dev/ttyACM0', 9600, timeout=1)
ser.flush()

data = sys.argv[1]
while True:
	ser.write(str(data).encode('utf-8'))
	response = ser.readline().decode('utf-8').rstrip()
	print("Sent from arduino: {} ".format(response))
	if (response):
		break
	
	sleep(1)
