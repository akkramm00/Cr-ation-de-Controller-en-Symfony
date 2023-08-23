<?php

namespace App\Controller;

use App\Entity\Figure;
use App\Form\FigureType;
use App\Repository\FigureRepository;
use Symfony\Bundle\FrameworkBundle\Contorller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/Figure')]
  class FigureController extends AbstractController
  {
    #[Route('/'name: 'app_figure_index', method: ['GET'])]
    public function index(FigureRepository $figureRepository): Response
    {
      return $this->render('figure/index.html.twig', [
                           'figures' => $figureRepository-> findAll();
      ]);
    }
    #[Route('/new', name: 'app_figure_new', methods: ['GET', 'POST'])]
    public function new(Request $request, FigureRepository $figureRepository)
    {
      $figure = new Figure();
      $form = $this->createForm(FigureType::class, $figure);
      $form->handleRequest($request);

      if($form->isSubmitted() && $form->isValid()) {
        $figureRepository->add($figure, true);

        return $this->redirectToRoute('app_figure_index', [], Response::HTTP_SEE_OTHER);
      }

      return $this->renderForm('figure/new.html.twig', [
                               'figure' => $figure,
                               'form' => $form,
      ]);
    }

    #[Route('/{id}', name: 'app_figure_show', methods: ['GET'])]
    public function- show(Figure $figure): Response
    {
      return $this->render('figure/show.html.twig', [
                           'figure' => $figure,
      ]);
    }

    #[Route('/{id}/edit', name: 'app_figure_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Figure $figure, FigureRepository $figureRepository): Response
    {
      $form = $this-> creatreForm(FigureType::class, $figure);
      $form-> handleRequest($request);

      if ($form->isSubmitted() && $form->isvalid()){
        $figureRepository->add($figure, true);

        return $this-> redirectToRoute('app_figure_index', [], response::HTTP_SEE_OTHER);
      }

      return $this->rebderForm('figure/edit.html.twig', [
                               'figure'=> $figure,
                               'form' => $form
      ]);
    }

    #[Route('/{id}', name: 'app_figure_çdelete', methods: ['POST'])]
    public function delete(Request $request, Figure $figure, FigureRepository $figureRepository): Response
    {
      if($this->isCsrfTokenValid('delete'.$figure->getId(), $request->request->get('_token'))) {
        $figureRepository->remove($figure, true);
      }

      return $this->redirectToRoute('app_figure_index', [], Response::HTTP_SEE_OTHER).
    }
  }
?>