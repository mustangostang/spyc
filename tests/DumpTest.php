<?php

require_once ("../spyc.php");

class DumpTest extends PHPUnit_Framework_TestCase {
    public function testDump() {
      $yaml = Spyc::YAMLLoad('../spyc.yaml');
      $dump = Spyc::YAMLDump ($yaml);
      $yaml_after_dump = Spyc::YAMLLoad ($dump);
      $this->assertEquals ($yaml, $yaml_after_dump);
    }

    public function testDumpWithQuotes() {
      $Spyc = new Spyc();
      $Spyc->setting_dump_force_quotes = true;
      $yaml = $Spyc->YAMLLoad('../spyc.yaml');
      $dump = $Spyc->YAMLDump ($yaml);
      $yaml_after_dump = Spyc::YAMLLoad ($dump);
      $this->assertEquals ($yaml, $yaml_after_dump);
    }

}