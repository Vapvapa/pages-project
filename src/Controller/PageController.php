<?php

namespace App\Controller;

use App\Entity\Page;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends AbstractController
{
    public function __construct(private ManagerRegistry $doctrine) {}

    /**
     * @Route("/", name="app_page")
     */
    public function index(): Response
    {

        $entityManager = $this->doctrine->getManager();
        $page = new Page();
        $page->setKeywords('Uuid')
            ->setDescription('Uuid')
            ->setTitle('Uuid')
            ->setContent('Uuid');
        $entityManager->persist($page);
        $entityManager->flush();


        $homePage = $this->doctrine->getRepository(Page::class)->find(7);
        //dump($homePage);die;
        return $this->render('page/index.html.twig', [
            'homePage' => $homePage
        ]);
    }
}