import time
from time import sleep
import RPi.GPIO as GPIO
import getWindowStatus

windowStatus = getWindowStatus.windowStatus()
rainSensor = 11
motorLeft = 37
motor2Right = 33
GPIO.setmode (GPIO.BOARD)
GPIO.setup(rainSensor, GPIO.IN)
GPIO.setup(motorLeft, GPIO.OUT)
GPIO.setup(motor2Right, GPIO.OUT)
GPIO.output(motor2Right, GPIO.LOW)
GPIO.output(motorLeft, GPIO.LOW)
print(windowStatus)
try:
	while True:
		if(GPIO.input(rainSensor) == GPIO.LOW and windowStatus == 0):
			print('Closing!')
			GPIO.output(motorLeft, GPIO.HIGH)
			GPIO.output(motor2Right, GPIO.HIGH)
			sleep(4.65)
			GPIO.output(motorLeft, GPIO.LOW)
			sleep(1.25)
			GPIO.output(motor2Right, GPIO.LOW)

			windowStatus = getWindowStatus.windowStatus()
			sleep(6000)
finally:
	GPIO.cleanup()
