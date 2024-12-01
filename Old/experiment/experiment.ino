#include <SPI.h>
#include <MFRC522.h>
#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>

#define RST_PIN 5  // Reset pin (D1)
#define SS_PIN  4  // SDA pin (D2)

MFRC522 mfrc522(SS_PIN, RST_PIN); // Create MFRC522 instance

const char* ssid = "GlobeAtHome_a2e70_2.4GHZ";
const char* password = "Globe@2.4ghz";
const char* serverUrl = "http://192.168.254.114/rfid_login.php"; // PHP backend URL (replace with your local server IP)

WiFiClient client;

void setup() {
  Serial.begin(9600);  // Start serial communication
  SPI.begin();         // Start SPI
  mfrc522.PCD_Init();  // Initialize MFRC522 RFID reader
  WiFi.begin(ssid, password); // Connect to Wi-Fi

  // Wait for Wi-Fi connection
  while (WiFi.status() != WL_CONNECTED) {
    delay(1000);
    Serial.println("Connecting to WiFi...");
  }
  Serial.println("Connected to WiFi!");
}

void loop() {
  if (mfrc522.PICC_IsNewCardPresent()) {  // If a new card is detected
    if (mfrc522.PICC_ReadCardSerial()) {  // Read the card's UID
      String rfidTagId = "";
      for (byte i = 0; i < mfrc522.uid.size; i++) {
        rfidTagId += String(mfrc522.uid.uidByte[i], DEC);  // Convert UID to string
      }

      Serial.print("RFID Tag ID: ");
      Serial.println(rfidTagId);

      // Send the RFID tag ID to the PHP server
      sendRFIDToPHP(rfidTagId);
    }
  }
}

void sendRFIDToPHP(String rfidTagId) {
  if (WiFi.status() == WL_CONNECTED) {
    HTTPClient http;
    http.begin(client, "http://192.168.254.114/rfid_login.php");  
    http.addHeader("Content-Type", "application/x-www-form-urlencoded");

    // Prepare POST data
    String postData = "rfid_tag_id=" + rfidTagId;

    int httpResponseCode = http.POST(postData); // Send POST request

    if (httpResponseCode > 0) {
      String response = http.getString(); // Get the server response
      Serial.println("Response from server: " + response);
    } else {
      Serial.println("Error sending POST request");
    }

    http.end(); // End the HTTP connection
  } else {
    Serial.println("Not connected to WiFi");
  }
}