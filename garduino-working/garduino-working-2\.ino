
// ESP2066
#include <SoftwareSerial.h>
#define ESP8266_rxPin 2
#define ESP8266_txPin 3

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

void setup ()
{
  Serial.begin (9600);
  pinMode(ESP8266_rxPin, INPUT);
  pinMode(ESP8266_txPin, OUTPUT);
  // ESP8266.begin(9600);
}

void loop ()
{
  Serial.println(getTempurature());
  Serial.println(getLight());
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
  fixtemp = 20;
}

int getLight() {
  return analogRead(photoPin);
}


