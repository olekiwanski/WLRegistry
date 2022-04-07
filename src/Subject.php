<?php

namespace WLRegistryAPI;

class Subject
{
    /** @var  string */
    protected $name;
    /** @var  string */
    protected $nip;
    /** @var  string */
    protected $statusVat;
    /** @var  string */
    protected $regon;
    /** @var  string */
    protected $pesel;
    /** @var  string */
    protected $krs;
    /** @var  string */
    protected $residenceAddress;
    /** @var  string */
    protected $workingAddress;
    /** @var  array */
    protected array $representatives = [];
    /** @var  array */
    protected $authorizedClerks;
    /** @var  array */
    protected $partners;
    /** @var  string */
    protected $registrationLegalDate;
    /** @var  string */
    protected $registrationDenialBasis;
    /** @var  string */
    protected $restorationBasis;
    /** @var  string */
    protected $restorationDate;
    /** @var  string */
    protected $removalBasis;
    /** @var  string */
    protected $removalDate;
    /** @var  array */
    protected $accountNumbers = [];
    /** @var  bool */
    protected $hasVirtualAccounts;

    public function __construct(array $date){
        $this->name = $date['name'];
        $this->nip = $date['nip'];
        $this->statusVat = $date['statusVat'];
        $this->regon = $date['regon'];
        $this->pesel = $date['pesel'];
        $this->krs = $date['krs'];
        $this->residenceAddress = $date['residenceAddress'];
        $this->workingAddress = $date['workingAddress'];
        if(empty($date['representatives'])){
            foreach($date['representatives'] AS $representatives){
                $this->representatives[] = new SubjectRepresentative($representatives);
            }
        }
        $this->authorizedClerks = $date['authorizedClerks'];
        $this->partners = $date['partners'];
        $this->registrationLegalDate = $date['registrationLegalDate'];
        $this->registrationDenialBasis = $date['registrationDenialBasis'];
        $this->restorationBasis = $date['restorationBasis'];
        $this->restorationDate = $date['restorationDate'];
        $this->removalBasis = $date['removalBasis'];
        $this->removalDate = $date['removalDate'];
        $this->accountNumbers = $date['accountNumbers'];
        $this->hasVirtualAccounts = $date['hasVirtualAccounts'];
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getNip(): string
    {
        return $this->nip;
    }

    /**
     * @return string
     */
    public function getStatusVat(): string
    {
        return $this->statusVat;
    }

    /**
     * @return string
     */
    public function getRegon(): string
    {
        return $this->regon;
    }

    /**
     * @return string
     */
    public function getPesel(): string
    {
        return $this->pesel;
    }

    /**
     * @return string
     */
    public function getKrs(): string
    {
        return $this->krs;
    }

    /**
     * @return string
     */
    public function getResidenceAddress(): string
    {
        return $this->residenceAddress;
    }

    /**
     * @return string
     */
    public function getWorkingAddress(): string
    {
        return $this->workingAddress;
    }

    /**
     * @return array
     */
    public function getRepresentatives(): array
    {
        return $this->representatives;
    }

    /**
     * @return array
     */
    public function getAuthorizedClerks(): array
    {
        return $this->authorizedClerks;
    }

    /**
     * @return array
     */
    public function getPartners(): array
    {
        return $this->partners;
    }

    /**
     * @return string
     */
    public function getRegistrationLegalDate(): string
    {
        return $this->registrationLegalDate;
    }

    /**
     * @return string
     */
    public function getRegistrationDenialBasis(): string
    {
        return $this->registrationDenialBasis;
    }

    /**
     * @return string
     */
    public function getRestorationBasis(): string
    {
        return $this->restorationBasis;
    }

    /**
     * @return string
     */
    public function getRestorationDate(): string
    {
        return $this->restorationDate;
    }

    /**
     * @return string
     */
    public function getRemovalBasis(): string
    {
        return $this->removalBasis;
    }

    /**
     * @return string
     */
    public function getRemovalDate(): string
    {
        return $this->removalDate;
    }

    /**
     * @return array
     */
    public function getAccountNumbers(): array
    {
        return $this->accountNumbers;
    }

    /**
     * @return bool
     */
    public function isHasVirtualAccounts(): bool
    {
        return $this->hasVirtualAccounts;
    }




}