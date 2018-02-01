<?php

required "static_language.php";

//
// Here the text from a file or database
//
$txt ='
	{[en]}This is an example. 
	{[de]}Das ist ein Bespiel. 
	{[en]}Mixed is possible. 
	{[fr]}c\'est un exemple. 
	{[de]}Ich bin ein Berliner
		';

//
// Get the german text
//
$translate = new staticLanguage("de");
$translate->detectLanguages($txt);
echo $translate->getTextByLanguage($txt);
echo "<br />";

//
// Get the english text
//
$translate = new staticLanguage("en");
$translate->detectLanguages($txt);
echo $translate->getTextByLanguage($txt);
echo "<br />";

//
// Get the french text
//
$translate = new staticLanguage("fr");
$translate->detectLanguages($txt);
echo $translate->getTextByLanguage($txt);
echo "<br />";

//
// Another example where only one language tag is includes
//
$txt2 = "{[en]}<br />Hello World!";
$translate = new staticLanguage("en");
$translate->detectLanguages($txt2);
echo $translate->getTextByLanguage($txt2);

// HINT: By the last example ($txt2) the staticLanguage-tag 
//       {[en]} is NOT necessary IF you support one language only.

?>
