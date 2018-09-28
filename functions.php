<?php

function clear($string){  // used to clear input field
      $srting = trim(strip_tags($string));
      return $string;
} 
function random_string($length)
{
	$str = "";
	$character = array_merge(range('A','Z'),range('a','z'),['!','@','$','%','^']);
	$max = count($character) - 1;
	for($i = 0; $i < $length; $i++)
	{
		$rand = mt_rand(0,$max);
		$str .= $character[$rand];
	}
	return $str;
}

?>