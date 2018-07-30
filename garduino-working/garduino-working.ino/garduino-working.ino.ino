
// ESP2066
#include <SoftwareSerial.h>
#define ESP8266_rxPin 3
#define ESP8266_txPin 2

int delayTime = 5000;


// Tempurature Sensor
//code write by Moz for YouTube changel LogMaker360, 21-9-2015
int tempPin = A5; // select the input pin for the potentiometer
int tempatureValue = 0; // variable to store the value coming from the sensor
float i = 0;
float fixtemp = 20.;
int fixInput = 560;
float fixedDegreeValue = 5.5;


// Photo Resistence Sensor
int photoPin = A4;

// ESP8266
SoftwareSerial ESP8266(ESP8266_rxPin, ESP8266_txPin);
unsigned long timeout_start_val = 10000;
char scratch_data_from_ESP[20];
const char keyword_OK[] = "OK";
boolean read_until_ESP(const char keyword1[], int key_size, int timeout_val, byte mode);

void setup ()
{
  pinMode(ESP8266_rxPin, INPUT);
  pinMode(ESP8266_txPin, OUTPUT);

  ESP8266.begin(9600);
  ESP8266.listen();
  Serial.begin(9600);
  ESP8266.print("AT+RST\r\n");
  delay(10000);
  ESP8266.print("AT+CIPMUX=1\r\n");
}

void loop ()
{
//  Serial.print("Temp: ");
//  Serial.println(getTempurature());
//  Serial.print("Light: ");
//  Serial.println(getLight());
  getHttp();
  readESP(3000);
  delay(delayTime);
}

int getTempurature() {
  tempatureValue = analogRead(tempPin);
  // Serial.println(tempatureValue);
  if (tempatureValue > fixInput ) { // ice cube
    i = tempatureValue - fixInput;
    i = i / fixedDegreeValue;
    fixtemp = fixtemp - i;
    return (fixtemp * 1.8 + 9);
  } else if (tempatureValue < fixInput) { // tea cup
    i = fixInput - tempatureValue;
    i = i / fixedDegreeValue;
    fixtemp = fixtemp + i;
    return (fixtemp * 1.8 + 9);
  } else if (tempatureValue == fixInput ) {
    return fixtemp;
  }
}

int getLight() {
  return analogRead(photoPin);
}

void readESP(const int timeout) {
  String reponse = "";
  long int time = millis();
  while ( (time + timeout) > millis())
  {
    while (ESP8266.available())
    {
      char c = ESP8266.read();
      reponse += c;
    }
  }
  Serial.println(reponse);
}

void getHttp() {
  ESP8266.print("AT+CIPSTART=1,\"TCP\",\"zacattack.000webhostapp.com\",80\r\n");
  delay(100);
  String getString = "GET /garduino/api/insert.php?temp=80&hum=30 HTTP/1.1\r\n";
  int getLength = getString.length();

  ESP8266.print("AT+CIPSEND=1,107\r\n");
  delay(100);
  ESP8266.print(getString);
  delay(100);
  ESP8266.print("Host: 145.14.145.55\r\n");
  delay(100);
  ESP8266.print("Connection: keep-alive\r\n");
  delay(100);
  ESP8266.print("\r\n");

}


