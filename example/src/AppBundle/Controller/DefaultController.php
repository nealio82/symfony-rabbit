<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        return $this->render('AppBundle:default:index.html.twig');
    }


    /**
     * @Route("/produce", name="produce")
     */
    public function produceAction()
    {

        for ($i = 0; $i < 100; $i++) {

            $msg = new \stdClass();

            $msg->subject = "Instant message";
            $msg->body = "Test message " . uniqid();

            $this->get('email_queue')->publish(json_encode($msg));

        }


        return $this->redirectToRoute('homepage');
    }

    /**
     * @Route("/delay", name="delay")
     */
    public function delayAction()
    {

        // Sometimes you might want to delay the queue for a bit, for example if you are
        // testing for hitting an API rate limit and need to relax your calls for 15 minutes

        for ($i = 0; $i < 100; $i++) {

            $msg = new \stdClass();

            $msg->subject = "Delayed message";
            $msg->body = "Delayed message " . uniqid();

            $this->get('delay_queue')->publish(json_encode($msg));
        }


        return $this->redirectToRoute('homepage');
    }

}
