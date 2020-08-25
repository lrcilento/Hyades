import time
from time import sleep
import RPi.GPIO as GPIO

motorLeft = 37
motor2Right = 33

GPIO.setmode (GPIO.BOARD)
GPIO.setup(motorLeft, GPIO.OUT)
GPIO.setup(motor2Right, GPIO.OUT)

try:
	GPIO.output(motorLeft, GPIO.HIGH)
	GPIO.output(motor2Right, GPIO.HIGH)
	sleep(4.65)
	GPIO.output(motorLeft, GPIO.LOW)
	sleep(1.25)
	GPIO.output(motor2Right, GPIO.LOW)
finally:
	print('Window closed!')
