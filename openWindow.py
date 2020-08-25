import time
from time import sleep
import RPi.GPIO as GPIO

motorRight = 35
motor2Left = 31

GPIO.setmode (GPIO.BOARD)
GPIO.setup(motorRight, GPIO.OUT)
GPIO.setup(motor2Left, GPIO.OUT)

try:
	GPIO.output(motorRight, GPIO.HIGH)
	GPIO.output(motor2Left, GPIO.HIGH)
	sleep(4.95)
	GPIO.output(motor2Left, GPIO.LOW)
	sleep(0.05)
	GPIO.output(motorRight, GPIO.LOW)
finally:
	print('Window opened!')
