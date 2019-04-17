<?php

// Students Sets

$Students = array(
	
	"John" => array("Age"=>"25","Course"=>"BSIT","Gender"=>"MALE"),
	"David" => array("Age"=>"27","Course"=>"BSCS","Gender"=>"MALE"),
	"Maria" => array("Age"=>"20","Course"=>"BSBA","Gender"=>"FEMALE")	

	);


$Lists = array_keys($Students);

for ($i=0; $i < count($Students); $i++) {
		echo $Lists[$i]. "<br>"; 
	
	foreach($Students[$Lists[$i]] as $Key => $Infoset)
	{echo $Key .":" . $Infoset . "<br>";
	 
		 if ($Infoset == "FEMALE") {echo "Your Girl" . "<br>";}	
		 elseif ($Infoset == "MALE") {echo "Your Boy" . "<br>";}
	
	}
	
	echo "<br>";
	
	
}





function StudentCount($x,$y) {
	
	$sumset = 0;
	$sumset = $x + $y;	
	return "Hello Students" . " " . $sumset;
}