import requests
import time

r = requests.get('http://iot.dei.estg.ipleiria.pt/api/api.php?sensor=btc')
#print(str(r.status_code))

while True:
	if int(r.status_code) == 200:
		print(time.strftime("%Y-%m-%d %H:%M:%S ") + r.text)
	else:
		print("ERRO: r",r.status_code)

	time.sleep(2)
