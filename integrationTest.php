<?php

declare(strict_types=1);
require './vendor/autoload.php';

class integrationTest extends PHPUnit\Framework\TestCase
{
    /**
     * processDate() test case.
     */

    //Testing process date function returns correct result when date passed.
    public function testCycle(): void
    {
		require 'functions/functionProcessCountry.php';
		require 'functions/functionProcessCity.php';
		$countryArray = $processCountry('Ireland');
        $expected = [
            'weather',
            'The weather in ',
            'Dublin',
        ];
        $this->assertEquals($expected,$processCity('Dublin',json_encode($countryArray[3])));
    }
    
}
