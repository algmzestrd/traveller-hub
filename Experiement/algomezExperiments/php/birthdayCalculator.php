<?php

//Tried a lot of things in php, e.g. multiple functions, arrays, objects.
//Determines whether to use object and less efficient methods.
$iAmPracticing = false;

//Object that stores month, day, and year.
//Constructor takes string in the form of mm/dd/yyyy
//Done for practice with Objects

class dateArray {
    function dateArray($date) {
        $this->month = $date[0];
        $this->day = $date[1];
        $this->year = $date[2];
    }
} 

//Takes string in the form of mm/dd/yyyy
//Outputs array with month (0), day (1), year (2)

function dateParser($dateIn) 
{
    global $iAmPracticing;
    $index = 0;
    $arrayIndex = 0;
    $entry = "";
    $dateOut = array(3); //create array of dates. stored as month (0), day (1), year (2)
    
    if($iAmPracticing)
    {
    while($index < strlen($dateIn)) //done the long way to practice input with php
    {
        if($dateIn[$index] != chr(47) && $index != strlen($dateIn) - 1)
        {
        $entry .= $dateIn[$index];
        }
        else
        {
        if($dateIn[$index] != chr(47)) //to ensure entry after last '/' is recorded
        $entry .= $dateIn[$index];
        
        $dateOut[$arrayIndex] = $entry;
        $arrayIndex++;
        $entry = "";
        }
        $index++;
    } 
    //this was done using '/' as a delimeter for practice. Alternatively, if the user reliably
    //inputs the dates in mm/dd/yyyy format, we could just enter certain subsections of indexes
    //into array.
    //ex.
    }
    else
    {
    $dateOut[0] = substr($dateIn,0,2);
    $dateOut[1] = substr($dateIn,3,2);
    $dateOut[2] = substr($dateIn,6,4);
    }
    
    return $dateOut;
}


//Incredibly convuluted way to determine if birthday has passed this year.
//Gets the days of the year in terms of number. Adjusts for leap year.
//Wanted practice using switch statements.
function dayOfYear($date)
{
    $dateArray = dateParser($date);
    $month = 0;
    $day = 1;
    $year = 2;
    $daysInMonth = 0;
    $dayOfYear = 0;
    $index = 1;
    
    while($index < $dateArray[$month])
{
        
    $switchVariable = $dateArray[$month];

    switch($switchVariable)
    {
        case 1:
        $daysInMonth = 31;
        break;
        
        case 2:
        if($dateArray[$year] % 4 == 0 && ($dateArray[$year] % 100 != 0))
        {
        $daysInMonth = 29;
        }
        elseif(($dateArray[$year] % 4 == 0) && ($dateArray[$year] % 400 == 0))
        {
        $daysInMonth = 29;
        }
        else
        {
        $daysInMonth = 28;
        }
        break;
        
        case 3:
        $daysInMonth = 31;
        break;
        
        case 4:
        $daysInMonth = 30;
        break;
        
        case 5:
        $daysInMonth = 31;
        break;
        
        case 6:
        $daysInMonth = 30;
        break;
        
        case 7:
        $daysInMonth = 31;
        break;
        
        case 8:
        $daysInMonth = 31;
        break;
        
        case 9:
        $daysInMonth = 30;
        break;
        
        case 10:
        $daysInMonth = 31;
        break;
        
        case 11:
        $daysInMonth = 30;
        break;
        
        case 12:
        $daysInMonth = 31;
        break;
        
        default:
        $daysInMonth = 0;
    }
    
    $dayOfYear += $daysInMonth;
    $index++;
}
    
    $dayOfYear += $dateArray[$day];
    
    return $dayOfYear;
    
}

function getBirthDate($birthdate)
{
    global $iAmPracticing;
    
    //Makes it easier to refer to day/month/years in arrays
    $month = 0;
    $day = 1;
    $year = 2;
    
    $sameMonth = false;
    $sameDay = false;
    $sameYear = false;
    
	$keys = array('age', 'birthday');
	$ageMod = 0; //adjusts age depending on whether it is the user's birthday or not
	
	$answer = array(2);
	$returnArray = array();
	
	if($iAmPracticing) //Creates arrays through dateArray object
	{
	$birthday = new dateArray(dateParser($birthdate));
	$today = new dateArray(dateParser(date("m/d/Y")));
	$birthArray = array($birthday->month,$birthday->day,$birthday->year);
	$todayArray = array($today->month , $today->day, $today->year);
	}
	else //Uses only the date parser
	{
	    $birthArray = dateParser($birthdate);
	    $todayArray = dateParser(date("m/d/Y"));
	}
	
	$sameMonth = ($todayArray[$month] == $birthArray[$month]);
	$sameDay = ($todayArray[$day] == $birthArray[$day]);
	$sameYear = ($todayArray[$year] == $birthArray[$year]);
	
	if($sameMonth && $sameDay)
	{
//	echo "wrong!";
	$answer[1] = 1;
	}
	else
	{
//	echo "wrong!";
	$answer[1] = 0;
	$ageMod = -1;
	}
	
	if($iAmPracticing)
	{
	    if(dayOfYear($todayArray) > dayOfYear($birthArray))
	    $ageMod = 0;
	}
	else
	{
	if($todayArray[$day] >= $birthArray[$day])
	{
	    if($todayArray[$month] >= $birthArray[$month])
	    {
	    $ageMod = 0;
	    }
	}
	}
	$answer[0] = $todayArray[$year] - $birthArray[$year] + $ageMod;
	
	$returnArray = array_combine($keys,$answer);
	
//	print_r($birthArray);
//	print_r($todayArray);
	
	return $returnArray;
}

print_r(getBirthDate('01/23/1985'));

?>