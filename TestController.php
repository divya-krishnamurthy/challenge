<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class TestController extends BaseController
{
	public function index()
	{
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
		}
		print_r($number);

		$this->test($number);
	}

	public function test(Array $number)
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
					echo "Wrong Logic";
				}
			}
		}
	}
}
