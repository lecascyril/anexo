get<?php
namespace Anaxago\CoreBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use JMS\Serializer\SerializationContext;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use FOS\RestBundle\Controller\Annotations as Rest;
use Anaxago\CoreBundle\Entity\Project;
use Anaxago\CoreBundle\Entity\User;
use Anaxago\CoreBundle\Entity\Userfav;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;



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


    /**
     * @param EntityManagerInterface $entityManager
     *
     * @Rest\View(StatusCode = 201)
     */
    public function getfavAction($keyapi, $idp, $sum, \Swift_Mailer $mailer)
    {
      $em = $this->getDoctrine()->getManager();
      $userarray = $em->getRepository('AnaxagoCoreBundle:User')->findByKeyapi("".$keyapi."");
      $userid=$userarray[0]->getId();
      $user = $em->getRepository('AnaxagoCoreBundle:User')->find($userid);
      $project = $em->getRepository('AnaxagoCoreBundle:Project')->find($idp);

      $userfav = new Userfav;
      $userfav->setProject($project);
      $userfav->setUser($user);
      $userfav->setMoneyput($sum);

      $sumpro= $project->getMoneyGot();
      $sumpro= $sumpro+$sum;
      $project->setMoneyGot($sumpro);
      if ($sumpro>=$project->getGetMoney()){
        $project->setStatut("financé");
      } else {
        $project->setStatut("pas financé");        
      }
      $em->persist($userfav);
      $em->persist($project);

      $em->flush();
        $projects = $em->getRepository(Project::class)->findAll();

      return new Response ("Votre project a bien été validé, et financé");
     }
 
    /**
     * @param EntityManagerInterface $entityManager
     *
     */
    public function getListeinteretAction($keyapi)
    {
     $em = $this->getDoctrine()->getManager();
      $userarray = $em->getRepository('AnaxagoCoreBundle:User')->findByKeyapi("".$keyapi."");
      $userid=$userarray[0]->getId();
      $user = $em->getRepository('AnaxagoCoreBundle:User')->find($userid);





      $userfav = $em->getRepository('AnaxagoCoreBundle:Userfav')->findByuser($user);

      $data =  $this->get('jms_serializer')->serialize($userfav, 'json',  SerializationContext::create()->setGroups(array('listefav')));

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;    
    }



}
