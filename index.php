<?php

// Test #1 #2
$name = "UserName";
$age = 32;
echo "Welcome home, '".$name."'! Here you are safe! You are ".$age." years old for now! <br>";

// Test #3

$a = 600;
$b = 96;
$rez = $a + $b;
echo "\$a = ".$a."<br>";
echo "\$b = ".$b."<br>";
echo "\$a + \$b = ".$rez."<br>";

// Test #4
$first = 22;
$second = 19;
$first=$first+$second-($second=$first);
$second=$second+$second-($second=$first);

echo "\$first = ".$first."<br>";
echo "\$second = ".$second."<br>";
// echo $first=$first+$second-($second=$first);
echo $first=$first+$second-($second=$first)."<br>";
echo $second."<br>";

// Test #4

printf ('<div><h3>Question 1</h3><label> Answer1 <input type="radio" name="a1" value="1"></label>
<label> Answer2 <input type="radio" name="a2" value="2"></label>
<label> Answer3 <input type="radio" name="a3" value="3"></label>
<label> Answer4 <input type="radio" name="a1" value="1"></label></div>
<div>
<label> Answer1 <input type="checkbox" name="b2" value="2"></label>
<label> Answer2 <input type="checkbox" name="b2" value="2"></label>
<label> Answer3 <input type="checkbox" name="b2" value="2"></label>
<label> Answer4 <input type="checkbox" name="b2" value="2"></label>
</div>
<div>
<label> Answer:
  <textarea type="textarea">Enter here...</textarea>
</label>
</div>');

// Test #5

$tag = 'div';
$bgColor = '#5e6a60';
$color = '#e387db';
$width = '100px';
$height = '100px';

 ?>
<<?php echo $tag ?> style="background:<?= $bgColor ?>; color:<?= $color?>; width:<?=$width?>; height:<?=$height?>">
Some exapmple text
</<?php echo $tag ?>>
