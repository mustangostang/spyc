<?php

use Mustangostang\Spyc;

class RoundTripTest extends \PHPUnit\Framework\TestCase {

    private function roundTrip($a) { 
        return Spyc::YAMLLoad(Spyc::YAMLDump(array('x' => $a))); 
    }

    protected function setUp() {
    }

    public function testNull() {
      $this->assertEquals (array ('x' => null), $this->roundTrip (null));
    }

    public function testY() {
      $this->assertEquals (array ('x' => 'y'), $this->roundTrip ('y'));
    }
    
    public function testExclam() {
      $this->assertEquals (array ('x' => '!yeah'), $this->roundTrip ('!yeah'));
    }

    public function test5() {
      $this->assertEquals (array ('x' => '5'), $this->roundTrip ('5'));
    }

    public function testSpaces() {
      $this->assertEquals (array ('x' => 'x '), $this->roundTrip ('x '));
    }
    
    public function testApostrophes() {
      $this->assertEquals (array ('x' => "'biz'"), $this->roundTrip ("'biz'"));
    }

    public function testNewLines() {
      $this->assertEquals (array ('x' => "\\n"), $this->roundTrip ("\n"));
    }

    public function testHashes() {
      $this->assertEquals (array ('x' => array ("#color" => '#fff')), $this->roundTrip (array ("#color" => '#fff')));
    }

    public function testPreserveString() {
      $result1 = $this->roundTrip ('0');
      $result2 = $this->roundTrip ('true');
      $this->assertTrue (is_string ($result1['x']));
      $this->assertTrue (is_string ($result2['x']));
    }

    public function testPreserveBool() {
      $result = $this->roundTrip (true);
      $this->assertTrue (is_bool ($result['x']));
    }

    public function testPreserveInteger() {
      $result = $this->roundTrip (0);
      $this->assertTrue (is_int ($result['x']));
    }

    public function testWordWrap() {
      $this->assertEquals (array ('x' => "aaaaaaaaaaaaaaaaaaaaaaaaaaaa  bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb"), $this->roundTrip ("aaaaaaaaaaaaaaaaaaaaaaaaaaaa  bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb"));
    }

    public function testABCD() {
      $this->assertEquals (array ('a', 'b', 'c', 'd'), Spyc::YAMLLoad(Spyc::YAMLDump(array('a', 'b', 'c', 'd'))));
    }
    
    public function testABCD2() {
        $a = array('a', 'b', 'c', 'd'); // Create a simple list
        $b = Spyc::YAMLDump($a);        // Dump the list as YAML
        $c = Spyc::YAMLLoad($b);        // Load the dumped YAML
        $d = Spyc::YAMLDump($c);        // Re-dump the data
        $this->assertSame($b, $d);
    }
   
}
