<?php

namespace WLRegistryAPI;

class ResultCheck extends Result
{
    /** @var  string */
    protected $accountAssigned;

    public function __construct(array $data)
    {
        $this->requestDateTime = $data['requestDateTime'];
        $this->requestId = $data['requestId'];
        if(!empty($data['accountAssigned'])){
            $this->accountAssigned = $data['accountAssigned'];
        }
        return $this;
    }

    /**
     * @return string
     */
    public function getAccountAssigned(): string
    {
        return $this->accountAssigned;
    }


}