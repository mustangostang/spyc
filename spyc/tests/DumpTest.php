<?php

require_once ("../spyc.php");

class DumpTest extends PHPUnit_Framework_TestCase {
    public function testDump() {
      $yaml = Spyc::YAMLLoad('../spyc.yaml');
      $yaml_after_dump = Spyc::YAMLLoad (Spyc::YAMLDump ($yaml));
      $this->assertEquals ($yaml, $yaml_after_dump);
    }
}