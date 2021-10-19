<?php

namespace App\Exceptions;

class ResponseException extends \Exception
{

    protected $message;
    private $data;

    public function __construct($message, $data = [])
    {

        parent::__construct();
        $this->message = $message;
        $this->data = $data;
    }

    public function getData()
    {
        return $this->data;
    }

}
