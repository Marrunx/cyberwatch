<?php 
$Write = "<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . "?>";
file_put_contents('UIDContainer.php',$Write);
?>

<html>
<head>

    <title> CLIENT | Register </title>
    <meta charset="UTF-8" />
    <meta name = "viewport" content="width=device-width, initial-scale=1.0" />
    <link rel = "stylesheet" type = "text/css" href = "regDesign.css">
    <!--script src = "js/regDesign.min.js"></script>-->
    <script src = "jquery.min.js"></script>
    <script>
			$(document).ready(function(){
				 $("#getUID").load("UIDContainer.php");
				setInterval(function() {
					$("#getUID").load("UIDContainer.php");
				}, 500);
			});
		</script>
</head>
<body>

    <header class = "header">
        <nav class = "navbar">
            <ul>
                <li><a href = "Sales.html"> Sales </a></li>
                <li><a href = "Records.html"> Records </a></li>
                <li><a href = "Sign in.html"> Sign Out </a></li>
            </ul>
        </nav>
    </header>

    <center>
        <div class = "customer-info">
            <form action = "" method = "post"> 
                <p class = "ins"> <i> All fields are required. </i></p>

                <label for = "getUID"> UID </label> 
                <textarea class="UID" id="getUID" name = "getUID" placeholder="PLACE THE CARD "  require></textarea> <br>
                <!--<input type = "text" id = "getUID" name = "id" placeholder="PLACE THE CARD TO THE SCANNER" required> <br>-->

                <label for = "cardNum"> Card Number </label>
                <input type = "text" id = "cardNum" name = "cardNum" required> <br>

                <label for = "name"> Name </label>
                <input type = "text" id = "name" name = "name" required> <br>

                <label for = "bday"> Birthday </label>
                <input type = "text" id = "bday" name = "bday" required> <br>

                <label for = "cardLoad" class = "cardLoad"> Load </label>
                <input type = "text" id = "cardLoad" name = "cardLoad" required> <br>

                <button type= "submit" name = "save"> Save </button>
             </form>
        </div>
    </center>

    <script>
        // Function to generate a random UID
        //function generateUID() {
            //let uniqID = '';
            //for (let i = 0; i < 21; i++) {
              //  uniqID += Math.floor(Math.random() * 10);
            //}
          //  return uniqID;
        //}

        // Generate and insert the UID
        //const uidField = document.getElementById('uniqID');
        //uidField.value = generateUID();

        function generateCardNumber() {
            let cardNum = '';
            for (let i = 0; i < 16; i++) {
                cardNum += Math.floor(Math.random() * 10);
            }
            return cardNum;
        }

        // Generate and insert the CardNum
        const cardNumField = document.getElementById('cardNum');
        cardNumField.value = generateCardNumber();
    </script>

</body>
</html>


<?php
session_start();

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'arduino';


$conn = mysqli_connect($servername, $username, $password, $dbname);

if (isset($_POST['save'])) {
$uniqID = $_POST ['getUID'];
$cardNum = $_POST ['cardNum'];
$name = $_POST ['name'];
$bday = $_POST ['bday'];
$cardLoad = $_POST ['cardLoad'];

$sqlCheck = "SELECT * FROM customerregister_tbl where UID='$uniqID'";
$qryCheck = mysqli_query($conn, $sqlCheck);
$checkResult = mysqli_num_rows($qryCheck);

if($checkResult > 0){
    echo"
    <script>
    alert('user already exsist');
    </script>
    ";
}else{
$sql = "INSERT INTO customerregister_tbl(ID, UID, CardNumber, Name, Birthday, Amount) VALUES('', '$uniqID', '$cardNum', '$name', '$bday', '$cardLoad')";

if (mysqli_query($conn, $sql)) {
    echo "Completed!";
    echo "New record created successfully";
}

else {
    echo "Failed. Try Again";
}

}}

/*if(!empty($_POST)) {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $bday = $_POST["bday"];
    $card = $_POST["cardLoad"];

    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXEPTION);
    $sql = "INSERT INTO cuustomerregister_tbl (UID, Card Number, Name, Birthday, Card Load) VALUES ('$uniqID', '$cardNum', '$name', '$bday', '$cardLoad')";
    $q = $pdo->prepare($sql);
    $q->execute(array($id,$name,$bday,$card));
    Database::disconnect;
}*/

?>