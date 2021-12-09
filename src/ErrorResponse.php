<?php

namespace WLRegistryAPI;

class ErrorResponse
{
    /** @var  string */
    protected $code;
    /** @var  string */
    protected $message;

    public function __construct(array $data)
    {
        $this->code = $data['code'];
        $this->message = $data['message'];
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }


}