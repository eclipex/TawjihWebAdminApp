<?php

namespace DatabaseBundle\Controller;

use DatabaseBundle\Entity\Filieres;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Filiere controller.
 *
 * @Route("filieres")
 */
class FilieresController extends Controller
{
    /**
     * Lists all filiere entities.
     *
     * @Route("/", name="filieres_index")
     * @Method("GET")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $filieres = $em->getRepository('DatabaseBundle:Filieres')->findAll();
        $filieresPaginated = $this->get('knp_paginator')->paginate ($filieres,$request->query->get('page', 1),10);

        return $this->render('filieres/index.html.twig', array(
            'filieres' => $filieresPaginated,
        ));
    }

    /**
     * Creates a new filiere entity.
     *
     * @Route("/new", name="filieres_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $filiere = new Filieres();
        $form = $this->createForm('DatabaseBundle\Form\FilieresType', $filiere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($filiere);
            $em->flush();

            return $this->redirectToRoute('filieres_show', array('id' => $filiere->getId()));
        }

        return $this->render('filieres/new.html.twig', array(
            'filiere' => $filiere,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a filiere entity.
     *
     * @Route("/{id}", name="filieres_show")
     * @Method("GET")
     */
    public function showAction(Filieres $filiere)
    {
        $deleteForm = $this->createDeleteForm($filiere);

        return $this->render('filieres/show.html.twig', array(
            'filiere' => $filiere,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing filiere entity.
     *
     * @Route("/{id}/edit", name="filieres_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Filieres $filiere)
    {
        $deleteForm = $this->createDeleteForm($filiere);
        $editForm = $this->createForm('DatabaseBundle\Form\FilieresType', $filiere);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('filieres_edit', array('id' => $filiere->getId()));
        }

        return $this->render('filieres/edit.html.twig', array(
            'filiere' => $filiere,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a filiere entity.
     *
     * @Route("/{id}", name="filieres_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Filieres $filiere)
    {
        $form = $this->createDeleteForm($filiere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($filiere);
            $em->flush();
        }

        return $this->redirectToRoute('filieres_index');
    }

    /**
     * Creates a form to delete a filiere entity.
     *
     * @param Filieres $filiere The filiere entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Filieres $filiere)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('filieres_delete', array('id' => $filiere->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
