<?php

namespace App\Service;

class JokeManager
{
    public function __construct()
    {

    }

    public function getJoke()
    {
        return 'Funny joke';
    }

    public function getJokeByCategory(string $category)
    {
        return 'Funny specific joke on '.$category;
    }
}
