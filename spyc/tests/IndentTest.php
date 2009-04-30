<?php

require_once ("../spyc.php");

class IndentTest extends PHPUnit_Framework_TestCase {

    protected $Y;

    protected function setUp() {
      $this->Y = Spyc::YAMLLoad("indent_1.yaml");
    }

    public function testIndent_1() {
      $this->assertEquals ($this->Y['root'], array ('child_1' => 2, 'child_2' => 0, 'child_3' => 1));
    }

    public function testIndent_2() {
      $this->assertEquals ($this->Y['root2'], array ('child_1' => 1, 'child_2' => 2));
    }

}