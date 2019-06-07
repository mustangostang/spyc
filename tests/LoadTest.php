<?php
namespace Spyc\Tests;

use Spyc\Spyc;
use PHPUnit\Framework\TestCase;

class LoadTest extends TestCase 
{
    public function testQuotes() 
    {
        $test_values = array(
            "adjacent '''' \"\"\"\" quotes.",
            "adjacent '''' quotes.",
            "adjacent \"\"\"\" quotes.",
        );
        foreach($test_values as $value) {
            $yaml = array($value);
            $dump = Spyc::YAMLDump($yaml);
            $spyc_loaded = Spyc::YAMLLoad($dump);
            $this->assertEquals($yaml, $spyc_loaded);
        }
    }
}
