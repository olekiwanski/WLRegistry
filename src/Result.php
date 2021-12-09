<?php

namespace WLRegistryAPI;

abstract class Result
{
    /** @var  string */
    protected $requestDateTime;
    /** @var  string */
    protected $requestId;

    /**
     * @return string
     */
    public function getRequestDateTime(): string
    {
        return $this->requestDateTime;
    }

    /**
     * @return string
     */
    public function getRequestId(): string
    {
        return $this->requestId;
    }


}