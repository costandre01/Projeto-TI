import requests
import time
import RPi.GPIO as GPIO
GPIO.setmode(GPIO.BCM)
channel = 2
GPIO.setup(channel, GPIO.OUT)

print("prima control + C para terminar")

try:
    while True:
        try:
            r = requests.get('http://iot.dei.estg.ipleiria.pt/api/api.php?sensor=btc')
            if int(r.status_code) == 200:
                print(r.text)
                if float(r.text) > 98000.00:
                    GPIO.output(channel, GPIO.HIGH)
                    print("Vou ligar o LED do RPI")
                else:
                    GPIO.output(channel, GPIO.LOW)
                    print("Vou desligar o LED do RPI")
            else:
                print("ERRO: r", r.status_code)

            time.sleep(1)

        except KeyboardInterrupt:
            # captura excecao CTRL + C
            print('\n O get foi interrompido pelo utilizador.')
            break  # sai do ciclo while
        except Exception as e:
            print('Erro inesperado:', e)
            print("Tenta outra vez")
finally:
    GPIO.cleanup()
    print('Terminou o programa')