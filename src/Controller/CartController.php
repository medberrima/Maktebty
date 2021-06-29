<?php

namespace App\Controller;

use App\Entity\Livre;
use App\Repository\LivreRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/cart", name="cart_")
 */
class CartController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(SessionInterface $session, LivreRepository $livreRepository)
    {
        $panier = $session->get("panier", []);

        // On "fabrique" les données
        $dataPanier = [];
        $total = 0;
        

        foreach($panier as $code => $quantite){
            $livre = $livreRepository->find($code);
            $dataPanier[] = [
                "livre" => $livre,
                "quantite" => $quantite                
            ];
            $total += ($livre->getPrix()-($livre->getPrix()*$livre->getPromo()/100)) * $quantite; 
        }

        return $this->render('cart/index.html.twig', compact("dataPanier", "total"));
    }

    
    /**
     * @Route("/add/{id}", name="add")
     */
    public function add(Livre $livre, SessionInterface $session)
    {
        // On récupère le panier actuel
        $panier = $session->get("panier", []);
        $code = $livre->getCodelivre();

        if(!empty($panier[$code])){
            $panier[$code]++;
        }else{
            $panier[$code] = 1;
        }

        // On sauvegarde dans la session
        $session->set("panier", $panier);

        

        return $this->redirectToRoute("cart_index");
    }

    /**
     * @Route("/remove/{id}", name="remove")
     */
    public function remove(Livre $livre, SessionInterface $session)
    {
        // On récupère le panier actuel
        $panier = $session->get("panier", []);
        $code = $livre->getCodelivre();

        if(!empty($panier[$code])){
            if($panier[$code] > 1){
                $panier[$code]--;
            }else{
                unset($panier[$code]);
            }
        }    // On sauvegarde dans la session
        $session->set("panier", $panier);

        return $this->redirectToRoute("cart_index");
    }

    /**
     * @Route("/delete/{id}", name="delete")
     */
    public function delete(Livre $livre, SessionInterface $session)
    {
        // On récupère le panier actuel
        $panier = $session->get("panier", []);
        $code = $livre->getCodelivre();

        if(!empty($panier[$code])){
            unset($panier[$code]);
        }

        // On sauvegarde dans la session
        $session->set("panier", $panier);

        return $this->redirectToRoute("cart_index");
    }

    /**
     * @Route("/delete", name="delete_all")
     */
    public function deleteAll(SessionInterface $session)
    {
        $session->remove("panier");

        return $this->redirectToRoute("cart_index");
    }

}

