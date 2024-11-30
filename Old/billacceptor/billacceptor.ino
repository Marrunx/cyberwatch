#include <ESP8266WiFi.h>

const int pulsePin = D1; // Pin connected to the pulse output of the bill acceptor
unsigned long pulseCount = 0; // Total pulses received
float totalAmount = 0.0;     // Total accumulated amount (in PHP)

// Denomination settings (adjust based on your bill acceptor's configuration)
float billValue = 10.0; // 1 PHP bill for simplicity

// WiFi details (optional)
const char* ssid = "Marron";
const char* password = "543210123";

void setup() {
  Serial.begin(115200);
  
  pinMode(pulsePin, INPUT_PULLUP);  // Set pulse pin as input with pull-up resistor
  
  // Connect to WiFi (optional)
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

    // Multiply the pulse count by the bill value to calculate the total amount inserted
    totalAmount = pulseCount * billValue;

    // Print pulse count and total amount
    Serial.print("Pulses detected: ");
    Serial.print(pulseCount);
    Serial.print(" - Total Amount: PHP ");
    Serial.println(totalAmount, 2);  // Print total amount with two decimals
    
    delay(100);  // Debounce the pulse to avoid multiple counts
  }
}
