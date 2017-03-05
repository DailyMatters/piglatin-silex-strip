<?php

namespace Piglatin;

use Piglatin\Config;

class Piglatin
{

	//Public variables
	public $vowels = 'aeiou';
	public $vowelTermination = "way";
	public $consonants = 'b-df-hj-np-tv-z';

	/**
	* Prepares a sentence to be translated
	*
	* @param string $input Transforms a string into an array to be translated
	*
	* @return array An array with all the words of the sentence
	*/
	public function convert($input)
	{
		$return = "";
		$wordArray = $this->multiexplode(array(" ", "-"), $input);
		
		foreach($wordArray as $word){
			$return .= $this->translate($word);
			$return .= " ";
		}
		
		return rtrim($return);
	}

	/**
	* Translates a word to pig latin 
	*
	* @param string $input The word to translate
	*
	* @return The translated word according to the rules
	*/
	public function translate($input)
	{
		$translation = "";

		if(!empty($input)){

			if(is_numeric($input)){
				return $input;
			}

			if($this->startVowel($input)){
				$input = $input . $this->vowelTermination;
				return $input;
			}

			if($this->startConsonant($input) && strlen($input)===1 ){
				return $input.'ay';
			}

			if($this->startConsonant($input)){
				$input = preg_replace('/^([b-df-hj-np-tv-z]*)([aeiouy].*)$/', "$2$1ay", $input);;
				return $input;
			}
		}

		return $translation;
	}

	/**
	* Checks if a word starts with a vowel
	*
	* @param string $input The word to check
	*
	* @return boolean
	*/
	public function startVowel($input)
	{
		$regex = '/^['.$this->vowels.']/i';

		if(preg_match($regex, $input)){
			return true;
		}
		return false;
	}

	/**
	* Checks if a word starts with a consonant
	*
	* @param string $input The word to check
	*
	* @return boolean
	*/
	public function startConsonant($input)
	{
		$regex = '/^['.$this->consonants.']/i';

		if(preg_match($regex, $input)){
			return true;
		}
		return false;
	}

	/**
	* Explodes a string using multiple delimiters
	*
	* @param array $delimiters The delimiters to use
	* @param string $string The string to split
	*
	* @return array $launch An array with all splited words
	*/
	public function multiexplode ($delimiters,$string) {

    	$ready = str_replace($delimiters, $delimiters[0], $string);
    	$launch = explode($delimiters[0], $ready);
    
    	return $launch;
	}
}