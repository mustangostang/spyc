<?php

use Mustangostang\Spyc;

class LoadTest extends \PHPUnit\Framework\TestCase {
    public function testQuotes() {
        $test_values = array(
            "adjacent '''' \"\"\"\" quotes.",
            "adjacent '''' quotes.",
            "adjacent \"\"\"\" quotes.",
        );
        foreach($test_values as $value) {
            $yaml = array($value);
            $dump = Spyc::YAMLDump ($yaml);
            $yaml_loaded = Spyc::YAMLLoad ($dump);
            $this->assertEquals ($yaml, $yaml_loaded);
        }
    }
}
