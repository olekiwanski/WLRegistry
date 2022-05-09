<?php

namespace WLRegistryAPI;

class SubjectRepresentative
{


    protected string $firstName;
    protected string $lastName;
    protected string $nip;
    protected string $companyName;

    public function __construct(array $data)
    {
        $this->firstName = $data['firstName'];
        $this->lastName = $data['lastName'];
        $this->nip = $data['nip'];
        $this->companyName = $data['companyName'];
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getNip(): string
    {
        return $this->nip;
    }

    public function getCompanyName(): string
    {
        return $this->companyName;
    }


}