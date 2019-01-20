#include <dht.h> /* Temperature sensor library*/
dht DHT;
#define DHT11_PIN 7

#include <Ethernet.h>
byte mac[] = { 0x00, 0xAA, 0xBB, 0xCC, 0xDE, 0x01 }; // RESERVED MAC ADDRESS
EthernetClient client;

void setup() {
  Serial.begin(9600);
  Serial.println("Temperature sensor ****\n\n");

  if (Ethernet.begin(mac) == 0) {
    Serial.println("Failed to configure Ethernet using DHCP"); 
  }
  delay(1000); /* 1 second head start for sensor */
}

void loop() {
  int chk = DHT.read11(DHT11_PIN);
  //Serial.println("Temperature: "+String(DHT.temperature));
  //delay(1000);
  //(int)DHT.temperature



  String data = "action=insertData&location=heater&temperature1="+String(DHT.temperature)+"&temperature2=-100&humidity1="+String(DHT.humidity)+"&humidity2=-100";
  //String data = "action=insertData&location=desk&temperature1=1&temperature2=1&humidity1=1&humidity2=1";

  if (client.connect("www.martinfoltin.com",80)) {
    Serial.println("client.connect(www.martinfoltin.com,80) --> True");
    
    // REPLACE WITH YOUR SERVER ADDRESS
    client.println("POST /uploadData.php HTTP/1.1"); 
    client.println("Host: martinfoltin.com"); // SERVER ADDRESS HERE TOO
    client.println("Content-Type: application/x-www-form-urlencoded"); 
    client.print("Content-Length: "); 
    client.println(data.length()); 
    client.println(); 
    client.print(data); 

    Serial.println("client.connect(www.martinfoltin.com,80) --> HTTP request sent");
  } 

  if (client.connected()) { 
    Serial.println("client.connected() == false --> stopping");
    client.stop();  // DISCONNECT FROM THE SERVER
  }else{
    Serial.println("client.connected() == false");
  }

  int seconds = 60*15;
  Serial.print("\nWaiting ");
  Serial.print(seconds);
  Serial.println(" seconds\n");
  tick(seconds);
}


void tick(int seconds){
  int decade = 0;
  for(int i=0;i<seconds;i++){
    decade = decade + 1;
    delay(1000);
    if(decade>9){decade=0; Serial.print('|');}else{Serial.print(".");}
  }
  Serial.println("\n");
}
