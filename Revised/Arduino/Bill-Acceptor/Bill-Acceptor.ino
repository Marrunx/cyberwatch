#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>

// Pin configuration
const int pulsePin = D1; // Pin connected to the pulse output of the bill acceptor
unsigned int pulseCount = 0; // Pulse count for the current bill
unsigned long lastPulseTime = 0; // Timestamp of the last pulse
const unsigned long pulseTimeout = 500; // Timeout in milliseconds to determine end of bill insertion

// Denomination settings
const float billValue = 10.0; // Value per pulse (e.g., 10 PHP per pulse)

// WiFi credentials
const char* ssid = "OPPOA17"; // Replace with your WiFi SSID
const char* password = "jjuralbal"; // Replace with your WiFi password

// Server details
const char* serverUrl = "http://192.168.249.63/ComputerRental/Revised/function/balance_log.php"; // Your PHP script URL

void setup() {
  Serial.begin(115200);

  pinMode(pulsePin, INPUT_PULLUP); // Set pulse pin as input with pull-up resistor

  // Connect to WiFi
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.println("Connecting to WiFi...");
  }
  Serial.println("Connected to WiFi.");
  Serial.println("Bill Acceptor Initialized");
}

void loop() {
  // Detect pulse (bill insertion)
  if (digitalRead(pulsePin) == LOW) { // Assuming LOW means pulse is active
    pulseCount++; // Increment pulse count
    lastPulseTime = millis(); // Update the last pulse time
    Serial.println("Pulse detected.");
    delay(100); // Debounce the pulse
  }

  // Check for timeout to determine the end of bill insertion
  if (pulseCount > 0 && millis() - lastPulseTime > pulseTimeout) {
    float billAmount = pulseCount * billValue; // Calculate the bill amount
    Serial.print("Detected bill amount: PHP ");
    Serial.println(billAmount);

    // Send the bill amount to the server
    sendDataToServer(billAmount);

    // Reset pulse count
    pulseCount = 0;
  }
}

void sendDataToServer(float amount) {
  if (WiFi.status() == WL_CONNECTED) { // Check if connected to WiFi
    HTTPClient http; // Create HTTP client
    WiFiClient client;

    // Prepare POST data
    String postData = "balance=" + String(amount);
    http.begin(client, serverUrl); // Specify the server URL
    http.addHeader("Content-Type", "application/x-www-form-urlencoded"); // Set POST header

    int httpCode = http.POST(postData); // Send POST request
    String payload = http.getString();  // Get server response

    // Print server response
    Serial.print("Server response code: ");
    Serial.println(httpCode);
    Serial.print("Response: ");
    Serial.println(payload);

    http.end(); // Close connection
  } else {
    Serial.println("WiFi not connected!");
  }
}
