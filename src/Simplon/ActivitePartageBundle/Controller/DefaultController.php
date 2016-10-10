<?php

namespace Simplon\ActivitePartageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class DefaultController extends Controller {

    /**
     * @Route("/", name="accueil")
     */
    public function indexAction() {
        $dons = $this->getDoctrine()->getManager();
        $listeDons = $dons->getRepository('SimplonActivitePartageBundle:Dons')->findBy(['don_acquis' => 'Non']);
        
        return $this->render('SimplonActivitePartageBundle:Default:index.html.twig', array('dons' => $listeDons));
    }
    
    
    /**
     * @Route("/notification")
     * Page de notification pour le particulier
     */
    public function notificationAction() {
        $userId = $this->getUser();
        $userId->getId();

        $dons = $this->getDoctrine()->getManager();
        $listeDons = $dons->getRepository('SimplonActivitePartageBundle:StatutDon')->findBy(['statut' => 'Attente' ]);

        return $this->render('SimplonActivitePartageBundle:Default:notification.html.twig', array(
                    'dons' => $listeDons,
        ));
    }

    
    
    /**
     * @Route("/association/notification")
     * Page de notification pour l'association
     */
    public function associationNotificationAction() {
        $userId = $this->getUser();
        $userId->getId();

        $donsAccepte = $this->getDoctrine()->getManager();
        $listeDonsAccepte = $donsAccepte->getRepository('SimplonActivitePartageBundle:StatutDon')->findBy(
                array('statut' => 'Accepte', 'user' => $userId)
        );

        return $this->render('SimplonActivitePartageBundle:Default:notification.html.twig', array(
                    'dons' => $listeDonsAccepte,
        ));
    }

}
