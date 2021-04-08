<?php declare(strict_types=1);
require './vendor/autoload.php';
require "processDate.php";


class processDateTest extends PHPUnit\Framework\TestCase {
/**
 * processDate() test case.
 */


    public function testFailure(): void
    {
        $this->assertEquals(1, 0);
    }

    public function testFailure2(): void
    {
        $this->assertEquals('bar', 'baz');
    }

    public function testFailure3(): void
    {
        $this->assertEquals("foo\nbar\nbaz\n", "foo\nbah\nbaz\n");
    }
}

?>

