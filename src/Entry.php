<?php

namespace WLRegistryAPI;

class Entry
{
    protected string $identifier;
    protected array $subjects;
    protected ErrorResponse $error;

    function __construct(array $data)
    {
        $this->identifier = $data['identifier'];
        if (!empty($data['subjects'])) {
            foreach ($data['subjects'] as $subject) {
                $this->subjects[] = new Subject($subject);
            }
        } elseif (!empty($data['error'])) {
            unset($this->subjects);
        }
        if (!empty($data['error'])) {
            $this->error = new ErrorResponse($data['error']);
        } else {
            unset($this->error);
        }
        return $this;
    }

    public function getIdentifier(): string
    {
        return $this->identifier;
    }

    public function getSubjects(): array
    {
        return $this->subjects;
    }

    /**
     * @return ErrorResponse
     */
    public function getError(): ErrorResponse
    {
        return $this->error;
    }


}