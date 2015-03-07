<?php

namespace AppBundle\Rabbit\Queue;

use OldSound\RabbitMqBundle\RabbitMq\ConsumerInterface;
use PhpAmqpLib\Message\AMQPMessage;


class Consumer implements ConsumerInterface
{

    public function execute(AMQPMessage $message)
    {
        // Do whatever you want here with the data.
        // Send emails, process some files, send Tweets, etc
        // I'm just going to echo it to the console but this is where you need to do the 'meat' of your work

        $payload = json_decode(unserialize($message->body));

        echo sprintf("Consumed: '%s'\n", $payload->body);

    }

}