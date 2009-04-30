<?php

require_once ("../spyc.php");

class IndentTest extends PHPUnit_Framework_TestCase {

    protected $Y;

    protected function setUp() {
      $this->Y = Spyc::YAMLLoad("indent_1.yaml");
    }

    public function testIndent_1() {
      $this->assertEquals (array ('child_1' => 2, 'child_2' => 0, 'child_3' => 1), $this->Y['root']);
    }

    public function testIndent_2() {
      $this->assertEquals (array ('child_1' => 1, 'child_2' => 2), $this->Y['root2']);
    }

    public function testIndent_3() {
      $this->assertEquals (array (array ('resolutions' => array (1024 => 768, 1920 => 1200), 'producer' => 'Nec')), $this->Y['display']);
    }

    public function testIndent_4() {
      $this->assertEquals (array (
          array ('resolutions' => array (1024 => 768)),
          array ('resolutions' => array (1920 => 1200)),
        ), $this->Y['displays']);

    }

}