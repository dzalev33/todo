<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class TaskController extends AbstractController{
    /**
     * @Route("/")
     * @Method({"GET"})
     */
    public function index(){

        $tasks = ['task1', 'task2'];
        return $this->render('tasks/index.html.twig',array(
            'tasks' => $tasks
        ));

    }
}