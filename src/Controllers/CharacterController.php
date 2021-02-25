<?php

namespace src\Controllers;

use Models\Character;

class CharacterController extends Controller
{
    public function search()
    {
        $page = $_GET['page'] ?? 1;
        $query = $_GET['query'] ?? "";
        $characters = Character::search($query, $page);

        return $this->view('index', [
            'characters' => $characters,
            'page' => $page,
            'nextButtonPath' => "/search?page=" . ++$page . "&query={$query}",
            'prevButtonPath' => "/search?page=" . --$page . "&query={$query}"
        ]);
    }
}

