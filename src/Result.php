<?php

namespace WLRegistryAPI;

abstract class Result
{
    /** @var  string */
    protected string $requestDateTime;
    /** @var  string */
    protected string $requestId;

    public function getRequestDateTime(): string
    {
        return $this->requestDateTime;
    }

    public function getRequestId(): string
    {
        return $this->requestId;
    }


}