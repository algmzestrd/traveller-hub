<?php

$numberList = array(12);

$numberList[0] = 3;
$numberList[1] = 1;
$numberList[2] = 2;
$numberList[3] = 3;
$numberList[4] = 7;
$numberList[5] = 6;
$numberList[6] = 8;
$numberList[7] = 9;
$numberList[8] = 11;
$numberList[9] = 12;
$numberList[10] = 7;
$numberList[11] = 10;

$otherList = array(3);

$otherList[0] = 3;
$otherList[1] = 1;
$otherList[2] = 2;

function swap(&$numbers, $i)
{
   $storage = $numbers[$i];
   $numbers[$i] = $numbers[$i - 1];
   $numbers[$i - 1] = $storage;
}


function bubbleSort($numbers)
{
     $length = sizeOf($numbers);
     $storage = 0;
     $previousIndex = 0;
     $swapped = true;
     $i = 0;
     $counter = 0;
     
     	while($counter < $length)
     	{
     	for($i = 1; $i < $length; $i++)
     	{
     		$swapped = false;
     		
     		if($numbers[$i] < $numbers[$i - 1])
     		{
     			swap($numbers, $i);
	            $swapped = true;
     		}
     	}
     	
     	$counter++;
     	
     	}
     
     return $numbers;
}

print_r(bubbleSort($otherList));

print_r(bubbleSort($numberList));

?>