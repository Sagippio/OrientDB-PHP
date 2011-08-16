<?php

/**
 * @author Anton Terekhov <anton@netmonsters.ru>
 * @copyright Copyright Anton Terekhov, NetMonsters LLC, 2011
 * @license https://github.com/AntonTerekhov/OrientDB-PHP/blob/master/LICENSE
 * @link https://github.com/AntonTerekhov/OrientDB-PHP
 * @package OrientDB-PHP
 */

require_once 'OrientDB/OrientDB.php';

/**
 * OrientDBRecord() test in OrientDB tests
 *
 * @author Anton Terekhov <anton@netmonsters.ru>
 * @package OrientDB-PHP
 * @subpackage Tests
 */
class OrientDBRecordSpeedTest extends PHPUnit_Framework_TestCase
{

    public function testDecodeRecordTextValue()
    {
        $runs = 10;
        $pwd = dirname(realpath(__FILE__));
        $text = file_get_contents($pwd . '/data/CharterofFundamentalRightsoftheEuropeanUnion.txt');
        $content = 'text:' . OrientDBRecordEncoder::encodeString($text);
        $timeStart = microtime(true);
        for ($i = 0; $i < $runs; $i++) {
            $record = new OrientDBRecord();
            $record->content = $content;
            $record->parse();
        }
        $timeEnd = microtime(true);
        $this->assertSame($text, $record->data->text);
        // echo $timeEnd - $timeStart;
    }
}