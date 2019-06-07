<?php
namespace Spyc\Tests;

use Spyc\Spyc;
use PHPUnit\Framework\TestCase;

class FailingParseTest extends TestCase {

    protected $yaml;

    protected function setUp(): void
    {
      $this->markTestSkipped(
        'Not working under PHP 7.x.'
      );

      $this->yaml = spyc_load_file(__DIR__.DIRECTORY_SEPARATOR.'spyc.yaml');
    }

    public function testSeq0() 
    {
      $this->assertEquals("PHP Class", $this->yaml[0]);
    }
    
    public function testHash_3() 
    {
      $this->assertEquals('Hash(#) can appear in key too', $this->yaml['hash#3']);
    }

    public function testMultilines() 
    {
      $this->assertSame(array(array('type' => 'SomeItem', 'values' => array('blah', 'blah', 'blah', 'blah'), 'ints' => array(2, 54, 12, 2143))), $this->yaml['multiline_items']);
    }

    public function testManyNewlines() 
    {
      $this->assertSame('A quick
fox


jumped
over





a lazy



dog', $this->yaml['many_lines']);
    }
}
