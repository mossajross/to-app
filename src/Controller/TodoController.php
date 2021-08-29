<?php


namespace App\Controller;


use App\Entity\Task;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class TodoController extends AbstractController
{
    /**
     * @Route("/mytasks", name="tasks")
     */
    public function showTask(){

        $tasks = $this->getDoctrine()->getRepository(Task::class)->findAll();

        return $this->render("todo/tasks.html.twig", [
            "tasks" => $tasks
        ]);



    }

}