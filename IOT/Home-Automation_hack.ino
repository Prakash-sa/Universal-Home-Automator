#include <ESP8266WiFi.h>
#include "Adafruit_MQTT.h"
#include "Adafruit_MQTT_Client.h"
#include <Adafruit_Sensor.h>
#include <dht11.h>
#include "MQ135.h"


#define DHT11PIN 4 
#define ANALOGPIN A0    //  Define Analog PIN on Arduino Board
#define RZERO 206.85    //  Define RZERO Calibration Value
#define Light_1 14
#define Light_2 12

dht11 DHT11;
MQ135 gasSensor = MQ135(ANALOGPIN);

/************************* WiFi Access Point *********************************/

#define WLAN_SSID       "Flash"
#define WLAN_PASS       "111111111"

/************************* Adafruit.io Setup *********************************/

#define AIO_SERVER      "io.adafruit.com"
#define AIO_SERVERPORT  1883                   // use 8883 for SSL
#define AIO_USERNAME    "SasaSaini"
#define AIO_KEY         "d234a59c2c754a7f87be9052f8073018"

/************ Global State (you don't need to change this!) ******************/

// Create an ESP8266 WiFiClient class to connect to the MQTT server.
WiFiClient client;
// or... use WiFiFlientSecure for SSL
//WiFiClientSecure client;

// Setup the MQTT client class by passing in the WiFi client and MQTT server and login details.
Adafruit_MQTT_Client mqtt(&client, AIO_SERVER, AIO_SERVERPORT, AIO_USERNAME, AIO_KEY);

/****************************** Feeds ***************************************/
// Setup a feed called 'photocell' for publishing.
// Notice MQTT paths for AIO follow the form: <username>/feeds/<feedname>
Adafruit_MQTT_Publish Temp = Adafruit_MQTT_Publish(&mqtt, AIO_USERNAME "/feeds/Temperature");

Adafruit_MQTT_Publish Humidity = Adafruit_MQTT_Publish(&mqtt, AIO_USERNAME "/feeds/Humidity");

Adafruit_MQTT_Publish RS = Adafruit_MQTT_Publish(&mqtt, AIO_USERNAME "/feeds/rs");

Adafruit_MQTT_Publish RO = Adafruit_MQTT_Publish(&mqtt, AIO_USERNAME "/feeds/ro");


// Setup a feed called 'onoff' for subscribing to changes.
Adafruit_MQTT_Subscribe onoff = Adafruit_MQTT_Subscribe(&mqtt, AIO_USERNAME "/feeds/Remote");

/*************************** Sketch Code ************************************/

// Bug workaround for Arduino 1.6.6, it seems to need a function declaration
// for some reason (only affects ESP8266, likely an arduino-builder bug).
void MQTT_connect();
void Init_mqtt();

uint32_t delayMS;

void Init_dht();
void send_dht();

void setup() {
 
 Serial.begin(115200);
 Init_mqtt();
 pinMode(Light_1,OUTPUT);
 pinMode(Light_2,OUTPUT);
 digitalWrite(Light_1,LOW);
 digitalWrite(Light_2,LOW);
}

void loop() {
  MQTT_connect();
  //-----------------------------send dht-----------------------------------------//
  //delay(delayMS);
  //Get temperature event and print its value.
    int chk = DHT11.read(DHT11PIN);
  //---------------------------------------------------------------------------//
  
  float ro=gasSensor.getRZero();
  float rs=gasSensor.getResistance();
  
  //----------------------------REMOTE----------------------//
  Adafruit_MQTT_Subscribe *subscription;
  while ((subscription = mqtt.readSubscription(5000))) {
    if (subscription == &onoff) {
      Serial.print(F("Got: "));
      Serial.println((char *)onoff.lastread);
    }
  }
  Serial.print("Humidity (%): ");
  Serial.println((float)DHT11.humidity);

  Serial.print("Temperature (C): ");
  Serial.println((float)DHT11.temperature);
  
  Serial.print("RO : ");
  Serial.println(ro);

  Serial.print("RS: ");
  Serial.println(rs);

  int num =atoi((char *)onoff.lastread);
  
  switch(num){
    case 0: digitalWrite(Light_1,LOW);
            break;
    case 1: digitalWrite(Light_1,HIGH);
            break;
    case 2: digitalWrite(Light_2,LOW);
            break;
    case 4: digitalWrite(Light_2,HIGH);
            break;
    default : break;
    }
  
  Temp.publish((float)DHT11.temperature);
  Humidity.publish((float)DHT11.humidity);
  RS.publish(rs);
  RO.publish(ro);
  //---------------Signal_Strength----------------//
  long rssi=WiFi.RSSI();
  Serial.println(rssi);
  delay(8000);
  
  
}





void Init_mqtt()
{
  Serial.println(F("Adafruit MQTT demo"));

  // Connect to WiFi access point.
  Serial.println(); Serial.println();
  Serial.print("Connecting to ");
  Serial.println(WLAN_SSID);

  WiFi.begin(WLAN_SSID, WLAN_PASS);
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println();

  Serial.println("WiFi connected");
  Serial.println("IP address: "); Serial.println(WiFi.localIP());
  // Setup MQTT subscription for onoff feed.
  mqtt.subscribe(&onoff);

  }

void MQTT_connect() {
  int8_t ret;

  // Stop if already connected.
  if (mqtt.connected()) {
    return;
  }

  Serial.print("Connecting to MQTT... ");

  uint8_t retries = 3;
  while ((ret = mqtt.connect()) != 0) { // connect will return 0 for connected
       Serial.println(mqtt.connectErrorString(ret));
       Serial.println("Retrying MQTT connection in 5 seconds...");
       mqtt.disconnect();
       delay(5000);  // wait 5 seconds
       retries--;
       if (retries == 0) {
         // basically die and wait for WDT to reset me
         while (1);
       }
  }
  Serial.println("MQTT Connected!");
}
