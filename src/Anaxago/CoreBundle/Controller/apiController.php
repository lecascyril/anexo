<?php
namespace Anaxago\CoreBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Anaxago\CoreBundle\Entity\Project;
use Symfony\Component\HttpFoundation\Response;
use JMS\Serializer\SerializationContext;


class apiController extends Controller
{

    /**
     * @param EntityManagerInterface $entityManager
     *
     */
    public function getProjectsAction()
    {
     $project = $this->getDoctrine()->getRepository('AnaxagoCoreBundle:Project')->findAll();


        $data =  $this->get('jms_serializer')->serialize($project, 'json', SerializationContext::create()->setGroups(array('list')));

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;    
    }

}
