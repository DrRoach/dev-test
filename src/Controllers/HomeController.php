<?php

namespace src\Controllers;

use src\Controllers\Controller;
use Models\Character;

class HomeController extends Controller
{
    public function index()
    {
        $page = $_GET['page'] ?? 1;
        $characters = Character::all($page);

        return $this->view('index', [
            'characters' => $characters,
            'page' => $page,
            'nextButtonPath' => "/?page=" . ++$page,
            'prevButtonPath' => "/?page=" . --$page
        ]);
    }
}
