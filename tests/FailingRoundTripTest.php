<?php
namespace Spyc\Tests;

use Spyc\Spyc;
use PHPUnit\Framework\TestCase;

function xroundTrip($a) { return Spyc::YAMLLoad(Spyc::YAMLDump(array('x' => $a))); }

class FailingRoundTripTest extends TestCase 
{
    protected function setUp(): void
    {
    }

    public function testNewLines() 
    {
      $this->assertEquals(array('x' => "\n"), xroundTrip("\n"));
    }   
}
