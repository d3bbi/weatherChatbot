<?php declare(strict_types=1);
require './vendor/autoload.php';



class functionsTest extends PHPUnit\Framework\TestCase {
/**
 * processDate() test case.
 */

	//Testing process date function returns correct result when date passed.
    public function testProcessDatePositiveReturn(): void
    {
		require "functionProcessDate.php";
		
		$expected = array("country","Great, now which country are you planning to visit?","20-06-2021");
		
        $this->assertEquals($expected,$processDate("20-06-2021"));
    }
	//Testing process date function returns correct result when non date passed.
    public function testProcessDateNegativeReturn(): void
    {
		require "functionProcessDate.php";
		$expected = array("date","I'm sorry I didn't get that date. Can you try again?","banana");
		
        $this->assertEquals($expected,$processDate("banana"));
    }

    public function testFailure2(): void
    {
        $this->assertEquals('bar', 'bar');
    }
}

?>