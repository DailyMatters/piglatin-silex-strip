<?php

use Piglatin\Piglatin;

class PiglatinTest extends \PHPUnit_Framework_TestCase {

	public function testEmptyRequest()
	{
		$translation = new \PigLatin\PigLatin();
		$result = $translation->translate("");
	
		$this->assertEquals($result, "");
	}

	public function testOnlyNumericInputOrNumericString()
	{
		$translation = new \PigLatin\PigLatin();
		$input = rand(1, 99999);
		$result = $translation->translate($input);

		$numericString = "12569863";
		$result2 = $translation->translate($numericString);

		$this->assertEquals($input, $result);
		$this->assertEquals($numericString, $result2);
	}


	public function testInputIsASingleVowel()
	{
		$translation = new \PigLatin\PigLatin();
		$input = "a";
		$result = $translation->translate($input);

		$this->assertEquals($result, "away");
	}

	public function testInputIsASingleWordStartingWithVowel()
	{
		$translation = new \PigLatin\PigLatin();
		$input = "imbecil";
		$result = $translation->translate($input);

		$this->assertEquals($result, "imbecilway");
	}

	//Testign startVowel() method
	public function testStartVowelStartingWithVowel()
	{
		$translation = new \PigLatin\PigLatin();
		$wordVowel = "almond";
		$wordConsonant = "fig";

		$result = $translation->startVowel($wordVowel);
		$result2 = $translation->startVowel($wordConsonant);

		$this->assertTrue($result);
		$this->assertFalse($result2);
	}	

	//Testign startConsonant() method
	public function testStartVowelStartingWithConsonant()
	{
		$translation = new \PigLatin\PigLatin();
		$wordVowel = "almond";
		$wordConsonant = "fig";

		$result = $translation->startConsonant($wordVowel);
		$result2 = $translation->startConsonant($wordConsonant);

		$this->assertFalse($result);
		$this->assertTrue($result2);
	}

	public function testInputAsSingleConsonant()
	{
		$translation = new \PigLatin\PigLatin();
		$input = "t";
		$result = $translation->translate($input);

		$this->assertEquals($result, "tay");
	}

	public function testInputIsASingleWordStartingWithConsonant()
	{
		$translation = new \PigLatin\PigLatin();
		$input = "tomate";
		$result = $translation->translate($input);

		$this->assertEquals($result, "omatetay");
	}

	public function testInputIsASingleWordStartingWithMultipleConsonants()
	{
		$translation = new \PigLatin\PigLatin();
		$input = "crow";
		$result = $translation->translate($input);

		$this->assertEquals($result, "owcray");
	}

	public function testTranslateSmallTextToPig()
	{
		$translation = new \PigLatin\PigLatin();
		$input = "almond tomato crimson";

		$result = $translation->convert($input);

		$this->assertEquals($result, "almondway omatotay imsoncray");
	}

	public function testTestingYRoleAsBothVowelAndConsonant()
	{
		$translation = new \PigLatin\PigLatin();
		$input = "yellow style samyr";

		$result = $translation->convert($input);
		$this->assertEquals($result, "ellowyay ylestay amyrsay");
	}

	public function testHyphenedWords()
	{
		$translation = new \PigLatin\PigLatin();
		$input = "cor-de-amarelo";

		$result = $translation->convert($input);
		
		$this->assertEquals($result, "orcay eday amareloway");
	}

	public function testMultiExplode()
	{
		$translation = new \PigLatin\PigLatin();

		$input = "Test this,and,this plus&this";
		$delimiters = array(" ", ",", "&");

		$result = $translation->multiexplode($delimiters, $input);
		
		$this->assertEquals(count($result), 6);
	}
}
