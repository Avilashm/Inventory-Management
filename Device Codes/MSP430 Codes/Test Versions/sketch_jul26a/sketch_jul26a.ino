void setup() {
  // put your setup code here, to run once:
Serial.begin(9600);
pinMode(LED_BUILTIN,OUTPUT);
digitalWrite(LED_BUILTIN,HIGH);
}
void loop() {
digitalWrite(LED_BUILTIN,HIGH);
delay(1000);  
 if(Serial.available())
  {
  digitalWrite(LED_BUILTIN,LOW);
  }
delay(100);
 
}
