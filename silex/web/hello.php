<?php
	echo "Hello World!";
	echo "<hr/>";
	$ten = array(0,1,2,3,4,5,6,7,8,9);

		for ($i=0; $i < 10; $i++) {
			
			//echo $i % 2 == 0 ? "even" : "odd";
			if ($ten[$i]%2 == 0) {
				
				echo $ten[$i] ." is " . "even </br>";
				
			} else {
				echo $ten[$i] . " is " ."odd </br>";
			}
		}
	
	$capitals = array (
	"Deutschland" => "Berlin",
	"Frankreich" => "Paris",
	"Irland" => "Dublin"
	);
	
		foreach ($capitals as $key => $value) {
			echo "Die Hauptstadt von $key ist $value.</br> ";
		}
	
	$zeit = time();
	echo "<hr/>";
	echo  "Die Serverzeit ist: " . $zeit . ".";
	//echo $_SERVER["REQESTTIME"];
?>