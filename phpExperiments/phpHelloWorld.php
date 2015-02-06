<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="Content-Style-Type" content="text/css">
  <title></title>
  <meta name="Generator" content="Cocoa HTML Writer">
  <meta name="CocoaVersion" content="1343.16">
  <style type="text/css">
    p.p1 {margin: 0.0px 0.0px 0.0px 0.0px; font: 12.0px Helvetica}
    p.p2 {margin: 0.0px 0.0px 0.0px 0.0px; font: 12.0px Helvetica; min-height: 14.0px}
  </style>
</head>
<body>
<p class="p1">&lt;html&gt;</p>
<p class="p1">&lt;head&gt;</p>
<p class="p1">&lt;title&gt;Online PHP Script Execution&lt;/title&gt;</p>
<p class="p1">&lt;/head&gt;</p>
<p class="p1">&lt;body&gt;</p>
<p class="p1">&lt;?php</p>
<p class="p1">function helloWorld($count)</p>
<p class="p1">{</p>
<p class="p1"><span class="Apple-converted-space">    </span>$answer = "";</p>
<p class="p1"><span class="Apple-converted-space">    </span>$total = 0;</p>
<p class="p2"><br></p>
<p class="p2"><span class="Apple-converted-space">    </span></p>
<p class="p1"><span class="Apple-converted-space">    </span>for($i = 0; $i &lt; $count; $i++)</p>
<p class="p1"><span class="Apple-converted-space">    </span>{</p>
<p class="p1"><span class="Apple-converted-space">        </span>$answer .= "HELLO WORLD\n";</p>
<p class="p1"><span class="Apple-converted-space">    </span>}</p>
<p class="p2"><br></p>
<p class="p1"><span class="Apple-converted-space">    </span>return $answer;</p>
<p class="p1">}</p>
<p class="p2"><br></p>
<p class="p1">echo helloWorld(5); //Prints result of executed function.</p>
<p class="p2"><br></p>
<p class="p1">?&gt;</p>
<p class="p1">&lt;/body&gt;</p>
<p class="p1">&lt;/html&gt;</p>
</body>
</html>
