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

        for ($i = 0; $i < 20; $i++) {

            $msg = new \stdClass();

            $msg->handle = "@nealio82";
            $msg->endpoint = "/statuses/update";
            $msg->text = "Tweet " . uniqid();

            $this->get('api_call_queue')->publish(json_encode($msg));

        }


        return $this->redirectToRoute('homepage');
    }

    /**
     * @Route("/delay", name="delay")
     */
    public function delayAction()
    {

        // Sometimes you might want to delay the queue for a bit, for example if you are
        // testing for hitting an API rate limit and need to reign in your enthusiasm for 15 minutes

        for ($i = 0; $i < 10; $i++) {

            $msg = new \stdClass();

            $msg->handle = "@nealio82";
            $msg->endpoint = "/statuses/update/" . uniqid();
            $msg->text = "Delayed API call " . uniqid();

            $this->get('delay_queue')->publish(json_encode($msg));
        }


        return $this->redirectToRoute('homepage');
    }

}
