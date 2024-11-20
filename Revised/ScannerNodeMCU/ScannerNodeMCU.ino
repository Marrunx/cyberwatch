#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <SPI.h>
#include <MFRC522.h>

#define SS_PIN D2  // SDA pin of MFRC522
#define RST_PIN D1 // Reset pin of MFRC522

MFRC522 mfrc522(SS_PIN, RST_PIN);

const char* ssid = "Marron"; // Replace with your WiFi SSID
const char* password = "543210123"; // Replace with your WiFi password
const char* serverUrl = "http://192.168.0.117/ComputerRental/Revised/Register_UID.php"; // Replace with your server's URL

WiFiClient client;

void setup() {
  Serial.begin(115200);
  SPI.begin();
  mfrc522.PCD_Init();

  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(1000);
    Serial.println("Connecting to WiFi...");
  }
  Serial.println("Connected to WiFi");
}

void loop() {
  if (!mfrc522.PICC_IsNewCardPresent() || !mfrc522.PICC_ReadCardSerial()) {
    return;
  }

  String uid = "";
  for (byte i = 0; i < mfrc522.uid.size; i++) {
    uid += String(mfrc522.uid.uidByte[i], HEX);
  }
  uid.toUpperCase();

  Serial.println("UID scanned: " + uid);

  if (WiFi.status() == WL_CONNECTED) {
    HTTPClient http;
    http.begin(client, serverUrl); // Set the server URL
    http.addHeader("Content-Type", "application/x-www-form-urlencoded"); // Set content type to URL encoded

    // Prepare the POST data
    String postData = "uid=" + uid;

    int httpResponseCode = http.POST(postData); // Send the POST request

    if (httpResponseCode > 0) {
      // Handle successful POST response
      Serial.println("POST successful: " + String(httpResponseCode));
      if (httpResponseCode == 302) {
        Serial.println("Redirecting to index.php...");
      }
    } else {
      // Handle error response
      Serial.println("Error in POST: " + String(httpResponseCode));
    }

    http.end(); // End HTTP request
  }

  delay(1000); // Wait 1 second before scanning the next card
}
