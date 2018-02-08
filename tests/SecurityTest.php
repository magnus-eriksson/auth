<?php namespace Tests;

use PHPUnit\Framework\TestCase;
use Maer\Auth\Security;

/**
 * @coversClass Maer\Auth\Security
 */
class SecurityTest extends TestCase
{
    protected $sec;

    public function setUp()
    {
        $this->sec = new Security;
    }

    /**
    * @covers ::hashPassword
    */
    public function testHashAndVerifyPassword()
    {
        $password = 'test';
        $hash     = $this->sec->hashPassword($password);

        $this->assertTrue($this->sec->verifyPassword($password, $hash), 'Verify correct password');
        $this->assertFalse($this->sec->verifyPassword('Not the same', $hash), 'Verify incorrect password');
    }

    /**
    * @covers ::getRandomString
    */
    public function testGetRandomString()
    {
        $string1 = $this->sec->getRandomString(32);
        $string2 = $this->sec->getRandomString(32);

        $this->assertEquals(64, strlen($string1), 'Check the lenght of random string 1');
        $this->assertEquals(64, strlen($string2), 'Check the lenght of random string 2');
        $this->assertNotEquals($string1, $string2, 'Check that string 1 and string 2 are different');
    }
}
