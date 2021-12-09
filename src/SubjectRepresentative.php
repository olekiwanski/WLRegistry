<?php

namespace WLRegistryAPI;

class SubjectRepresentative
{

    /** @var  string */
    protected $firstName;
    /** @var  string */
    protected $lastName;
    /** @var  string */
    protected $nip;
    /** @var  string */
    protected $companyName;

    public function __construct(array $data)
    {
        $this->firstName = $data['firstName'];
        $this->lastName = $data['lastName'];
        $this->nip = $data['nip'];
        $this->companyName = $data['companyName'];
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
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
    public function getCompanyName(): string
    {
        return $this->companyName;
    }



}