        <!--Function for RFID SCANNER___________________________________________________________________________-->
<?php
	$UIDresult=$_POST["UIDresult"];
	$Write2="<?php $" . "UIDresult='" . $UIDresult . "'; " . "echo $" . "UIDresult;" . " ?>";
	file_put_contents('uidNumField.php',$Write2);

	?>