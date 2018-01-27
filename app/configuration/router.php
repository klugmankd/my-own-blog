<?php

$routes = array(
    "" => array(
        "controller" => "PageController",
    ),
    "login" => array(
        "controller" => "PageController",
        "action" => "loginAction"
    ),
    "sign-up" => array(
        "controller" => "PageController",
        "action" => "signUpAction"
    ),
    "validate" => array(
        "controller" => "UserController",
        "action" => "validateAction"
    ),
    "logout" => array(
        "controller" => "UserController",
        "action" => "logoutAction"
    )
);