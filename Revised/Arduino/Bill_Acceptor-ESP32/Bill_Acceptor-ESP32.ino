#include <WiFi.h>
#include <HTTPClient.h>

const int pulsePin = 22; // Pin connected to the pulse output of the bill acceptor
unsigned long pulseCount = 0; // Total pulses received
float totalAmount = 0.0;     // Total accumulated amount (in PHP)

// Denomination settings (adjust based on your bill acceptor's configuration)
float billValue = 10.0; // 10 PHP per pulse

// WiFi details
const char* ssid = "Marron";  // Replace with your WiFi SSID
const char* password = "543210123";  // Replace with your WiFi password

// Server URL (make sure it's the correct URL of your PHP script)
const char* serverUrl = "http://192.168.2.63/ComputerRental/Revised/function/balance_log.php";  // Adjust the URL
//C:\xampp\htdocs\ComputerRental\Revised\function

void sendBalanceToServer(float amount) {
  if (WiFi.status() == WL_CONNECTED) { // Check if connected to WiFi
    HTTPClient http; // Create HTTP client
    WiFiClient client;

    // Prepare POST data (balance)
    String postData = "balance=" + String(amount, 2); // Send the balance in PHP format
    http.begin(client, serverUrl); // Specify the server URL
    http.addHeader("Content-Type", "application/x-www-form-urlencoded"); // Set POST header

    Serial.print("Sending balance to server: ");
    Serial.println(postData);  // Debugging output to verify data

    int httpCode = http.POST(postData); // Send POST request
    String payload = http.getString(); // Get server response

    // Check for successful response
    if (httpCode == 200) {
      Serial.println("Balance sent successfully to the server!");
      Serial.print("Server response: ");
      Serial.println(payload); // Print server response
    } else {
      Serial.print("Failed to send data, HTTP code: ");
      Serial.println(httpCode);
    }

    http.end(); // Close connection
  } else {
    Serial.println("WiFi not connected!");
  }
}

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

    // Send balance to the server
    sendBalanceToServer(totalAmount);

    delay(500);  // Debounce the pulse to avoid multiple counts
  }
}
