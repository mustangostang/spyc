<?php

require_once ("../spyc.php");

function roundTrip($a) { return Spyc::YAMLLoad(Spyc::YAMLDump(array('x' => $a))); }


class RoundTripTest extends PHPUnit_Framework_TestCase {

    protected function setUp() {
    }

    public function testNull() {
      $this->assertEquals (array ('x' => null), roundTrip (null));
    }

    public function testY() {
      $this->assertEquals (array ('x' => 'y'), roundTrip ('y'));
    }

    public function test5() {
      $this->assertEquals (array ('x' => '5'), roundTrip ('5'));
    }

    public function testSpaces() {
      $this->assertEquals (array ('x' => 'x '), roundTrip ('x '));
    }

    public function testNewLines() {
      $this->assertEquals (array ('x' => "\n"), roundTrip ("\n"));
    }

    public function testHashes() {
      $this->assertEquals (array ('x' => array ("#color" => '#fff')), roundTrip (array ("#color" => '#fff')));
    }

    public function testWordWrap() {
      $this->assertEquals (array ('x' => "aaaaaaaaaaaaaaaaaaaaaaaaaaaa  bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb"), roundTrip ("aaaaaaaaaaaaaaaaaaaaaaaaaaaa  bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb"));
    }

   
}