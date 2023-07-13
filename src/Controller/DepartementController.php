<?php

namespace App\Controller;

use App\Entity\Departement;
use App\Form\DepartementType;
use App\Repository\DepartementRepository;
use Doctrine\Persistence\ManagerRegistry;
use phpDocumentor\Reflection\Type;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DepartementController extends AbstractController
{
    #[Route('/departement', name: 'app_departement')]
    public function index(): Response
    {
        return $this->render('departement/index.html.twig', [
            'controller_name' => 'DepartementController',
        ]);
    }
    #[Route('/listdepatement', name: 'app_listdepartement')]
    public function listDepartement(DepartementRepository $repository){
        $departements= $repository->findAll();
        return $this->
        render("departement/list.html.twig",array('tabDepartement'=>$departements));
    }

    #[Route('/adddepartement', name: 'app_adddepartement')]

    public function addDepartement(ManagerRegistry $doctrine,Request $request)
    {
        $departement= new Departement();
        $form=$this->createForm(DepartementType::class,$departement);
        $form->handleRequest($request);
        if($form->isSubmitted()){
            //    $em= $this->getDoctrine()->getManager();
            $em= $doctrine->getManager();
            $em->persist($departement);
            $em->flush();
            #  return  new Response("success");
            return  $this->redirectToRoute("app_listdepartement");
        }
        return $this->renderForm("departement/add.html.twig",array("formDepartement"=>$form));


    }
    #[Route('/updateForm/{id}', name: 'updateForm_departement')]
    public function updateForm($id,DepartementRepository $repository,Request $request,ManagerRegistry $doctrine)
    {
        $departement= $repository->find($id);
        $form= $this->createForm(DepartementType::class,$departement);
        $form->handleRequest($request) ;
        if($form->isSubmitted()){
            $em = $doctrine->getManager();
            $em->flush();
            return $this->redirectToRoute("app_listdepartement");
        }
        return $this->renderForm("departement/update.html.twig",array("formDepartement"=>$form));
    }
    #[Route('/removeForm/{id}', name: 'removeForm_departement')]
    public function removeDepartement(ManagerRegistry $doctrine,$id,DepartementRepository $repository)
    {
        $departement= $repository->find($id);
        $em= $doctrine->getManager();
        $em->remove($departement);
        $em->flush();
        return $this->redirectToRoute("app_listdepartement");
    }


    #[Route('/show/{id}', name: 'show_departement')]
    public function showDepartement($id,DepartementRepository $repository)
    {
        $departement = $repository->find($id);

        return $this->render("departement/show.html.twig",
            array('departement'=>$departement)
        );

    }
}
