<?php

require_once ("../spyc.php");

class ParseTest extends PHPUnit_Framework_TestCase {

    protected $yaml;

    protected function setUp() {
      $this->yaml = Spyc::YAMLLoad('../spyc.yaml');
    }

    public function testNumericKey() {
      $this->assertEquals ($this->yaml[1040], "Ooo, a numeric key!");
    }

    public function testMappingsString() {
      $this->assertEquals ($this->yaml['String'], "Anyone's name, really.");
    }

    public function testMappingsInt() {
      $this->assertSame ($this->yaml['Int'], 13);
    }

    public function testMappingsBooleanTrue() {
      $this->assertSame ($this->yaml['True'], true);
    }

    public function testMappingsBooleanFalse() {
      $this->assertSame ($this->yaml['False'], false);
    }

    public function testMappingsZero() {
      $this->assertSame ($this->yaml['Zero'], 0);
    }

    public function testMappingsNull() {
      $this->assertSame ($this->yaml['Null'], null);
    }

    public function testMappingsFloat() {
      $this->assertSame ($this->yaml['Float'], 5.34);
    }

    public function testSeq0() {
      $this->assertEquals ($this->yaml[0], "PHP Class");
    }

    public function testSeq1() {
      $this->assertEquals ($this->yaml[1], "Basic YAML Loader");
    }

    public function testSeq2() {
      $this->assertEquals ($this->yaml[2], "Very Basic YAML Dumper");
    }

    public function testSeq3() {
      $this->assertEquals ($this->yaml[3], array("YAML is so easy to learn.",
											"Your config files will never be the same."));
    }

    public function testSeqMap() {
      $this->assertEquals ($this->yaml[4], array("cpu" => "1.5ghz", "ram" => "1 gig",
											"os" => "os x 10.4.1"));
    }

    public function testMappedSequence() {
      $this->assertEquals ($this->yaml['domains'], array("yaml.org", "php.net"));
    }

    public function testAnotherSequence() {
      $this->assertEquals ($this->yaml[5], array("program" => "Adium", "platform" => "OS X",
											"type" => "Chat Client"));
    }

    public function testFoldedBlock() {
      $this->assertEquals ($this->yaml['no time'], "There isn't any time for your tricks!\nDo you understand?");
    }

    public function testLiteralAsMapped() {
      $this->assertEquals ($this->yaml['some time'], "There is nothing but time\nfor your tricks.");
    }

    public function testCrazy() {
      $this->assertEquals ($this->yaml['databases'], array( array("name" => "spartan", "notes" =>
																			array( "Needs to be backed up",
																						 "Needs to be normalized" ),
																			 "type" => "mysql" )));
    }

    public function testColons() {
      $this->assertEquals ($this->yaml["if: you'd"], "like");
    }

    public function testInline() {
      $this->assertEquals ($this->yaml[6], array("One", "Two", "Three", "Four"));
    }

    public function testNestedInline() {
      $this->assertEquals ($this->yaml[7], array("One", array("Two", "And", "Three"), "Four", "Five"));
    }

    public function testNestedNestedInline() {
      $this->assertEquals ($this->yaml[8], array( "This", array("Is", "Getting", array("Ridiculous", "Guys")),
									"Seriously", array("Show", "Mercy")));
    }

    public function testInlineMappings() {
      $this->assertEquals ($this->yaml[9], array("name" => "chris", "age" => "young", "brand" => "lucky strike"));
    }

    public function testNestedInlineMappings() {
      $this->assertEquals ($this->yaml[10], array("name" => "mark", "age" => "older than chris",
											 "brand" => array("marlboro", "lucky strike")));
    }

    public function testReferences() {
      $this->assertEquals ($this->yaml['dynamic languages'], array('Perl', 'Python', 'PHP', 'Ruby'));
    }

    public function testReferences2() {
      $this->assertEquals ($this->yaml['compiled languages'], array('C/C++', 'Java'));
    }

    public function testReferences3() {
      $this->assertEquals ($this->yaml['all languages'], array(
																		array('Perl', 'Python', 'PHP', 'Ruby'),
																		array('C/C++', 'Java')
																	 ));
    }

    public function testEscapedQuotes() {
      $this->assertEquals ($this->yaml[11],  "you know, this shouldn't work.  but it does.");
    }

    public function testEscapedQuotes_2() {
      $this->assertEquals ($this->yaml[12],  "that's my value.");
    }

    public function testEscapedQuotes_3() {
      $this->assertEquals ($this->yaml[13],  "again, that's my value.");
    }

    public function testQuotes() {
      $this->assertEquals ($this->yaml[14],  "here's to \"quotes\", boss.");
    }

    public function testQuoteSequence() {
      $this->assertEquals ($this->yaml[15],  array( 'name' => "Foo, Bar's", 'age' => 20));
    }

    public function testShortSequence() {
      $this->assertEquals ($this->yaml[16],  array( 0 => "a", 1 => array (0 => 1, 1 => 2), 2 => "b"));
    }

    public function testHash_1() {
      $this->assertEquals ($this->yaml['hash_1'],  "Hash");
    }

    public function testHash_2() {
      $this->assertEquals ($this->yaml['hash_2'],  'Hash #and a comment');
    }

    public function testHash_3() {
      $this->assertEquals ($this->yaml['hash#3'],  'Hash (#) can appear in key too');
    }

    public function testEndloop() {
      $this->assertEquals ($this->yaml['endloop'],  "Does this line in the end indeed make Spyc go to an infinite loop?");
    }

    public function testReallyLargeNumber() {
      $this->assertEquals ($this->yaml['a_really_large_number'],  '115792089237316195423570985008687907853269984665640564039457584007913129639936');
    }

    public function testFloatWithZeros() {
      $this->assertSame ($this->yaml['float_test'],  '1.0');
    }

    public function testFloatWithQuotes() {
      $this->assertSame ($this->yaml['float_test_with_quotes'],  '1.0');
    }

    public function testFloatInverse() {
      $this->assertEquals ($this->yaml['float_inverse_test'],  '001');
    }

    public function testIntArray() {
      $this->assertEquals ($this->yaml['int array'], array (1, 2, 3));
    }

    public function testArrayOnSeveralLines() {
      $this->assertEquals ($this->yaml['array on several lines'], array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19));
    }

}