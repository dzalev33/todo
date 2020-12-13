<?php
namespace App\Controller;

use App\Entity\Task;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class TaskController extends AbstractController{
    /**
     * @Route("/", name="task_List")
     * @Method({"GET"})
     */
    public function index(){

        $tasks = $this->getDoctrine()->getRepository(Task::class)->findAll();
        return $this->render('tasks/index.html.twig',array(
            'tasks' => $tasks
        ));

    }



    /**
     * @Route("/task/new", name="new_task")
     * @Method({"GET","POST"})
     */

    public function new(Request $request){
        $task = new Task();

        $form = $this->createFormBuilder($task)
            ->add('title', TextType::class, array('attr' =>array('class'=>'form-control')))

            ->add('body', TextareaType::class, array(
                'required' => false,
                'attr' => array('class' => 'form-control')
            ))
            ->add('save', SubmitType::class, array(
                'label' =>'Create',
                'attr' =>array('class' =>'btn btn-primary mt-3')))
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $task = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($task);
            $entityManager->flush();

            return $this->redirectToRoute('task_List');

        }

        return $this->render('tasks/new.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/task/{id}", name="task_show")
     */

    public function show($id){

        $task = $this->getDoctrine()->getRepository(Task::class)->find($id);

        return $this->render('Tasks/show.html.twig',array('task'=>$task));
    }

//    /**
//     * @Route("/task/save")
//     */
//    public function save(){
//        $entityManager = $this->getDoctrine()->getManager();
//        $task = new Task();
//
//        $task->setTitle('Task One');
//        $task->setBody('This is the body for the task one');
//
//        $entityManager->persist($task);
//
//        $entityManager->flush();
//
//        return new Response('Saved a Task with the id of ' .$task->getId());
//
//    }
}