<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;

class RepasController extends ApiController
{
    /**
     * @Route("/repas", name="repas")
     */
    public function index()
    {
        return $this->respond([
            [
                'title' => 'The Princess Bride',
                'count' => 0
            ]
        ]);
    }
}
