<?php

namespace Solaris\Pupil;

use \Carbon\Carbon;

/**
 * A UPN is allocated once andidentifies state school pupils through
 * their entire career regardless of school change.
 *
 * A UPN is comprised 13 characters:
 *  - A check letter
 *  - LA number
 *  - school establishment number
 *  - YY of allocation
 *  - 3-digit school incremental serial number
 *
 */
class Upn
{
    /**
     * The computed check letter for the UPN.
     *
     * @var string
     */
    public $checkLetter;

    /**
     * The 3-digit LA number. E.g., 373 (Sheffield)
     *
     * @var int
     */
    public $laNumber;

    /**
     * The 4-digit establishment number. E.g., 3402 (St Catherine's)
     *
     * @var int
     */
    public $dfeEstablishmentNumber;

    /**
     * The admission round year.
     *
     * @var \Carbon\Carbon
     */
    public $yearOfAllocation;

    /**
     * An incremental serial to guarantee each record is unique.
     *
     * @var int
     */
    public $serialNumber;


    public function __construct($laNumber = null, $dfeEstablishmentNumber = null, $serialNumber = null)
    {
        $this->yearOfAllocation = Carbon::now();
        $this->setLaNumber($laNumber);
        $this->setdfeEstablishmentNumber($dfeEstablishmentNumber);
        $this->setSerialNumber($serialNumber);
    }

    public function setLaNumber($laNumber)
    {
        $this->laNumber = (string) $laNumber;
    }

    public function setdfeEstablishmentNumber($dfeEstablishmentNumber)
    {
        $this->dfeEstablishmentNumber = $dfeEstablishmentNumber;
    }

    public function setSerialNumber($serialNumber)
    {
        $this->serialNumber = $serialNumber;
    }

    public function getNumerialSegment()
    {
        return $this->laNumber
             . $this->dfeEstablishmentNumber
             . $this->yearOfAllocation
             . $this->serialNumber;
    }

    public function multiplyByCharacterNumbers()
    {
    }
}
