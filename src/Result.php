<?php

namespace WLRegistryAPI;

abstract class Result
{
    /** @var  string */
    protected string $requestDateTime;
    /** @var  string */
    protected string $requestId;

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