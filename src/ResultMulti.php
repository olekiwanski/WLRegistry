<?php

namespace WLRegistryAPI;

class ResultMulti extends Result
{
    /** @var  array */
    protected array $subjects;

    public function __construct(array $data)
    {
        $this->requestDateTime = $data['requestDateTime'];
        $this->requestId = $data['requestId'];

        if (!empty($data['subjects'])) {
            foreach ($data['subjects'] as $subject) {
                $this->subjects[] = new Subject($subject);
            }
        }

        return $this;
    }

    /**
     * @return array
     */
    public function getSubjects(): array
    {
        return $this->subjects;
    }


}