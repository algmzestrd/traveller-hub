<?php
function getTLD($domain)
{
	
	$answer = "";
	$last = strrpos($domain,chr(46),-2);
	
	while($last < strlen($domain))
	{
	if($domain[$last] != chr(46))
	$answer .= $domain[$last];
	$last++;

	}
	
	return $answer;
}

echo getTLD("www.iastate.edu");
?>