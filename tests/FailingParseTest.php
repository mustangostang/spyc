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

      $this->yaml = spyc_load_file(__DIR__.'spyc.yaml');
    }

    public function testSeq0() 
    {
      $this->assertEquals("PHP Class", $this->yaml[0]);
    }
}
