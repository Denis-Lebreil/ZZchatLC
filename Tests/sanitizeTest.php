<?php

require_once(__dir__.'/../sanitize.php'

class sanitizeTest extends PHPUnit_Framework_TestCase
{
	 protected function setUp()
	 {
	 
	 }
	 
    public function testTrue()
    {
    $testtrue = true;
    $this->assertTrue($testtrue);

	return false;
    }
	public function testsanitizeStrict()
    {
    $input = 'test';
	$output = sanitize($input);
	
    $this->assertEquals( $output , 'test' , 'fail sanitizeStrict '.$input);

	$input = 'test&';
	$output = sanitize($input);
	
    $this->assertEquals( $output , 'test' , 'fail sanitizeStrict '.$input);
	
    $input = 'test#';
	$output = sanitize($input);
	
    $this->assertEquals( $output , 'test' , 'fail sanitizeStrict '.$input);	
	
	return false;
    }
	public function testsanitize()
    {
    $input = 'test';
	$output = sanitize($input);
	
    $this->assertEquals( $output , 'test' , 'fail sanitizeStrict '.$input);

    $input = 'test&';
	$output = sanitize($input);
	
    $this->assertEquals( $output , 'test&' , 'fail sanitizeStrict '.$input);

    $input = 'test#';
	$output = sanitize($input);
	
    $this->assertEquals( $output , 'test' , 'fail sanitizeStrict '.$input);	

	return false;
    }
    
	
	
	
    protected function tearDown()
    {
    
    }
}
?>
