<?php

namespace Simplon\ActivitePartageBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Simplon\ActivitePartageBundle\Entity\Dons;
use Simplon\ActivitePartageBundle\Form\DonsType;
use Simplon\ActivitePartageBundle\Entity\Users;
use Simplon\ActivitePartageBundle\Entity\StatutDon;



/**
* Dons controller.
*
* @Route("/dons")
*/
class DonsController extends Controller
{
  /**
  * Lists all Dons entities.
  *
  * @Route("/", name="dons_index")
  * @Method("GET")
  */
  public function indexAction()
  {
    $em = $this->getDoctrine()->getManager();
    $dons = $em->getRepository('SimplonActivitePartageBundle:Dons')->findAll();
  }

  /**
  * Creates a new Dons entity.
  *
  * @Route("/new", name="dons_new")
  * @Method({"GET", "POST"})
  */
  public function newAction(Request $request)
  {
    $don = new Dons();
    $form = $this->createForm('Simplon\ActivitePartageBundle\Form\DonsType', $don);
    $form->handleRequest($request);

    $userId = $this->getUser();
    $userId->getId();
    $don->setUser($userId);
    $don->setDonAcquis('Non');

    if ($form->isSubmitted() && $form->isValid()) {
      $em = $this->getDoctrine()->getManager();
      $em->persist($don);
      $em->flush();
      return $this->redirectToRoute('accueil');
    }

    return $this->render('dons/new.html.twig', array(
      'don' => $don,
      'form' => $form->createView(),
    ));
  }


  /**
  * @Route("/don/accepte/{id}/{associationId}/{statutRemove}", name="don_accepte")
  * @Method("GET")
  * Le particulier accepte le don
  */
  public function donAccepteAction(Request $request, Dons $don, $associationId, $statutRemove)
  {
    $em = $this->getDoctrine()->getManager();
    $statut = new StatutDon();
    
    $removeStatut = $em->getRepository('SimplonActivitePartageBundle:StatutDon')->findBy(['id' => $statutRemove ]);
    $user = $em->getRepository('SimplonActivitePartageBundle:Users')->find($associationId);

    $don->setDonAcquis('Oui');
    
    $statut->setUser($user);
    $statut->setStatut('Accepte');
    $statut->setDon($don);

    $em->persist($statut);
    $em->remove($removeStatut[0]);
    
    $em->flush();
    return $this->render('SimplonActivitePartageBundle:Default:donsAccepte.html.twig',  array('id' => $don->getId()
  ));
}


/**
* @Route("/don/refuse/{id}/{associationId}/{statutRemove}", name="don_refuse")
* @Method("GET")
* Le particulier refuse le don
*/
public function donRefuseAction(Request $request, Dons $don, $associationId, $statutRemove)
{
  $em = $this->getDoctrine()->getManager();
  $statut = new StatutDon();

  $removeStatut = $em->getRepository('SimplonActivitePartageBundle:StatutDon')->findBy(['id' => $statutRemove ]);
  $user = $em->getRepository('SimplonActivitePartageBundle:Users')->find($associationId);

  $statut->setUser($user);
  $statut->setStatut('Refuse');
  $statut->setDon($don);
  
  $em->persist($statut);
  $em->remove($removeStatut[0]);
  
  $em->flush();
  
  return $this->render('SimplonActivitePartageBundle:Default:donsRefuse.html.twig',  array(
    'id' => $don->getId(),
  ));
}


/**
* Finds and displays a Dons entity.
*
* @Route("/{id}", name="dons_show")
* @Method("GET")
*/
public function showAction(Dons $don)
{
  $deleteForm = $this->createDeleteForm($don);

  $user = $this->getUser();
  if(in_array('ROLE_PARTICULIER', $user->getRoles())){

    return $this->render('dons/show.html.twig', array(
      'don' => $don,
      'delete_form' => $deleteForm->createView(),
    ));

  }
  elseif(in_array('ROLE_ASSOCIATION', $user->getRoles())){
    $statut = new StatutDon();

    $userId = $this->getUser();
    $userId->getId();

    //$don->addDemandeDonAssociation($userId);
    
    $statut->setUser($userId);
    $statut->setStatut('Attente');
    $statut->setDon($don);

    $em = $this->getDoctrine()->getManager();
    $em->persist($statut);
    $em->flush();

    return $this->render('dons/donsInteresse.html.twig',  array('id' => $don->getId()));

  }
}


/**
* Displays a form to edit an existing Dons entity.
*
* @Route("/{id}/edit", name="dons_edit")
* @Method({"GET", "POST"})
*/
public function editAction(Request $request, Dons $don)
{
  $deleteForm = $this->createDeleteForm($don);
  $editForm = $this->createForm('Simplon\ActivitePartageBundle\Form\DonsType', $don);
  $editForm->handleRequest($request);

  if ($editForm->isSubmitted() && $editForm->isValid()) {
    $em = $this->getDoctrine()->getManager();
    $em->persist($don);
    $em->flush();

    return $this->redirectToRoute('dons_edit', array('id' => $don->getId()));
  }

  return $this->render('dons/edit.html.twig', array(
    'don' => $don,
    'edit_form' => $editForm->createView(),
    'delete_form' => $deleteForm->createView(),
  ));
}


/**
* Deletes a Dons entity.
*
* @Route("/{id}", name="dons_delete")
* @Method("DELETE")
*/
public function deleteAction(Request $request, Dons $don)
{
  $form = $this->createDeleteForm($don);
  $form->handleRequest($request);

  if ($form->isSubmitted() && $form->isValid()) {
    $em = $this->getDoctrine()->getManager();
    $em->remove($don);
    $em->flush();
  }

  return $this->redirectToRoute('accueil');
  //return $this->redirectToRoute('dons_index');
}


/**
* Creates a form to delete a Dons entity.
*
* @param Dons $don The Dons entity
*
* @return \Symfony\Component\Form\Form The form
*/
private function createDeleteForm(Dons $don)
{
  return $this->createFormBuilder()
  ->setAction($this->generateUrl('dons_delete', array('id' => $don->getId())))
  ->setMethod('DELETE')
  ->getForm()
  ;
}


}
