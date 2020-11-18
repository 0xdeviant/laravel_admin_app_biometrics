#!/usr/bin/python

import serial
import sys
from time import sleep

ser = serial.Serial("/dev/ttyACM0", 9600, timeout=1)
ser.flush()

id = sys.argv[1]
command = sys.argv[2]

while True:
	ser.write(str(id).encode('utf-8'))

	ser.write(str(command).encode('utf-8'))
	ser.flush()

	response = ser.readline().decode('utf-8').rstrip()
	sleep(1)


