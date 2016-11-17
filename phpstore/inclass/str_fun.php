<?php

//"Deleted code is debugged code.";
$line1 = "Deleted code";
$line2 = "is debugged code";
$line3 = $line1 . " " . $line2;
echo $line3;

echo "<h2>PHP String Functions</h2>";

echo "Uppercase: <br>";
echo strtoupper($line3);
echo "<br>";
echo "Lowercase: <br>";
echo strtolower($line3);
echo "<br>";

echo "Uppercase first word: <br>";
echo ucfirst($line3);
echo "<br>";

echo "Uppercase first letters: <br>";
echo ucwords($line3);
echo "<br>";

echo "----------------";echo "<br>";


echo "String Length: <br>";
echo strlen($line1);
echo "<br>";

echo "Remove leading or trailing space: <br>";
echo "Deleted" . trim(" code is ") . "debugged code";

echo "Find: <br>";  //returns everything after found word
echo strstr($line3, "code");
echo "<br>";

echo "Replace: <br>";   // three arguments (replace, replace with, where to look)
echo str_replace("debugged", "missing", $line3);
echo "<br>";

echo "----------------";echo "<br>";

echo "Repeat: <br>";
echo str_repeat($line1, 2);
echo "<br>";

echo "Create substring: <br>"; //make substring  (var, start pos, end pos)
echo substr($line2, 3, 5);
echo "<br>";

echo "Find Position: <br>";  //(var, word)
echo strpos($line3, "debugged");
echo "<br>";

echo "Find Character: <br>"; //(var, letter)

echo strchr($line1, "o");