<?php

namespace WLRegistryAPI;

class ResultSingle extends Result
{
    protected Subject $subject;

    public function __construct(array $data)
    {
        $this->subject = new Subject($data['subject']);
        $this->requestDateTime = $data['requestDateTime'];
        $this->requestId = $data['requestId'];

        return $this;
    }

    public function getSubject(): Subject
    {
        return $this->subject;
    }

}