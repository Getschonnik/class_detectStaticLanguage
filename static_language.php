 <?php
 
class staticLanguage {

	public $language;
	public $availableLanguages = array();
	
	public function __construct($lang) {
		$this->language = $lang;
	}

	// detect languages 
	public function detectLanguages($text) {
		$sox = explode('{[',$text);
		for($a=0; $a<count($sox);$a++) {
			$eox = explode(']}', $sox[$a]);
			if(!in_array($eox[0], $this->availableLanguages)) {
				$this->availableLanguages[] = $eox[0];
			}
		}
	}
	
	// Get only the selected language text
	public function getTextByLanguage($text) {
		if(in_array($this->language, $this->availableLanguages)) {
			$output = "";
			$fix = explode('{['.$this->language.']}', $text);
			for($b=0; $b<count($fix); $b++) {
				$tmp = explode('{[', $fix[$b]);
				$output .= $tmp[0];
			}
			return $output;
		} else {
			return $text;
		}
	}

}

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


?>
