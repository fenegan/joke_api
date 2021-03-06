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
        if (empty($this->jokes)) {
            return null;
        }
        $joke = $this->jokes[array_rand($this->jokes)];
        return $joke['setup'] . "\n" . $joke['punchline'];
    }

    public function getJokeByCategory(string $category)
    {
        $ids = [];
        foreach ($this->jokes as $key => $joke)
        {
            if ($joke['type'] === $category) {
                $ids[] = $key;
            }
        }
        if (empty($ids)) {
            return null;
        }
        $joke = $this->jokes[$ids[array_rand($ids)]];
        return $joke['setup'] . "\n" . $joke['punchline'];
    }
}
