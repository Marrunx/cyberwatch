#include <WiFi.h>
#include <HTTPClient.h>
#include <ArduinoJson.h>
#include <TM1637Display.h>  // Include the TM1637 display library

#define CLK  18  // Connect CLK pin to D1
#define DIO  19  // Connect DIO pin to D2

// WiFi credentials

const char* ssid = "OPPOA17"; // Replace with your WiFi SSID
const char* password = "jjuralbal"; // Replace with your WiFi password
// Server URLs
const String serverUrl = "http://192.168.249.63/ComputerRental/Revised/function/get_uid_promo_pc2.php"; // Fetch UID and promo
const String resetUrl = "http://192.168.249.63/ComputerRental/Revised/function/reset_promo.php";       // Reset promo
const String resetPcNumberUrl = "http://192.168.249.63/ComputerRental/Revised/function/reset_pc_number.php"; // Reset pc_number

// Relay and LED pins
const int relayPin = 23;


// PC number of this ESP32
const int pcNumber = 2;

// TM1637 Display
TM1637Display display(CLK, DIO);

void setup() {
  Serial.begin(115200);
  pinMode(relayPin, OUTPUT);
  digitalWrite(relayPin, LOW); // Start with relay off


  // Initialize the display
  display.setBrightness(7); // Brightness level 0-7
  display.showNumberDec(0, true); // Display 0 at start

  // Connect to WiFi
  WiFi.begin(ssid, password);
  Serial.print("Connecting to WiFi");
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println("\nWiFi connected!");
}

void loop() {
  // Check for promo every 10 seconds
  fetchPromoFromServer();
  delay(10000);
}

// Function to fetch UID and promo from the server
void fetchPromoFromServer() {
  if (WiFi.status() == WL_CONNECTED) {
    HTTPClient http;
    http.begin(serverUrl);

    int httpResponseCode = http.GET();

    if (httpResponseCode > 0) {
      String response = http.getString();
      Serial.println("Server Response: " + response);

      // Parse JSON response
      DynamicJsonDocument doc(1024);
      DeserializationError error = deserializeJson(doc, response);

      if (error) {
        Serial.print("JSON Parsing Error: ");
        Serial.println(error.c_str());
        return;
      }

      // Extract UID and promo
      String uid = doc["UID"] | "N/A";
      String promo = doc["promo"] | "N/A";
      String serverPcNumberStr = doc["pc_number"] | ""; // Fetch as string

      // Convert server pc_number to integer
      int serverPcNumber = serverPcNumberStr.toInt();

      if (serverPcNumber == pcNumber) {
        if (promo != "N/A" && promo != "") {
          Serial.println("Promo found for UID: " + uid);
          Serial.println("Promo: " + promo);

          // Convert promo to an integer and activate the relay
          int promoValue = promo.toInt();
          int promoMinutes = 0;

          // Map the promo value to corresponding relay activation time
          if (promoValue == 20) {
            promoMinutes = 60; // 1 hour for promo 20
          } else if (promoValue == 40) {
            promoMinutes = 120; // 2 hours for promo 40
          } else if (promoValue == 60) {
            promoMinutes = 180; // 3 hours for promo 60
          } else {
            Serial.println("Invalid promo value. Skipping...");
            return;
          }

          // Activate the relay for the promo duration
          activateRelay(promoMinutes, uid);
        } else {
          Serial.println("No promo available for UID: " + uid);
        }
      } else {
        Serial.println("PC number does not match. Skipping...");
      }
    } else {
      Serial.println("HTTP Request Failed");
    }

    http.end();
  } else {
    Serial.println("WiFi not connected");
  }
}

// Function to activate relay for a given time in minutes
void activateRelay(int minutes, String uid) {
  Serial.println("Activating relay for " + String(minutes) + " minutes");
  digitalWrite(relayPin, HIGH); // Turn on relay

  resetPromo(uid); // Reset promo in the database

  int totalSeconds = minutes * 60; // Convert total minutes to seconds for precise countdown

  while (totalSeconds > 0) {
    if (totalSeconds >= 3600) {
      // Display time in HH:MM if 1 hour or more remains
      int hours = totalSeconds / 3600;
      int mins = (totalSeconds % 3600) / 60;
      display.showNumberDecEx(hours * 100 + mins, 0b11100000, true); // Show HH:MM format

      Serial.print("Time remaining: ");
      Serial.print(hours);
      Serial.print(":");
      Serial.println(mins < 10 ? "0" + String(mins) : String(mins));
    } else {
      // Display time in MM:SS if less than 1 hour remains
      int mins = totalSeconds / 60;
      int secs = totalSeconds % 60;
      display.showNumberDecEx(mins * 100 + secs, 0b11100000, true); // Show MM:SS format

      Serial.print("Time remaining: ");
      Serial.print(mins);
      Serial.print(":");
      Serial.println(secs < 10 ? "0" + String(secs) : String(secs));
    }

    // Blink LED
    delay(1000); // Wait for 1 second

    totalSeconds--; // Decrease total seconds by 1
  }

  Serial.println("Deactivating relay...");
  digitalWrite(relayPin, LOW); // Turn off relay
  display.showNumberDec(0, true); // Clear display
  resetPcNumber();
}


// Function to reset promo in the database
void resetPromo(String uid) {
  if (WiFi.status() == WL_CONNECTED) {
    HTTPClient http;
    String url = resetUrl + "?UID=" + uid;
    http.begin(url);

    int httpResponseCode = http.GET();

    if (httpResponseCode > 0) {
      String response = http.getString();
      Serial.println("Reset Response: " + response);
    } else {
      Serial.println("Failed to reset promo");
    }

    http.end();
  } else {
    Serial.println("WiFi not connected");
  }
}

void resetPcNumber() {
  if (WiFi.status() == WL_CONNECTED) {
    HTTPClient http;
    String url = resetPcNumberUrl + "?pc_number=" + String(pcNumber);
    http.begin(url);

    int httpResponseCode = http.GET();

    if (httpResponseCode > 0) {
      String response = http.getString();
      Serial.println("PC Number Reset Response: " + response);
    } else {
      Serial.println("Failed to reset PC number");
    }

    http.end();
  } else {
    Serial.println("WiFi not connected");
  }
}

