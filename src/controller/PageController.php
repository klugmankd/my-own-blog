<?php

namespace controller;


class PageController
{

    public function __construct()
    {
        
    }
    
    public function loginAction()
    {
        global $twig;
        echo $twig->render(
            "user/login.twig", [
                'menu' => array(
                    array(
                        "href" => "/sign-up",
                        "name" => "Sign Up"
                    ),
                    array(
                        "href" => "/login",
                        "name" => "Login"
                    )
                )]
        );
    }

    public function signUpAction()
    {
        global $twig;
        echo $twig->render(
            "user/sign-up.twig", [
                'menu' => array(
                    array(
                        "href" => "/sign-up",
                        "name" => "Sign Up"
                    ),
                    array(
                        "href" => "/login",
                        "name" => "Login"
                    )
                )]
        );
    }
}