<?php

namespace App\Controller;

use App\Entity\Form;
use App\Entity\Info;
use App\Form\FormType;
use App\Repository\FormRepository;
use App\Repository\InfoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class FormController extends AbstractController
{

    #[Route('/forms', name: 'form_list')]
    public function list(Request $request, FormRepository $formRepository): Response
    {
        $pagination = $formRepository->findAllPaginated($request);

        return $this->render('form/list.html.twig', [
            'pagination' => $pagination,
        ]);
    }

    #[Route('/', name: 'form_new')]
    public function new(Request $request,EntityManagerInterface $em, FormRepository $formRepository): Response
    {
        $formEntity = new Form();
        $form = $this->createForm(FormType::class, $formEntity);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($formEntity);
            $em->flush();

            return $this->redirectToRoute('form_show', ['id' => $formEntity->getId()]);
        }

        return $this->render('form/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/form/{id}', name: 'form_show')]
    public function show(int $id, Request $request, FormRepository $formRepository, EntityManagerInterface $em): Response
    {
        $formEntity = $formRepository->find($id);

        if (!$formEntity) {
            throw $this->createNotFoundException('Form not found');
        }

        if ($request->isMethod('POST')) {
            foreach ($formEntity->getFields() as $field) {
                $fieldName = $field->getLabel();
                $fieldValue = $request->request->get($fieldName);

                $info = new Info();
                $info->setFormId($formEntity->getId());
                $info->setFieldLabel($fieldName);
                $info->setFieldValue($fieldValue);

                $em->persist($info);
            }

            $em->flush();

            return $this->redirectToRoute('form_new');
        }

        return $this->render('form/show.html.twig', [
            'form' => $formEntity,
        ]);
    }

    #[Route('/form-info', name: 'form_info')]
    public function info(Request $request, InfoRepository $infoRepository): Response
    {
        $pagination = $infoRepository->findAllGroupedByFormId($request);
        
        return $this->render('form/info.html.twig', [
            'pagination' => $pagination,
        ]);
    }
}
