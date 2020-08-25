import RPi.GPIO as GPIO

def windowStatus():
	try:
		currentSensor = 29

		GPIO.setmode(GPIO.BOARD)

		GPIO.setup(currentSensor, GPIO.IN)

		return GPIO.input(currentSensor)
	finally:
		GPIO.cleanup()
