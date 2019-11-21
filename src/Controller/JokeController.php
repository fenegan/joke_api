<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Service\JokeManager;

class JokeController extends AbstractController
{
    /**
     * @Route("/joke/{category}", name="joke")
     */
    public function index(string $category = null, JokeManager $manager)
    {
        if ($category === null) {
            $joke = $manager->getJoke();
        }
        else {
            $joke = $manager->getJokeByCategory($category);
        }
        if ($joke === null) {
            throw $this->createNotFoundException('No joke found');
        }
        return $this->json([
            'message' => $joke,
        ]);
    }
}
