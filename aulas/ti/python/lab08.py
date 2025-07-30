import requests
import time

print("prima control + C para terminar")

while True:
    try:
        r = requests.get('http://iot.dei.estg.ipleiria.pt/api/api.php?sensor=btc')
        if int(r.status_code) == 200:
            print(r.text)
            if float(r.text) > 99000.00:
                print("Vou ligar o LED do RPI")
            else:
                print("Vou desligar o LED do RPI")
        else:
            print("ERRO: r", r.status_code)

        time.sleep(2)

    except KeyboardInterrupt:
        # captura excecao CTRL + C
        print('\n O get foi interrompido pelo utilizador.')
        break  # sai do ciclo while
    except Exception as e:
        print('Erro inesperado:', e)
        print("Tenta outra vez")