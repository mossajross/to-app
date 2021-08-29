<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, [
                "attr" => ["class" => "form-control form-control-lg"]])
            ->add('lastname', TextType::class, [
                "attr" => ["class" => "form-control form-control-lg"]])
            ->add('email', EmailType::class, [
                "attr" => ["class" => "form-control form-control-lg"]])
             ->add('password', RepeatedType::class, [
                 'type' => PasswordType::class,
                 'invalid_message' => 'The password fields must match.',
                 'options' => ['attr' => ['class' => 'password-field']],
                 'required' => true,
                 'first_options'  => ['label' => 'Password'],
                 'second_options' => ['label' => 'Confirm Password'],
             ])
            ->add("save", SubmitType::class,["attr" => ["class" => "btn btn-primary btn-lg"]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
