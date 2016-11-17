<?php

echo "<h2>PHP A Few Array Functions </h2>";

$nums = array(5,35,10,30,15,25,20);

echo "<pre>";
echo print_r($nums);
echo "</pre>";


echo "Count: <br>";   //count($var)
echo "<pre>";
echo count($nums);
echo "</pre>";

echo "Max Value: <br>";  //max($var)
echo max($nums);
echo "<br>";

echo "Min Value: <br>";  //min($var)
echo min($nums);
echo "<br>";

echo "Sort: <br>";  //(no echo) sort($var);  print_r($var)  //can use <pre></pre>
                    // sorted in place destroyed old version
sort($nums);
print_r($nums);
echo "Reverse Sort: <br>"; //(no echo)  rsort($var>; print_r($var)
rsort($nums); print_r($nums);

echo "Convert Array to String: <br>";   //echo $stringvar = implode (" * ", $arrayvar);
echo $numstring = implode(" *", $nums);

echo "<br>--------------<br>";

