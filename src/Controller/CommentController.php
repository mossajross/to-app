<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class CommentController extends  AbstractController
{
    /**
     * @Route("/comments/{id}/vote/{direction}")
     */

    public function commentVote($id, $direction)
    {

        // todo use id to query database

        // use real logic to save this to database
        if ($direction === "up") {
            $currentVoteCount = rand(7, 100);
        } else {
            $currentVoteCount = rand(0, 5);
        }


        return new JsonResponse(["votes" => $currentVoteCount]);
    }
}
