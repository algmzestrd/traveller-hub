<?php
function helloWorld($count)
{
    $answer = ""; //Define empty string.
    $total = 0;

    
    for($i = 0; $i < $count; $i++)
    {
        $answer .= "HELLO WORLD\n";
    }

    return $answer; //echo prints out final result
}

echo helloWorld(5);
?>