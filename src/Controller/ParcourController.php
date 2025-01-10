<?php

namespace App\Controller;

use App\Entity\Parcour;
use App\Form\ParcourEditType;
use App\Repository\ParcourRepository;
use App\Services\ImageUploaderHelper;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/parcour')]
final class ParcourController extends AbstractController
{
    #[Route('/{id}/edit', name: 'app_parcour_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Parcour $parcour, EntityManagerInterface $entityManager, ImageUploaderHelper $imageUploaderHelper): Response
    {
        $form = $this->createForm(ParcourEditType::class, $parcour);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $imageFile = $form->get('img')->getData();
        
            if ($imageFile) {
                try {
                    // Appeler la méthode uploadImage pour obtenir le nom du fichier final
                    $newFilename = $imageUploaderHelper->uploadImage($imageFile, $parcour->getTitle());
                    
                    if ($newFilename) {
                        $parcour->setImg($newFilename); // Enregistrer seulement le nom du fichier dans l'entité
                    }
                } catch (\Exception $e) {
                    $this->addFlash('danger', $e->getMessage());
                }
            }

            $entityManager->flush();

            return $this->redirectToRoute('app_main', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('edit/edit.html.twig', [
            'parcour' => $parcour,
            'form' => $form,
        ]);
    }

}
