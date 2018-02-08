<?php namespace Tests;

use PHPUnit\Framework\TestCase;
use Maer\Auth\Auth;
use Maer\Auth\Security;

/**
 * @coversClass Maer\Auth\Auth
 */
class AuthTest extends TestCase
{
    protected $sec;
    protected $auth;

    public function setUp()
    {
        $this->sec  = new Security;
        $this->auth = new Auth($this->sec);
    }

    /**
    * @covers ::hashPassword
    */
    public function testAuth()
    {
        $password = 'test';
        $hash     = $this->sec->hashPassword($password);
        $response = $this->auth->authenticate($password, $hash);

        $this->assertTrue($response, 'Verify correct password');
    }

    /**
    * @covers ::setCurrentUser
    */
    public function testCurrentUser()
    {
        $this->assertNull($this->auth->getCurrentUser(), 'Get current user (before set)');
        $this->assertFalse($this->auth->hasCurrentUser(), 'Check if user is set (before set)');

        $this->auth->setCurrentUser(['data']);

        $this->assertEquals(['data'], $this->auth->getCurrentUser(), 'Get current user (after set)');
        $this->assertTrue($this->auth->hasCurrentUser(), 'Check if user is set (after set)');

        $this->auth->setCurrentUser(null);

        $this->assertNull($this->auth->getCurrentUser(), 'Get current user (after unset)');
        $this->assertFalse($this->auth->hasCurrentUser(), 'Check if user is set (after unset)');
    }
}
