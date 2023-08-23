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

    
  }
?>