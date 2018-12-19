<?php
namespace Anaxago\CoreBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use CoreBundle\Entity\Project;
use FOS\RestBundle\Controller\Annotations\Get;

class apiController extends Controller
{
    public function getProjetsAction(Request $request)
    {
        $projects = $this->get('doctrine.orm.entity_manager')
                ->getRepository('Anaxago:CoreBundle:Project')
                ->findAll();
        /* @var $projects project[] */

        $formatted = [];
        foreach ($projects as $project) {
            $moneygot = $projet->getMoneyGot();
            $getmoney = $projet->getGetMoney();
            if ($moneygot >= $getmoney)
            {
                $formatted[] = [
               'titre' => $projet->getTitle(),
               'description' => $projet->getDescription(),
               'financé?' => "oui",
                ];
            }
            else {
                $formatted[] = [
               'titre' => $projet->getTitle(),
               'description' => $projet->getDescription(),
               'financé?' => "non",
                ];  
            }
        }

        return new JsonResponse($formatted);
    }
}