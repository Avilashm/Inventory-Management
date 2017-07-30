/*
 *  This sketch sends data via HTTP GET requests to data.sparkfun.com service.
 *
 *  You need to get streamId and privateKey at data.sparkfun.com and paste them
 *  below. Or just customize this script to talk to other HTTP servers.
 *
 */

#include <ESP8266WiFi.h>

String inputString = "";         // a string to hold incoming data
boolean stringComplete = false;  // whether the string is complete

const char* ssid     = "avilash";
const char* password = "665431abc";
int counter=0;
int card;

const char* host = "b4964af8.ngrok.io";
//const char* streamId   = "....................";
//const char* privateKey = "....................";

void setup() {
  pinMode(LED_BUILTIN, OUTPUT);
  Serial.begin(9600);
  delay(10);

  inputString.reserve(200);
  // We start by connecting to a WiFi network

  /*Serial.println(9600);
  /*Serial.println();
  Serial.print("Connecting to ");
  Serial.println(ssid);*/
  
  WiFi.begin(ssid, password);
  
  while (WiFi.status() != WL_CONNECTED) {
    digitalWrite(LED_BUILTIN, LOW);
    delay(50);
    digitalWrite(LED_BUILTIN,HIGH);
    delay(200);
    delay(250);
    Serial.print(".");
  }
  
  digitalWrite(LED_BUILTIN, LOW);
  Serial.println("");
  Serial.println("WiFi connected");  
  Serial.println("IP address: ");
  Serial.println(WiFi.localIP());
}


void loop() 
{ 

  char* UID = "A1B3EBFF";
  int type = 1;
  Serial.print("connecting to ");
  Serial.println(host);
  WiFi.begin(ssid, password);
  // Use WiFiClient class to create TCP connections
  WiFiClient client;
  const int httpPort = 80;
  if (!client.connect(host, httpPort)) {
    //Serial.println("connection failed");
    digitalWrite(LED_BUILTIN,HIGH);
    return;
  }
  
  

  if(Serial.available())
  {
     card = 1;   
    //counter = 0;
  }
 if(card == 1)
 {
  if(counter > 2){Serial.flush();counter = 0;}
  digitalWrite(LED_BUILTIN, LOW);
  // We now create a URI for the request
  String url = "/afproject/getdata.php?";
  url += "id=";
  url += UID;
  url += "&w=";
  url += type;
  
  Serial.print("Requesting URL: ");
  Serial.println(url);
  
  // This will send the request to the server
  client.print(String("GET ") + url + " HTTP/1.1\r\n" +
               "Host: " + host + "\r\n" + 
               "Connection: close\r\n\r\n");
  unsigned long timeout = millis();
  while (client.available() == 0) {
    if (millis() - timeout > 5000) {
      //Serial.println(">>> Client Timeout !");
      client.stop();
      return;
    }
  }
  
  // Read all the lines of the reply from server and print them to Serial
  while(client.available()){
    String line = client.readStringUntil('\r');
    Serial.print(line);
  }
  counter ++;
}

}

