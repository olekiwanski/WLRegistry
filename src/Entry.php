<?php

namespace WLRegistryAPI;

class Entry
{
    /** @var  string */
    protected $identifier;
    /** @var  array */
    protected array $subjects;
    /** @var  ErrorResponse */
    protected ErrorResponse $error;

    function __construct(array $data)
    {
        $this->identifier = $data['identifier'];
        if(!empty($data['subjects'])){
            foreach ($data['subjects'] AS $subject){
                $this->subjects[] = new Subject($subject);
            }
        }elseif(!empty($data['error'])){
            unset($this->subjects);
        }
        if(!empty($data['error'])){
            $this->error = new ErrorResponse($data['error']);
        }else{
            unset($this->error);
        }
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * @return array
     */
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