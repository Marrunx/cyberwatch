#define coin D8

//const int coinS = D8;
boolean insert = false;
volatile int pulse = 0;
unsigned long balance;

void setup() {
  // put your setup code here, to run once:
Serial.begin(9600);
attachInterrupt(digitalPinToI nterrupt(coin), coinInterrupt, RISING);
delay(1000); 
}

void loop() {
  // put your main code here, to run repeatedly:
if(insert){
  insert = false;
//  Serial.println("coin detected!");
  balance = (pulse);
  Serial.println("Balance : "+(String)balance);
  delay(1000);

}
}

void coinInterrupt(){
  pulse++ ;
  insert = true;
}
