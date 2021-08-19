<?php

	// require "indexEngine.php";

	// print_r($distanceArray);
	// print_r($shopArray);

	// $uoo = array($shopArray[0] => $distanceArray[0], $shopArray[1] => $distanceArray[1]);
	// asort($uoo);
	// print_r($uoo);
	// echo $uoo[$shopArray[0]];


	$array1 = array("Post Slider", "Post Slider Wide", "Post Slider");
    $array2 = array("Tools Sliders", "Tools Sliders", "modules-test");
    $array3 = array();

    $count = count($array1);

    for($x = 0; $x < $count; $x++){
       $array3[$array1[$x].$x] = $array2[$x];
    }

    foreach($array3 as $key => $value){
        $output_key = substr($key, 0, -1);
        $output_value = $value;
        echo $output_key.": ".$output_value."<br>";
    }

?>






