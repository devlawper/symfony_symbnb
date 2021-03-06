<?php


namespace App\Controller;


use App\Repository\AdRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class HomeController
 * @package App\Controller
 */
class HomeController extends AbstractController
{
    /**
     * @Route("/hello/{prenom}/age/{age}", name="hello")
     * @Route("/hello/", name="hello_base")
     * @Route("/hello/{prenom}", name="hello_prenom")
     * @param string $prenom
     * @param int $age
     * @return Response
     */
    public function hello($prenom = "anonyme", $age = 0)
    {
        return $this->render('hello.html.twig', [
            'prenom' => $prenom,
            'age' => $age,
        ]);
    }

    /**
     * @Route("/", name="homepage")
     *
     * @param AdRepository $adRepo
     *
     * @param UserRepository $userRepo
     * @return Response
     */
    public function home(AdRepository $adRepo, UserRepository $userRepo)
    {
        return $this->render('home.html.twig', [
            'ads' => $adRepo->findBestAds(3),
            'users' => $userRepo->findBestUsers(),
        ]);
    }
}