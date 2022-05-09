<?php

namespace WLRegistryAPI;

class ErrorResponse
{
    protected string $code;
    protected string $message;

    public function __construct(array $data)
    {
        $this->code = $data['code'];
        $this->message = $data['message'];
        return $this;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getMessage(): string
    {
        return $this->message;
    }


}