#include <Wire.h>
#include <LiquidCrystal_I2C.h>
#define coinSlot 8 // PIN 8
#define buzzer 12 // PIN 12
#define pumpMotor 7 // PIN 7
LiquidCrystal_I2C lcd(0x27,16,2);

int button1 = 2; // FOR SMALL BALANCE
int buttonState1 = 0; // FOR SMALL BALANCE

int button2 = 3; // STOP BUTTON
int buttonState2 = 0; // STOP BUTTON

int button3 = 4; // 350 ML | 8 SECONDS
int buttonState3 = 0; // 350 ML | 8 SECONDS

int button4 = 5; // 500 ML | 10 SECONDS
int buttonState4 = 0; // 500 ML | 10 SECONDS

int button5 = 6; // 1 LITER | 20 SECONDS
int buttonState5 = 0; // 1 LITER | 20 SECONDS


int coinSlotStatus; 
int pulse;


boolean balance = false;
boolean noCoin = false;

void setup() {
  // put your setup code here, to run once:
pinMode(button1,INPUT);
  pinMode(button2,INPUT);
  pinMode(button3,INPUT);

  pinMode (coinSlot, INPUT_PULLUP);

  pinMode(pumpMotor, OUTPUT);

  pinMode(buzzer, OUTPUT); // POSTIVE BUZZER

  pinMode(9, OUTPUT); // NEGATIVE BUZZER

  digitalWrite(10,LOW); // THE BUZZER IS ON WHEN LOW, THE BUZZER IS OFF WHEN HIGH

  
  lcd.init();
  lcd.backlight();
  lcd.clear();
  lcd.setCursor(4,0);
  lcd.print("WELCOME!");
  
  delay(1000);
  lcd.clear();


  tone(buzzer, 5000);
  delay(500);
  noTone(buzzer);

}

void loop() {
  // put your main code here, to run repeatedly:

coinSlotStatus = digitalRead(coinSlot);

  buttonState1 = digitalRead(button1);
  buttonState2 = digitalRead(button2);
  buttonState3 = digitalRead(button3);
  buttonState4 = digitalRead(button4);
  buttonState5 = digitalRead(button5);
  if(noCoin == false){
    noCoin = true;
    lcd.setCursor(2,0);
    lcd.print("INSERT COIN.");
  }


  
  if(buttonState1 == HIGH && buttonState3 == LOW && buttonState4 == LOW && buttonState5 == LOW && pulse <= 7 && balance){
    lcd.clear();
    lcd.setCursor(0,0);
    lcd.print("Pumping a water.");
      for (int PPS = pulse; PPS > 0; PPS--) {
        analogWrite(pumpMotor,255);
        lcd.setCursor(0,1);
        lcd.print("    ");
        lcd.setCursor(0,1);
        lcd.print(PPS);
        tone(buzzer,6000);
        delay(500);
        noTone(buzzer);
        delay(500);
        analogWrite(pumpMotor,255); 
        buttonState2 = digitalRead(button2);
        

  
        if (buttonState2 == HIGH){
          pulse = 0;
          noCoin = false;
          analogWrite(pumpMotor,0);
          lcd.clear();
          lcd.setCursor(3,0);
          lcd.print("STOPPING..");
          delay(3000);
          tone(buzzer,3000);
          delay(200);
          noTone(buzzer);
          break;
        }
        analogWrite(pumpMotor,255);
      }
    pulse = 0;
    noCoin = false;
    analogWrite(pumpMotor,0);
    lcd.clear();
    lcd.setCursor(3,0);
    lcd.print("THANK YOU.");
    delay(3500);
    tone(buzzer,3000);
    delay(200);
    noTone(buzzer);

  }else if(buttonState3 == HIGH && buttonState1 == LOW && buttonState4 == LOW && buttonState5 == LOW && pulse == 8 && balance){ // 350 ML | 8 SECONDS

    lcd.clear();
    lcd.setCursor(0,0);
    lcd.print("Pumping a water.");
    lcd.setCursor(5,1);
    lcd.print("350 ML");
      for (int PPS = pulse; PPS > 0; PPS--) {
        analogWrite(pumpMotor,255);
        tone(buzzer,6000);
        delay(500);
        noTone(buzzer);
        delay(500);
        analogWrite(pumpMotor,255); 
        buttonState2 = digitalRead(button2);


        if (buttonState2 == HIGH){
          pulse = 0;
          noCoin = false;
          analogWrite(pumpMotor,0);
          lcd.clear();
          lcd.setCursor(3,0);
          lcd.print("STOPPING..");
          delay(3000);
          tone(buzzer,3000);
          delay(200);
          noTone(buzzer);
          break;
        }
        analogWrite(pumpMotor,255);
      }
    pulse = 0;
    noCoin = false;
    analogWrite(pumpMotor,0);
    lcd.clear();
    lcd.setCursor(3,0);
    lcd.print("THANK YOU.");
    delay(3500);
    tone(buzzer,3000);
    delay(200);
    noTone(buzzer);


  }else if(buttonState4 == HIGH && buttonState1 == LOW && buttonState3 == LOW && buttonState5 == LOW && pulse == 10 && balance){ // 500 ML | 10 SECONDS

    lcd.clear();
    lcd.setCursor(0,0);
    lcd.print("Pumping a water.");
    lcd.setCursor(5,1);
    lcd.print("500 ML");
      for (int PPS = pulse; PPS > 0; PPS--) {
        analogWrite(pumpMotor,255);
        tone(buzzer,6000);
        delay(500);
        noTone(buzzer);
        delay(500);
        analogWrite(pumpMotor,255); 
        buttonState2 = digitalRead(button2);


        if (buttonState2 == HIGH){
          pulse = 0;
          noCoin = false;
          analogWrite(pumpMotor,0);
          lcd.clear();
          lcd.setCursor(3,0);
          lcd.print("STOPPING..");
          delay(3000);
          tone(buzzer,3000);
          delay(200);
          noTone(buzzer);
          break;
        }
        analogWrite(pumpMotor,255);
      }
    pulse = 0;
    noCoin = false;
    analogWrite(pumpMotor,0);
    lcd.clear();
    lcd.setCursor(3,0);
    lcd.print("THANK YOU.");
    delay(3500);
    tone(buzzer,3000);
    delay(200);
    noTone(buzzer);


  }else if(buttonState5 == HIGH && buttonState1 == LOW && buttonState3 == LOW && buttonState4 == LOW && pulse == 20 && balance){ // 1 LITER | 20 SECONDS

    lcd.clear();
    lcd.setCursor(0,0);
    lcd.print("Pumping a water.");
    lcd.setCursor(4,1);
    lcd.print("1 LITER");
      for (int PPS = pulse; PPS > 0; PPS--) {
        analogWrite(pumpMotor,255);
        tone(buzzer,6000);
        delay(500);
        noTone(buzzer);
        delay(500);
        analogWrite(pumpMotor,255); 
        buttonState2 = digitalRead(button2);


        if (buttonState2 == HIGH){
          pulse = 0;
          noCoin = false;
          analogWrite(pumpMotor,0);
          lcd.clear();
          lcd.setCursor(3,0);
          lcd.print("STOPPING..");
          delay(3000);
          tone(buzzer,3000);
          delay(200);
          noTone(buzzer);
          break;
        }
        analogWrite(pumpMotor,255);
      }
    pulse = 0;
    noCoin = false;
    analogWrite(pumpMotor,0);
    lcd.clear();
    lcd.setCursor(3,0);
    lcd.print("THANK YOU.");
    delay(3500);
    tone(buzzer,3000);
    delay(200);
    noTone(buzzer);


  }




  
  if(coinSlotStatus == 0){
    pulse += 1;
    balance = true;
    tone(buzzer, 8000);
    lcd.setCursor(0,0);
    lcd.print("Press a button");
    lcd.setCursor(0,1);
    lcd.print("Bal: ");
    lcd.print(pulse);
    lcd.print(".00 Php ");

    delay(50);
    
    
    


  }
  noTone(buzzer);


}
