<?php
	$coinrst=$_POST["coinrst"];
	$rite="<?php $" . "coinrst='" . $coinrst . "'; " . "echo $" . "coinrst;" . " ?>";
	file_put_contents('UIDContainer.php',$rite);
?>