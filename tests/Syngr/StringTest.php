<?php
namespace Syngr;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.1 on 2013-09-22 at 08:42:26.
 */
class StringTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var String
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new String('foobar');
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     */
    public function testGetInitialLength()
    {
        $this->assertEquals(6, $this->object->getLength());
    }

    /**
     */
    public function testGetInitialContent()
    {
        $this->assertEquals('foobar', $this->object);
    }

    /**
     * @covers Syngr\String::join()
     */
    public function testJoin()
    {
        $data = array('foo', 'bar');
        $this->assertEquals(
            'foobar',
            $this->object->join('', $data)
        );
    }

    /**
     * @covers Syngr\String::join()
     */
    public function testJoinWithDelimiter()
    {
        $data = array('foo', 'bar');
        $this->assertEquals(
            'foo bar',
            $this->object->join(' ', $data)
        );
    }

    /**
     * @covers Syngr\String::Split()
     */
    public function testSplitByLength()
    {
        $this->assertCount(2, $this->object->split(3));
    }

    /**
     * @covers Syngr\String::Split()
     */
    public function testSplitByDelimiter()
    {
        $this->object->setContent('foo:bar');
        $this->assertCount(2, $this->object->split(':'));
    }

    /**
     * @covers                   Syngr\String::Split()
     * @expectedException        Exception
     * @expectedExceptionMessage Invalid delimiter/length given
     */
    public function testSplitWithInvalidSplitterException()
    {
        $this->object->split(array());
    }

    /**
     * @covers Syngr\String::compare()
     */
    public function testCompare()
    {
        $this->assertTrue($this->object->compare('foobar'));
    }

    /**
     * @covers Syngr\String::compare()
     */
    public function testCompareCaseInsensitive()
    {
        $this->assertTrue(
            $this->object->compare('FOOBAR', array(String::CASE_INSENSITIVE))
        );
    }

    /**
     * @covers Syngr\String::compare()
     */
    public function testCompareFailure()
    {
        $this->assertFalse($this->object->compare('FOOBAR'));
    }

    /**
     * @covers Syngr\String::compare()
     */
    public function testCompareCaseInsensitiveFailure()
    {
        $this->assertFalse(
            $this->object->compare('WEEFAW', array(String::CASE_INSENSITIVE))
        );
    }

    /**
     * @covers Syngr\String::compare()
     * @expectedException Exception
     * @expectedExceptionMessage Cannot compare integer with string
     */
    public function testCompareWithNonStringException()
    {
        $this->object->compare(666);
    }

    /**
     * @covers Syngr\String::compare()
     */
    public function testCompareNaturalOrder()
    {
        $this->object->setContent('img1');
        $this->assertTrue(
            $this->object->compare('img1', array(String::ORDER_NATURAL))
        );
    }

    /**
     * @covers Syngr\String::compare()
     */
    public function testCompareNaturalOrderFailure()
    {
        $this->object->setContent('img1');
        $this->assertFalse(
            $this->object->compare('img2', array(String::ORDER_NATURAL))
        );
    }

    /**
     * @covers Syngr\String::compare()
     */
    public function testCompareNaturalOrderCaseInsensitive()
    {
        $this->object->setContent('img1');
        $this->assertTrue(
            $this->object->compare(
                'IMG1',
                array(String::CASE_INSENSITIVE, String::ORDER_NATURAL)
            )
        );
    }

    /**
     * @covers Syngr\String::compare()
     */
    public function testCompareNaturalOrderCaseInsensitiveFailure()
    {
        $this->object->setContent('img1');
        $this->assertFalse(
            $this->object->compare(
                'IMG2',
                array(String::CASE_INSENSITIVE, String::ORDER_NATURAL)
            )
        );
    }

    /**
     * @covers Syngr\String::utf8()
     * @todo [description]
     */
    public function testUtf8Encode()
    {
        $this->markTestIncomplete('Not yet implemented');
    }

    /**
     * @covers Syngr\String::utf8()
     * @todo [description]
     */
    public function testUtf8Decode()
    {
        $this->markTestIncomplete('Not yet implemented');
    }

    /**
     * @covers Syngr\String::hash()
     */
    public function testHash()
    {
        $this->assertEquals(
            '3858f62230ac3c915f300c664312c63f',
            $this->object->hash()
        );
    }

    /**
     * @covers Syngr\String::hash()
     */
    public function testHashWithSha1()
    {
        $this->assertEquals(
            '8843d7f92416211de9ebb963ff4ce28125932878',
            $this->object->hash('sha1')
        );
    }

    /**
     * @covers Syngr\String::html_decode()
     */
    public function testHtml_decode()
    {
        $this->markTestIncomplete('Not yet implemented');
    }

    /**
     * @covers Syngr\String::html_encode()
     */
    public function testHtml_encode()
    {
        $this->markTestIncomplete('Not yet implemented');
    }

    /**
     * @covers Syngr\String::substring
     */
    public function testSubstring()
    {
        $this->assertStringEndsWith('bar', (string) $this->object->substring(2));
    }

    /**
     * @covers Syngr\String::trim()
     */
    public function testTrim()
    {
        $this->object->setContent('   foobar   ');
        $this->assertEquals(
            'foobar',
            $this->object->trim());
    }

    /**
     * @covers Syngr\String::trim()
     */
    public function testTrimLeft()
    {
        $this->object->setContent('   foobar   ');
        $this->assertEquals(
            'foobar   ',
            $this->object->trim(' ', array(String::STRING_LEFT))
        );
    }

    /**
     * @covers Syngr\String::trim()
     */
    public function testTrimRight()
    {
        $this->object->setContent('   foobar   ');
        $this->assertEquals(
            '   foobar',
            $this->object->trim(' ', array(String::STRING_RIGHT))
        );
    }

    /**
     * @covers Syngr\String::trim()
     */
    public function testTrimCharacters()
    {
        $this->object->setContent('$$$foobar£££');
        $this->assertEquals(
            'foobar',
            $this->object->trim('$£')
        );
    }

    /**
     * @covers Syngr\String::uppercase
     */
    public function testUppercase()
    {
        $this->assertEquals('FOOBAR', $this->object->uppercase());
    }

    /**
     * @covers Syngr\String::lowercase
     */
    public function testLowercase()
    {
        $this->object->setContent('FOOBAR');
        $this->assertEquals('foobar', $this->object->lowercase());
    }

    /**
     * @covers Syngr\String::pad()
     */
    public function testPad()
    {
        $this->assertEquals(
            'foobar   ',
            $this->object->pad(3)
        );
    }

    /**
     * @covers Syngr\String::pad()
     */
    public function testPadLeft()
    {
        $this->assertEquals(
            '   foobar',
            $this->object->pad(3, ' ', array(String::STRING_LEFT))
        );
    }

    /**
     * @covers Syngr\String::pad()
     */
    public function testPadBoth()
    {
        $this->assertEquals(
            '  foobar  ',
            $this->object->pad(4, ' ', array(String::STRING_BOTH))
        );
    }

    /**
     * @covers Syngr\String::pad()
     */
    public function testPadCharacters()
    {
        $this->markTestIncomplete('Not yet implemented');
    }

    /**
     * @covers Syngr\String::reverse()
     */
    public function testReverse()
    {
        $this->assertEquals('raboof', $this->object->reverse());
    }

    /**
     * @covers Syngr\String::replace()
     */
    public function testReplaceWithString()
    {
        $this->assertEquals('feebar', $this->object->replace('oo', 'ee'));
    }

    /**
     * @covers Syngr\String::replace()
     */
    public function testReplaceWithCaseInsensitiveString()
    {
        $this->markTestIncomplete('Not yet implemented');
    }

    /**
     * @covers Syngr\String::replace()
     */
    public function testReplaceWithRegex()
    {
        $this->markTestIncomplete('Not yet implemented');
    }

    /**
     * @covers Syngr\String::replace()
     */
    public function testReplaceWithLimit()
    {
        $this->markTestIncomplete('Not yet implemented');
    }

}