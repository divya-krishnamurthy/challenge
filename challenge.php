<?php
	$replace = [
		1=>"Linio",
		2=>"IT",
		6=>"Linianos"
	];

	$number = array_combine(range(1,100), range(1,100));

	foreach ($number as $key => $value) {
		if ($value % 3 == 0 || $value % 5 == 0) {
			$number[$key] = $replace[(($value % 3 == 0) * 1) 
			+ (($value % 5 == 0) * 2)
			+ (($value % 3 == 0 && $value % 5 == 0) * 3)
		];
		}
		echo $number[$key]."\n";
	}
	// print_r($number);

	test($number);


// function to test logic
	function test(Array $number)
	{
		$replace = [
			'Linio' => 3,
			'IT' => 5,
			'Linianos' => [3,5]
		];

		foreach ($number as $key => $value) {
			if (!is_numeric($value) && array_key_exists($value, $replace)) {

				$test = (!is_array($replace[$value])) ? ($key % $replace[$value] == 0) : ($key % $replace[$value][0] == 0 && $key % $replace[$value][1] == 0);
				
				if (!$test) {
					echo "Failure";
				}
			}
		}
		echo ">>>>>>>>>>>>>>>>>>>>>>>  Test Success  <<<<<<<<<<<<<<<<<<<<<<<<<<<<";
	}
?>
