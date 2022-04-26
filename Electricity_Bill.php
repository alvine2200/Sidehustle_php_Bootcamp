<?php 

	//assign any value to test the code 
	$bill=1000;

	if ($bill <= 50)
	 {
		echo "NGN. 3.50/unit";
	 }
	elseif ($bill > 50 && $bill <= 150)
	 {
		echo "NGN. 4.00/unit";
	 }
	elseif($bill > 150 && $bill <= 250)
	 {
	 	echo "NGN. 5.20/unit";
	 }
	 else
	 {
	 	echo "NGN. 6.50/unit";
	 }











 ?>