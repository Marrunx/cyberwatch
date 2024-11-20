void setup() {
  // put your setup code here, to run once:
  //FIRST STOP LIGHT
  pinMode(13, OUTPUT);

  pinMode(2, OUTPUT);
  pinMode(5, OUTPUT);
  pinMode(8, OUTPUT);

  //SECOND STOP LIGHT
  pinMode(3, OUTPUT);
  pinMode(6, OUTPUT);
  pinMode(9, OUTPUT);

  //THIRD STOP LIGHT
  pinMode(4, OUTPUT);
  pinMode(7, OUTPUT);
  pinMode(10, OUTPUT);
}

void loop() {
  // put your main code here, to run repeatedly:
  // 1ST STOP LIGHT
  digitalWrite(2, LOW);   // RED // 1ST STOP LIGHT
  digitalWrite(5, LOW);   // YELLOW // 1ST STOP LIGHT
  digitalWrite(8, HIGH);  // GREEN // 1ST STOP LIGHT

  digitalWrite(3, HIGH);  // RED // 2ND STOP LIGHT
  digitalWrite(6, LOW);   // YELLOW // 2ND STOP LIGHT
  digitalWrite(9, LOW);   // GREEN // 2ND STOP LIGHT

  digitalWrite(4, HIGH);  // RED // 3RD STOP LIGHT
  digitalWrite(7, LOW);   // YELLOW // 3RD STOP LIGHT
  digitalWrite(10, LOW);  // GREEN // 3RD STOP LIGHT
  delay(10000);

  digitalWrite(2, LOW);   // RED // 1ST STOP LIGHT
  digitalWrite(5, HIGH);  // YELLOW // 1ST STOP LIGHT
  digitalWrite(8, LOW);   // GREEN // 1ST STOP LIGHT

  digitalWrite(3, HIGH);  // RED // 2ND STOP LIGHT
  digitalWrite(6, LOW);   // YELLOW // 2ND STOP LIGHT
  digitalWrite(9, LOW);   // GREEN // 2ND STOP LIGHT

  digitalWrite(4, HIGH);  // RED // 3RD STOP LIGHT
  digitalWrite(7, LOW);   // YELLOW // 3RD STOP LIGHT
  digitalWrite(10, LOW);  // GREEN // 3RD STOP LIGHT
  delay(3000);


  // 2ND STOP LIGHT
  digitalWrite(2, HIGH);  // RED // 1ST STOP LIGHT
  digitalWrite(5, LOW);   // YELLOW // 1ST STOP LIGHT
  digitalWrite(8, LOW);   // GREEN // 1ST STOP LIGHT

  digitalWrite(3, LOW);   // RED // 2ND STOP LIGHT
  digitalWrite(6, LOW);   // YELLOW // 2ND STOP LIGHT
  digitalWrite(9, HIGH);  // GREEN // 2ND STOP LIGHT

  digitalWrite(4, HIGH);  // RED // 3RD STOP LIGHT
  digitalWrite(7, LOW);   // YELLOW // 3RD STOP LIGHT
  digitalWrite(10, LOW);  // GREEN // 3RD STOP LIGHT
  delay(10000);

  digitalWrite(2, HIGH);  // RED // 1ST STOP LIGHT
  digitalWrite(5, LOW);   // YELLOW // 1ST STOP LIGHT
  digitalWrite(8, LOW);   // GREEN // 1ST STOP LIGHT

  digitalWrite(3, LOW);   // RED // 2ND STOP LIGHT
  digitalWrite(6, HIGH);  // YELLOW // 2ND STOP LIGHT
  digitalWrite(9, LOW);   // GREEN // 2ND STOP LIGHT

  digitalWrite(4, HIGH);  // RED // 3RD STOP LIGHT
  digitalWrite(7, LOW);   // YELLOW // 3RD STOP LIGHT
  digitalWrite(10, LOW);  // GREEN // 3RD STOP LIGHT
  delay(3000);

  // 3RD STOP LIGHT
  digitalWrite(2, HIGH);  // RED // 1ST STOP LIGHT
  digitalWrite(5, LOW);   // YELLOW // 1ST STOP LIGHT
  digitalWrite(8, LOW);   // GREEN // 1ST STOP LIGHT

  digitalWrite(3, HIGH);  // RED // 2ND STOP LIGHT
  digitalWrite(6, LOW);   // YELLOW // 2ND STOP LIGHT
  digitalWrite(9, LOW);   // GREEN // 2ND STOP LIGHT

  digitalWrite(4, LOW);    // RED // 3RD STOP LIGHT
  digitalWrite(7, LOW);    // YELLOW // 3RD STOP LIGHT
  digitalWrite(10, HIGH);  // GREEN // 3RD STOP LIGHT
  delay(10000);

  digitalWrite(2, HIGH);  // RED // 1ST STOP LIGHT
  digitalWrite(5, LOW);   // YELLOW // 1ST STOP LIGHT
  digitalWrite(8, LOW);   // GREEN // 1ST STOP LIGHT

  digitalWrite(3, HIGH);  // RED // 2ND STOP LIGHT
  digitalWrite(6, LOW);   // YELLOW // 2ND STOP LIGHT
  digitalWrite(9, LOW);   // GREEN // 2ND STOP LIGHT

  digitalWrite(4, LOW);   // RED // 3RD STOP LIGHT
  digitalWrite(7, HIGH);  // YELLOW // 3RD STOP LIGHT
  digitalWrite(10, LOW);  // GREEN // 3RD STOP LIGHT
  delay(3000);
}
