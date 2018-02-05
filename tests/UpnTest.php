<?php

use Solaris\Pupil\Upn;
use PHPUnit\Framework\TestCase;

class UpnTest extends TestCase
{
    public function testConcatenateNumber()
    {
        $upn = new Upn();
        $upn->laNumber = 373;
        $upn->dfeEstablishmentNumber = 3402;
        $upn->yearOfAllocation = 96;
        $upn->serialNumber = 1;
        $this->assertEquals($upn->generate(), 'V373340296001');
    }

    public function testCanSetRealProperty()
    {
        $upn = new Upn();
        $upn->laNumber = 123;
        $this->assertEquals($upn->laNumber, 123);
    }

    public function testCannotSetFalseProperty()
    {
        $upn = new Upn();
        $upn->falseProperty = 123;
        $this->assertNotEquals($upn->falseProperty, 123);
    }
}
