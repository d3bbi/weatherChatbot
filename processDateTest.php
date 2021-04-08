<?php declare(strict_types=1);
require './vendor/autoload.php';



class processDateTest extends PHPUnit\Framework\TestCase {
/**
 * processDate() test case.
 */


    public function testProcessDate(): void
    {
		require_once "processDate.php";
		
		$expected = "Great, now which country are you planning to visit?";
		
        $this->assertEquals($expected,$processDate("20-06-2021"));
    }

    public function testFailure2(): void
    {
        $this->assertEquals('bar', 'bar');
    }
}

?>