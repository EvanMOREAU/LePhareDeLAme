<?php

namespace App\Controller;

use App\Entity\Service;
use App\Form\Service1Type;
use App\Form\ServiceEditType;
use App\Repository\ServiceRepository;
use App\Services\ImageUploaderHelper;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/service')]
final class ServiceController extends AbstractController
{
    #[Route('/{id}', name: 'app_service_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Service $service,ImageUploaderHelper $imageUploaderHelper, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ServiceEditType::class, $service);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $imageFile = $form->get('img')->getData();
        
            if ($imageFile) {
                try {
                    // Appeler la méthode uploadImage pour obtenir le nom du fichier final
                    $newFilename = $imageUploaderHelper->uploadImage($imageFile, $service->getName());
                    if ($newFilename) {
                        $service->setImg($newFilename); // Enregistrer seulement le nom du fichier dans l'entité
                    }
                } catch (\Exception $e) {
                    $this->addFlash('danger', $e->getMessage());
                }
            }
            $entityManager->flush();

            return $this->redirectToRoute('app_main', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('edit/edit.html.twig', [
            'service' => $service,
            'form' => $form,
        ]);
    }
}
