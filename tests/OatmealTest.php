<?php
namespace DerekHamilton\Tests\Oatmeal;

use DerekHamilton\Oatmeal\Oatmeal;

class OatmealTest extends  \DerekHamilton\Tests\Oatmeal\TestCase
{
    /**
     * @runInSeparateProcess
     */
    public function testGet()
    {
        $_COOKIE['foo'] = 'bar';
        $oatmeal = new Oatmeal;
        $this->assertSame($oatmeal->get('foo'), 'bar');
    }

    /**
     * @runInSeparateProcess
     */
    public function testGetNotExists()
    {
        $oatmeal = new Oatmeal;
        $this->assertNull($oatmeal->get('notexists'));
    }

    /**
     * @runInSeparateProcess
     */
    public function testPull()
    {
        $_COOKIE['foo'] = 'bar';
        $oatmeal = new Oatmeal;
        $this->assertSame($oatmeal->pull('foo'), 'bar');
        $this->assertNull($oatmeal->get('foo'));
    }

    /**
     * @runInSeparateProcess
     */
    public function testSet()
    {
        $oatmeal = new Oatmeal;
        $this->assertTrue($oatmeal->set('foo', 'bar', 1));
    }

    /**
     * @runInSeparateProcess
     */
    public function testForever()
    {
        $oatmeal = new Oatmeal;
        $this->assertTrue($oatmeal->forever('foo', 'bar'));
    }

    /**
     * @runInSeparateProcess
     */
    public function testSetPath()
    {
        $oatmeal = new Oatmeal;
        $this->assertInstanceOf(Oatmeal::class, $oatmeal->setPath('/'));
    }

    /**
     * @runInSeparateProcess
     */
    public function testSetDomain()
    {
        $oatmeal = new Oatmeal;
        $this->assertInstanceOf(Oatmeal::class, $oatmeal->setDomain('example.com'));
    }

    /**
     * @runInSeparateProcess
     */
    public function testSetSecure()
    {
        $oatmeal = new Oatmeal;
        $this->assertInstanceOf(Oatmeal::class, $oatmeal->setSecure(true));
    }

    /**
     * @runInSeparateProcess
     */
    public function testSetHttpOnly()
    {
        $oatmeal = new Oatmeal;
        $this->assertInstanceOf(Oatmeal::class, $oatmeal->setHttpOnly(true));
    }

    /**
     * @runInSeparateProcess
     */
    public function testConfig()
    {
        $oatmeal = new Oatmeal([
            'path' => '/',
            'domain' => 'example.com',
            'secure' => true,
            'httpOnly' => false,
        ]);
        $this->assertTrue($oatmeal->set('foo', 'bar', 1));
    }
}
