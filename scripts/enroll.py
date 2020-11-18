#!/usr/bin/python

import serial
import sys
from time import sleep

ser = serial.Serial('/dev/ttyACM0', 9600)
ser.flush()

def getID():
	# send command code
	ser.write(str(sys.argv[1:]).encode('utf-8'))
	# send ID code
#	id = sys.argv[1]
#	print(id)
#	ser.write(str(id).encode('utf-8'))
	response = ser.readline().decode('utf-8').rstrip()
	print(response)


if __name__ == '__main__':
	getID()
