#include <WiFi101.h>
#include <ArduinoHttpClient.h>
 
char SSID[] = "labs";
char PASS_WIFI[] = "1nv3nt@r2023_IPLEIRIA";
char URL[] = "iot.dei.estg.ipleiria.pt";
int PORTO = 80; // ou outro porto que esteja definido no servidor
WiFiClient clienteWifi;
HttpClient clienteHTTP = HttpClient(clienteWifi, URL, PORTO);
String valor = "";
 
 
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
}
 
void loop() {
  // put your main code here, to run repeatedly:
  // clienteHTTP.get("/api/api.php?sensor=temp");
  clienteHTTP.get("https://iot.dei.estg.ipleiria.pt/ti/ti139/projecto/query/api.php?nome=temperaturaHumidade");
  int statusCode = clienteHTTP.responseStatusCode();
 
  if(statusCode == 200){
    valor = clienteHTTP.responseBody(); 
  }else{
    Serial.print("Erro. Código: ");
    Serial.println(statusCode);
  }
  delay(5000);
 
  if(valor.toInt() >= 20) {
    digitalWrite(LED_BUILTIN, HIGH);
  } else {
    digitalWrite(LED_BUILTIN, LOW);
  }
}