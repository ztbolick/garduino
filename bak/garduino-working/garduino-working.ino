int delayTime = 5000;


// Tempurature Sensor
//code write by Moz for YouTube changel LogMaker360, 21-9-2015
int tempPin = A5; // select the input pin for the potentiometer
int sensorValue = 0; // variable to store the value coming from the sensor
float i = 0;
float fixtemp = 20.;
int fixInput = 560;
float fixedDegreeValue = 5.5;


// Photo Resistence Sensor
int photoPin = A4;

void setup ()
{
  Serial.begin (9600);
}

void loop ()
{
  getTempurature();
}

void getTempurature() {
  sensorValue = analogRead(tempPin);
  // Serial.println(sensorValue);
  if (sensorValue > fixInput ) { // ice cube
    i = sensorValue - fixInput;
    i = i / fixedDegreeValue;
    Serial.print("Temperature = ");
    fixtemp = fixtemp - i;
    Serial.print(fixtemp * 1.8 + 9);
    Serial.println(" C");
  } else if (sensorValue < fixInput) { // tea cup
    i = fixInput - sensorValue;
    i = i / fixedDegreeValue;
    Serial.print("Temperature = ");
    fixtemp = fixtemp + i;
    Serial.print(fixtemp * 1.8 + 9);
    Serial.println(" F");
  } else if (sensorValue == fixInput ) {
    Serial.println(" temperature = 20 F");
  }
  fixtemp = 20;
  delay(delayTime);
}

void getLight() {
  Serial.println(analogRead(photoPin));
  delay(delayTime);
}


