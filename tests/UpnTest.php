<?php

use PHPUnit\Framework\TestCase;
use Solaris\Pupil\Upn;
use \Carbon\Carbon;

class UpnTest extends TestCase
{
    public $upn;

    public function setUp()
    {
        $this->upn = new Upn(001, 0203, 001);
    }

    public function tearDown()
    {
        $this->upn = null;
    }

    public function testLeadingZerosAreAdded()
    {
        $this->assertEquals($this->upn->laNumber, '001');
        $this->assertEquals($this->upn->dfeEstablishmentNumber, '0503');
        $this->assertEquals($this->upn->serialNumber, '001');
    }

    public function testNewUpnGeneratesCurrentYear()
    {
        $thisYear = Carbon::now();

        $this->assertEquals($thisYear->format('y'), $this->upn->yearOfAllocation->format('y'));
    }
}
