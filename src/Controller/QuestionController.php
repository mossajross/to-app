<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuestionController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     */

    public function homepage()
    {
        $user = $this->getUser();

        return $this->render("question/homepage.html.twig", [
            "user" => $user
        ]);
    }

    /**
     * @Route("/questions/{slug}", name="app_question_show")
     */
    public function show($slug)
    {

        $answers = [
            "Just be your self and confident, it does not matter if does not work!",
            "Make it easy , make it simple make it nice.",
            "It is not the end of the world, she may not deserve you.😉"
        ];

        dump($slug, $this);
        return $this->render("question/show.html.twig", [

            "question" => ucwords(
                str_replace("-", " ", $slug)
            ),
            "answers" => $answers

        ]);
    }
}
