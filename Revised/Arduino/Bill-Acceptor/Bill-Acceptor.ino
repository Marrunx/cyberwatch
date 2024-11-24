#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>

const int pulsePin = D1; // Pin connected to the pulse output of the bill acceptor
unsigned long pulseCount = 0; // Total pulses received
float totalAmount = 0.0;     // Total accumulated amount (in PHP)

// Denomination settings (adjust based on your bill acceptor's configuration)
float billValue = 10.0; // 10 PHP per pulse

// WiFi details
const char* ssid = "Marron";
const char* password = "543210123";

// Server details
const char* serverUrl = "http://192.168.0.117/ComputerRental/touchscreen-2.1/reloadPage.php"; // Your PHP script URL

// Predefined UID for the user (adjust this value as needed)
const String predefinedUID = "12344"; // Replace with actual UID

void setup() {
  Serial.begin(115200);

  pinMode(pulsePin, INPUT_PULLUP);  // Set pulse pin as input with pull-up resistor

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
  if (digitalRead(pulsePin) == LOW) {  // Assuming LOW means pulse is active (check your bill acceptor)
    pulseCount++;  // Increment pulse count

    // Calculate the total amount
    totalAmount = pulseCount * billValue;

    // Print pulse count and total amount
    Serial.print("Pulses detected: ");
    Serial.print(pulseCount);
    Serial.print(" - Total Amount: PHP ");
    Serial.println(totalAmount, 2);  // Print total amount with two decimals

    // Send data to the server
    sendDataToServer(totalAmount);

    delay(100);  // Debounce the pulse to avoid multiple counts
  }
}

void sendDataToServer(float amount) {
  if (WiFi.status() == WL_CONNECTED) { // Check if connected to WiFi
    HTTPClient http; // Create HTTP client
    WiFiClient client;

    // Prepare POST data including balance and UID
    String postData = "balance=" + String(amount) + "&uid=" + predefinedUID;
    http.begin(client, serverUrl); // Specify the server URL
    http.addHeader("Content-Type", "application/x-www-form-urlencoded"); // Set POST header

    int httpCode = http.POST(postData); // Send POST request
    String payload = http.getString(); // Get server response

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
