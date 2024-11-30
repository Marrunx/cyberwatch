#include <SPI.h>
#include <MFRC522.h>

#define RST_PIN   5
#define SS_PIN  53

int Lay = 44;

MFRC522 mfrc522(SS_PIN, RST_PIN);

void setup() {
  // put your setup code here, to run once:
  Serial.begin(9600);
  SPI.begin();
  pinMode(Lay,OUTPUT);
  mfrc522.PCD_Init();
  Serial.println( millis());
}
uint8_t buf[10]= {};
MFRC522::Uid id;
MFRC522::Uid id2;
bool is_card_present = false;
uint8_t control = 0x00;

void PrintHex(uint8_t *data, uint8_t length)
{
  char tmp[16];
  for(int i=0; i<length; i++) {
    sprintf(tmp, "0x%.2X",data[i]);
    Serial.print(tmp); Serial.print(" ");
  }
}

void cpid(MFRC522::Uid *id){

  memset(id, 0, sizeof(MFRC522::Uid));
  memcpy(id->uidByte, mfrc522.uid.uidByte, mfrc522.uid.size);
  id->size = mfrc522.uid.size;
  id->sak = mfrc522.uid.sak;
}

void loop() {
  // put your main code here, to run repeatedly:
  method1();
}

void method1(){
  long starttime = millis();
  long duration = 6000;
  long endtime = starttime + duration;



  MFRC522::MIFARE_Key key;
  for (byte i = 0; i < 6; i++) key.keyByte[i] = 0xFF;
  MFRC522::StatusCode status;

  if ( !mfrc522.PICC_IsNewCardPresent()){
    return;
  }
  if ( !mfrc522.PICC_ReadCardSerial()){
    return;
  }

  bool result = true;
  uint8_t buf_len=4;
  cpid(&id);
  Serial.print("NewCard");
  PrintHex(id.uidByte, id.size);
  Serial.println("");

  while(!mfrc522.PICC_IsNewCardPresent() && millis() < endtime){
    digitalWrite(Lay,HIGH);
    control=0;
    
    for(int i=0; i<3; i++){
      if(!mfrc522.PICC_IsNewCardPresent()){
       if(mfrc522.PICC_ReadCardSerial()){
         control |= 0x16;
       }
       if(mfrc522.PICC_ReadCardSerial()){
         control |= 0x16;
       }
         control += 0x1;
       
       }
       control += 0x4;       
    }
      if(control == 13 || control == 14){
      //CARD STILL THERE
    }

    else{
      break;
    }
  }
  
  Serial.println("cardisremove");
  digitalWrite(Lay,LOW);
  delay(500);
  mfrc522.PICC_HaltA();
  mfrc522.PCD_StopCrypto1();  

  

}


