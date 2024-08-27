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
        $oFormEntity = new Form();
        $oForm = $this->createForm(FormType::class, $oFormEntity);

        $oForm->handleRequest($request);

        if ($oForm->isSubmitted() && $oForm->isValid()) {
            $em->persist($oFormEntity);
            $em->flush();

            return $this->redirectToRoute('form_show', ['id' => $oFormEntity->getId()]);
        }

        return $this->render('form/new.html.twig', [
            'form' => $oForm->createView(),
        ]);
    }

    #[Route('/form/{id}', name: 'form_show')]
    public function show(int $id, Request $request, FormRepository $formRepository, EntityManagerInterface $em): Response
    {
        $oFormEntity = $formRepository->find($id);

        if (!$oFormEntity) {
            throw $this->createNotFoundException('Form not found');
        }

        if ($request->isMethod('POST')) {
            foreach ($oFormEntity->getFields() as $field) {
                $fieldName = $field->getLabel();
                $fieldValue = $request->request->get($fieldName);

                $oInfo = new Info();
                $oInfo->setFormId($oFormEntity->getId());
                $oInfo->setFieldLabel($fieldName);
                $oInfo->setFieldValue($fieldValue);

                $em->persist($oInfo);
            }

            $em->flush();

            return $this->redirectToRoute('form_new');
        }

        return $this->render('form/show.html.twig', [
            'form' => $oFormEntity,
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
