<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Ingredient;
use App\Repository\IngredientRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class IngredientsController extends ApiController
{
    // /**
    //  * @Route("/ingredients", name="ingredients")
    //  */
    // public function index()
    // {
    //     return $this->respond([
    //         [
    //             'title' => 'The Princess Bride',
    //             'count' => 0
    //         ]
    //     ]);
    // }

     /**
    * @Route("/ingredients", methods="GET")
    */
    public function index(IngredientRepository $movieRepository)
    {
        $ingredients = $movieRepository->transformAll();

        return $this->respond($ingredients);
    }

    /**
    * @Route("/ingredients/action/post", methods="POST")
    */
    public function create(Request $request, IngredientRepository $movieRepository, EntityManagerInterface $em)
    {
        $request = $this->transformJsonBody($request);

        // if (! $request) {
        //     return $this->respondValidationError('Please provide a valid request!');
        // }

        // // validate the title
        // if (! $request->get('title')) {
        //     return $this->respondValidationError('Please provide a title!');
        // }

        // persist the new movie
        $movie = new Movie;
        $movie->setName($request->get('name'));
        $movie->setQuantite($request->get('quantite'));
        $movie->setUniteDeMesure($request->get('unite'));
        $em->persist($movie);
        $em->flush();

        return $this->respondCreated($movieRepository->transform($movie));
    }

    /**
    * @Route("/movies/{id}/count", methods="POST")
    */
    public function increaseCount($id, EntityManagerInterface $em, IngredientRepository $movieRepository)
    {
        $movie = $movieRepository->find($id);

        if (! $movie) {
            return $this->respondNotFound();
        }

        $movie->setCount($movie->getCount() + 1);
        $em->persist($movie);
        $em->flush();

        return $this->respond([
            'count' => $movie->getCount()
        ]);
    }

}
