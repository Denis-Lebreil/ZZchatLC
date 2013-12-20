<?php

require_once(__dir__.'/../sanitize.php');

class sanitizeTest extends PHPUnit_Framework_TestCase
{
	 protected function setUp()
	 {
	 
	 }
	 
    public function testTrue()
    {
//asserting that we can write a working test 
    $testtrue = true;
    $this->assertTrue($testtrue);

	return false;
    }
	public function testsanitizeStrict()
    {
// asserting that the regex is ok for letters and numbers
    $input = 'test87';
	$output = sanitizeStrict($input);
	
    $this->assertEquals( $output , 'test87' , 'fail sanitizeStrict '.$input);
// asserting that the regex block other characters on the two next tests
	$input = 'test&';
	$output = sanitizeStrict($input);
	
    $this->assertEquals( $output , 'test' , 'fail sanitizeStrict '.$input);

	
    $input = 'test#';
	$output = sanitizeStrict($input);
	
    $this->assertEquals( $output , 'test' , 'fail sanitizeStrict '.$input);	
	
	return false;
    }
    
	public function testsanitize()
    {
    $input = 'test';
	$output = sanitize($input);
	
    $this->assertEquals( $output , 'test' , 'fail sanitize '.$input);


    $input = 'test&';
	$output = sanitize($input);
	
    $this->assertEquals( $output , 'test&amp;' , 'fail sanitize '.$input);


    $input = 'test#';
	$output = sanitize($input);
	
    $this->assertEquals( $output , 'test#' , 'fail sanitize '.$input);	
    
//we assert that BBcode tags are correctly replaced by html tags    
    $input = '[i][u][b]test[/b][/u][/i]';
	$output = sanitize($input);
	
    $this->assertEquals( $output , '<i><u><b>test</b></u></i>' , 'fail sanitize '.$input);

//we assert that html tags are eliminated    
	$input = '<script>alert("test");</script>';
	$output = sanitize($input);
	
    $this->assertEquals( $output , '&lt;script&gt;alert(&quot;test&quot;);&lt;/script&gt;' , 'fail sanitize '.$input);
        	

	return false;
    }
    
	
	
	
    protected function tearDown()
    {
    
    }
}
?>
