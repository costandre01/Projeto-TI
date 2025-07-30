import time
import RPi.GPIO as GPIO
GPIO.setmode(GPIO.BCM)
channel = 2
GPIO.setup(channel, GPIO.OUT)

while True:
	GPIO.output(channel, GPIO.HIGH)
	time.sleep(1)
	GPIO.output(channel, GPIO.LOW)
	time.sleep(1)
