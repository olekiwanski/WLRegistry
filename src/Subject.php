<?php

namespace WLRegistryAPI;

class Subject
{

    protected string|null $name;
    protected string|null $nip;
    protected string|null $statusVat;
    protected string|null $regon;
    protected string|null $pesel;
    protected string|null $krs;
    protected string|null $residenceAddress;
    protected string|null $workingAddress;
    protected array|null $representatives = [];
    protected array|null $authorizedClerks;
    protected array|null $partners;
    protected string|null $registrationLegalDate;
    protected string|null $registrationDenialBasis;
    protected string|null $restorationBasis;
    protected string|null $restorationDate;
    protected string|null $removalBasis;
    protected string|null $removalDate;
    protected array|null $accountNumbers = [];
    protected bool $hasVirtualAccounts;

    public function __construct(array $date)
    {
        $this->name = $date['name'];
        $this->nip = $date['nip'];
        $this->statusVat = $date['statusVat'];
        $this->regon = $date['regon'];
        $this->pesel = $date['pesel'];
        $this->krs = $date['krs'];
        $this->residenceAddress = $date['residenceAddress'];
        $this->workingAddress = $date['workingAddress'];
        if (empty($date['representatives'])) {
            foreach ($date['representatives'] as $representatives) {
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

    public function getName(): string
    {
        return $this->name;
    }

    public function getNip(): string
    {
        return $this->nip;
    }

    public function getStatusVat(): string
    {
        return $this->statusVat;
    }


    public function getRegon(): string
    {
        return $this->regon;
    }


    public function getPesel(): string
    {
        return $this->pesel;
    }


    public function getKrs(): string
    {
        return $this->krs;
    }


    public function getResidenceAddress(): string
    {
        return $this->residenceAddress;
    }


    public function getWorkingAddress(): string
    {
        return $this->workingAddress;
    }


    public function getRepresentatives(): array
    {
        return $this->representatives;
    }


    public function getAuthorizedClerks(): array
    {
        return $this->authorizedClerks;
    }


    public function getPartners(): array
    {
        return $this->partners;
    }


    public function getRegistrationLegalDate(): string
    {
        return $this->registrationLegalDate;
    }


    public function getRegistrationDenialBasis(): string
    {
        return $this->registrationDenialBasis;
    }


    public function getRestorationBasis(): string
    {
        return $this->restorationBasis;
    }


    public function getRestorationDate(): string
    {
        return $this->restorationDate;
    }


    public function getRemovalBasis(): string
    {
        return $this->removalBasis;
    }


    public function getRemovalDate(): string
    {
        return $this->removalDate;
    }


    public function getAccountNumbers(): array
    {
        return $this->accountNumbers;
    }


    public function isHasVirtualAccounts(): bool
    {
        return $this->hasVirtualAccounts;
    }


}