<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EasySchoolController extends AbstractController
{
    /**
     * @Route("/home", name="home_page")
     */
    public function index()
    {
        return $this->render('easy_school/index.html.twig', [
            'controller_name' => 'EasySchoolController',
        ]);
    }
    /**
     * @Route("/planning", name="planning_page")
     */
    public function Planning()
    {
        return $this->render('easy_school/planning.html.twig', [
            'controller_name' => 'EasySchoolController',
        ]);
    }
    /**
     * @Route("/score", name="score_page")
     */
    public function Score()
    {
        return $this->render('easy_school/score.html.twig', [
            'controller_name' => 'EasySchoolController',
        ]);
    }
    /**
     * @Route("/add_score", name="add_score_page")
     */
    public function AddScore()
    {
        return $this->render('easy_school/add_score.html.twig', [
            'controller_name' => 'EasySchoolController',
        ]);
    }
    /**
     * @Route("/profils", name="profils_page")
     */
    public function Profils()
    {
        return $this->render('easy_school/profils.html.twig', [
            'controller_name' => 'EasySchoolController',
        ]);
    }
}
