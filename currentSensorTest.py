import RPi.GPIO as GPIO

currentSensor = 29

GPIO.setmode(GPIO.BOARD)

GPIO.setup(currentSensor, GPIO.IN)

print(GPIO.input(currentSensor))

GPIO.cleanup()
