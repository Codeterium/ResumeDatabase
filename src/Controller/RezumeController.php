<?php

namespace App\Controller;

use App\Entity\Rezume;
use App\Form\RezumeType;
use App\Repository\RezumeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @Route("/rezume")
 */
class RezumeController extends Controller
{
    /**
     * @Route("/", name="rezume_index", methods={"GET"})
     */
    public function index(RezumeRepository $rezumeRepository): Response
    {
        return $this->render('rezume/index.html.twig', [
            'rezumes' => $rezumeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="rezume_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $rezume = new Rezume();
        $form = $this->createForm(RezumeType::class, $rezume);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            if($rezume->getFileUpload())
            {
                $imageName = sha1(uniqid(mt_rand(), true)).'.'. $rezume->getFileUpload()->guessExtension(); 
                
                // Move the file to the directory where brochures are stored
                try {
                    $rezume->getFileUpload()->move(
                        $this->getParameter('files_directory'),
                        $imageName
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }  
                
                $rezume->setFile($imageName);
                $rezume->setFileUpload(null);
            }

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($rezume);
            $entityManager->flush();

            return $this->redirectToRoute('rezume_index');
        }

        return $this->render('rezume/new.html.twig', [
            'rezume' => $rezume,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="rezume_show", methods={"GET"})
     */
    public function show(Rezume $rezume): Response
    {
        return $this->render('rezume/show.html.twig', [
            'rezume' => $rezume,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="rezume_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Rezume $rezume): Response
    {

        $form = $this->createForm(RezumeType::class, $rezume);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            /** @var UploadedFile $file_upload */
            $uploadedFile = $form['file_upload']->getData();

            

            if($uploadedFile)
            {
                $rezume->deleteFile( $this->getParameter('files_directory') );

                $imageName = sha1(uniqid(mt_rand(), true)).'.'. $uploadedFile->guessExtension(); 
                
                // Move the file to the directory where brochures are stored
                try {
                    $uploadedFile->move(
                        $this->getParameter('files_directory'),
                        $imageName
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }  
                
                $rezume->setFile($imageName);
                $rezume->setFileUpload(null);
            }
         
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('rezume_index', [
                'id' => $rezume->getId(),
            ]);
        }

        

        

        return $this->render('rezume/edit.html.twig', [
            'rezume' => $rezume,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="rezume_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Rezume $rezume): Response
    {
        if ($this->isCsrfTokenValid('delete'.$rezume->getId(), $request->request->get('_token'))) {
            $rezume->deleteFile( $this->getParameter('files_directory') );
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($rezume);
            $entityManager->flush();
        }

        return $this->redirectToRoute('rezume_index');
    }

}
