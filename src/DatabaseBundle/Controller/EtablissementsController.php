<?php

namespace DatabaseBundle\Controller;

use DatabaseBundle\Entity\Etablissements;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Etablissement controller.
 *
 * @Route("etablissements")
 */
class EtablissementsController extends Controller
{
    /**
     * Lists all etablissement entities.
     *
     * @Route("/", name="etablissements_index")
     * @Method("GET")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $etablissements = $em->getRepository('DatabaseBundle:Etablissements')->findAll();
        
        $etablissementsPaginated = $this->get('knp_paginator')->paginate ($etablissements,$request->query->get('page', 1),10);

        return $this->render('etablissements/index.html.twig', array(
            'etablissements' => $etablissementsPaginated,
        ));
    }

    /**
     * Creates a new etablissement entity.
     *
     * @Route("/new", name="etablissements_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $etablissement = new Etablissements();
        $form = $this->createForm('DatabaseBundle\Form\EtablissementsType', $etablissement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($etablissement);
            $em->flush();

            return $this->redirectToRoute('etablissements_show', array('id' => $etablissement->getId()));
        }

        return $this->render('etablissements/new.html.twig', array(
            'etablissement' => $etablissement,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a etablissement entity.
     *
     * @Route("/{id}", name="etablissements_show")
     * @Method("GET")
     */
    public function showAction(Etablissements $etablissement)
    {
        $deleteForm = $this->createDeleteForm($etablissement);

        return $this->render('etablissements/show.html.twig', array(
            'etablissement' => $etablissement,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing etablissement entity.
     *
     * @Route("/{id}/edit", name="etablissements_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Etablissements $etablissement)
    {
        $deleteForm = $this->createDeleteForm($etablissement);
        $editForm = $this->createForm('DatabaseBundle\Form\EtablissementsType', $etablissement);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('etablissements_edit', array('id' => $etablissement->getId()));
        }

        return $this->render('etablissements/edit.html.twig', array(
            'etablissement' => $etablissement,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a etablissement entity.
     *
     * @Route("/{id}", name="etablissements_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Etablissements $etablissement)
    {
        $form = $this->createDeleteForm($etablissement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($etablissement);
            $em->flush();
        }

        return $this->redirectToRoute('etablissements_index');
    }

    /**
     * Creates a form to delete a etablissement entity.
     *
     * @param Etablissements $etablissement The etablissement entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Etablissements $etablissement)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('etablissements_delete', array('id' => $etablissement->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
