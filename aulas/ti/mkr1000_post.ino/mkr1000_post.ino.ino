#include <WiFi101.h>
#include <ArduinoHttpClient.h>
#include <DHT.h>
#include <NTPClient.h>
#include <WiFiUdp.h> //Pré-instalada com o Arduino IDE
#include <TimeLib.h>

#define DHTPIN 0 // Pin Digital onde está ligado o sensor
#define DHTTYPE DHT11 // Tipo de sensor DHT
DHT dht(DHTPIN, DHTTYPE); // Instanciar e declarar a class DHT
 
char SSID[] = "labs";
char PASS_WIFI[] = "1nv3nt@r2023_IPLEIRIA";
char URL[] = "iot.dei.estg.ipleiria.pt";
int PORTO = 80; // ou outro porto que esteja definido no servidor
WiFiClient clienteWifi;
HttpClient clienteHTTP = HttpClient(clienteWifi, URL, PORTO);
String valor = "";

WiFiUDP clienteUDP;
//Servidor de NTP do IPLeiria: ntp.ipleiria.pt
//Fora do IPLeiria servidor: 0.pool.ntp.org
char NTP_SERVER[] = "ntp.ipleiria.pt";
NTPClient clienteNTP(clienteUDP, NTP_SERVER, 3600);
 
 

 
void setup() {
  // put your setup code here, to run once:
  Serial.begin(115200);
  while (!Serial);   // espera que o Serial Terminal seja inicializado
 
  WiFi.begin(SSID, PASS_WIFI);
  while (WiFi.status() != WL_CONNECTED) {
    Serial.print(".");
    delay(500);
  }
 
  Serial.println((IPAddress)WiFi.localIP());
  Serial.println((IPAddress)WiFi.subnetMask());
  Serial.println((IPAddress)WiFi.gatewayIP());
  Serial.println(WiFi.RSSI());
 
  pinMode(LED_BUILTIN, OUTPUT);

  dht.begin();
}
 
void loop() {

  float temperaturaLida = dht.readTemperature();
  float humidadeLida = dht.readHumidity();

  String temperatura = String(temperaturaLida);
  String humidade = String(humidadeLida);

  char datahora[20];
  update_time(datahora);
  Serial.print("Data Atual: ");
  Serial.println(datahora);

  String datahora = String(datahora);

  post2API("temperatura", temperatura, "2024-05-03 12:32:00");
  post2API("humidade", humidade, "2024-05-03 12:32:00");
  delay(5000);
}
 
 
void post2API(String nome, String valor, String hora) {
  String URLPath = "/ti/ti139/aulas/ti/api/api.php"; //altere o grupo
  String contentType = "application/x-www-form-urlencoded";
 
  // String enviaNome = "temperatura";
  // String enviaValor = "67";
  // String enviaHora = "2024-05-03 12:32:00";
 
  String body = "nome="+nome+"&valor="+valor+"&hora="+hora;
 
 
  clienteHTTP.post(URLPath, contentType, body);
 
  //Enquanto a comunicação estiver ativa (connected), aguarda dados ficarem disponíveis(available)
  while(clienteHTTP.connected()){
    if (clienteHTTP.available()){
      int responseStatusCode = clienteHTTP.responseStatusCode();
      String responseBody = clienteHTTP.responseBody();
      Serial.println("Status Code: "+String(responseStatusCode)+" Resposta: "+responseBody);
    }
  }
}
void update_time(char *datahora){
  clienteNTP.update();
  unsigned long epochTime = clienteNTP.getEpochTime();
  sprintf(datahora, "%02d-%02d-%02d %02d:%02d:%02d", year(epochTime), month(epochTime), day(epochTime), hour(epochTime), minute(epochTime), second(epochTime));
}