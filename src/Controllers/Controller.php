<?php

namespace src\Controllers;

class Controller
{
    public function view($view, $data)
    {
        extract($data);
        require_once "public/{$view}.php";
    }
}
