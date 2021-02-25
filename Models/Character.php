<?php

namespace Models;

use Api\RickAndMorty;

class Character
{
    public $id;
    public $name;
    public $status;
    public $species;
    public $type;
    public $gender;
    public $origin;
    public $location;
    public $image;
    public $episode;
    public $url;

    /**
     * Set all default variables on creation
     */
    public function __construct($data)
    {
        $this->id = $data->id ?? null;
        $this->name = $data->name ?? null;
        $this->status = $data->status ?? null;
        $this->species = $data->species ?? null;
        $this->type = $data->type ?? null;
        $this->gender = $data->gender ?? null;
        $this->origin = $data->origin ?? null;
        $this->location = $data->location ?? null;
        $this->image = $data->image ?? null;
        $this->episode = $data->episode ?? null;
        $this->url = $data->url ?? null;
    }

    public static function all($page = 1)
    {
        $api = new RickAndMorty();

        $return = [];

        foreach ($api->all($page) as $character) {
            $return[] = new Character($character);
        }

        return $return;
    }

    public static function search($query, $page = 1)
    {
        $api = new RickAndMorty();

        $return = [];

        foreach ($api->search($query, $page) as $character) {
            $return[] = new Character($character);
        }

        return $return;
    }
}
