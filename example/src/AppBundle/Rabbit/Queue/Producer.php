<?php

namespace AppBundle\Rabbit\Queue;

class Producer
{

    private $producer;

    public function __construct($producer)
    {
        $this->producer = $producer;
    }

    public function publish($message)
    {
        // Rabbit wants the message to be serialized
        $this->producer->publish(serialize($message));
    }

}