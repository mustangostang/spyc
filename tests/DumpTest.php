<?php

require_once ("../spyc.php");

class DumpTest extends PHPUnit_Framework_TestCase {
    public function testDump() {
      $yaml = spyc_load(file_get_contents('../spyc.yaml'));
      $dump = Spyc::YAMLDump ($yaml);
      $yaml_after_dump = Spyc::YAMLLoad ($dump);
      $this->assertEquals ($yaml, $yaml_after_dump);
    }

    public function testDumpWithQuotes() {
      $Spyc = new Spyc();
      $Spyc->setting_dump_force_quotes = true;
      $yaml = $Spyc->load(file_get_contents('../spyc.yaml'));
      $dump = $Spyc->dump ($yaml);
      $yaml_after_dump = Spyc::YAMLLoad ($dump);
      $this->assertEquals ($yaml, $yaml_after_dump);
    }

    public function testDumpArrays() {
      $dump = Spyc::YAMLDump(array ('item1', 'item2', 'item3'));
      $awaiting = "---\n- item1\n- item2\n- item3\n";
      $this->assertEquals ($awaiting, $dump);
    }

}