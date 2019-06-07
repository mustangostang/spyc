<?php
namespace Spyc\Tests;

use Spyc\Spyc;
use PHPUnit\Framework\TestCase;

class FailingDumpTest extends TestCase 
{

    private $files_to_test = array();

    public function setUp(): void 
    {
      $this->markTestSkipped(
        'Not working under PHP 7.x.'
      );
      
      $this->files_to_test = array('spyc.yaml', 'failing1.yaml', 'indent_1.yaml', 'quotes.yaml');
    }

    public function testDump() 
    {
      foreach($this->files_to_test as $file) {
        $yaml = spyc_load(file_get_contents(__DIR__.DIRECTORY_SEPARATOR.$file));
        $dump = Spyc::YAMLDump($yaml);
        $spyc_after_dump = Spyc::YAMLLoad($dump);
        $this->assertEquals($yaml, $spyc_after_dump);
      }
    }

    public function testDumpWithQuotes() 
    {
      $Spyc = new Spyc();
      $Spyc->setting_dump_force_quotes = true;
      foreach($this->files_to_test as $file) {
        $yaml = $Spyc->load(file_get_contents(__DIR__.DIRECTORY_SEPARATOR.$file));
        $dump = $Spyc->dump($yaml);
        $spyc_after_dump = Spyc::YAMLLoad($dump);
        $this->assertEquals($yaml, $spyc_after_dump);
      }
    }
}
