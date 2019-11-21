<?php

namespace App\Service;

class JokeManager
{
    protected $jokes;

    public function __construct(string $jokePath)
    {
        $json = file_get_contents($jokePath);
        $data = json_decode($json, true);
        $this->jokes = $data;
    }

    public function getJoke()
    {
        $joke = $this->jokes[array_rand($this->jokes)];
        return $joke['setup'] . "\n" . $joke['punchline'];
    }

    public function getJokeByCategory(string $category)
    {
        return 'Funny specific joke on '.$category;
    }
}
