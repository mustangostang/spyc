<?php
namespace Spyc\Tests;

use Spyc\Spyc;
use PHPUnit\Framework\TestCase;

function roundTrip($a) { return Spyc::YAMLLoad(Spyc::YAMLDump(array('x' => $a))); }

class RoundTripTest extends TestCase 
{
    protected function setUp(): void
    {
    }

    public function testNewLines() 
    {
      $this->assertEquals (array ('x' => "\n"), roundTrip ("\n"));
    }   
}
