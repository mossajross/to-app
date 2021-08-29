<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authenticator\Passport\UserPassportInterface;


class RegistrationController extends AbstractController
{
    /**
     * @Route("/registration", name="registration")
     */

    public function index(Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {

        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if(  $form->isSubmitted() && $form->isValid()){

            $user = $form->getData();
            $plainPassword = $user->getPassword();
            $encoded = $passwordEncoder->encodePassword($user, $plainPassword);
            $user->setPassword($encoded);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            return $this->redirectToRoute("home_page");
        }

        return $this->render('registration/index.html.twig', [

            'form' => $form->createView(),


        ]);
    }
}
