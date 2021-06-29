<?php

namespace App\Controller;

use App\Entity\Livre;
use App\Entity\Theme;
use App\Entity\Auteur;
use App\Entity\PropertySearch;
use App\Entity\ThemeSearch;
use App\Form\PropertySearchType;
use App\Repository\LivreRepository;
use PhpParser\Node\Expr\Cast\String_;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
  /**
   *@Route("/")
   */
  public function home(Request $request)
  {
    // find all themes from database
    $themes = $this->getDoctrine()->getRepository(Theme::class)->findAll();

    // find all author from database
    $auteurs = $this->getDoctrine()->getRepository(Auteur::class)->findAll();

    // find all Books from database
    $livres = $this->getDoctrine()->getRepository(Livre::class)->findAll();

    // sorted books by rated
    $rated_books = $this->getDoctrine()->getRepository(Livre::class)->findByRated();

    // sorted books by date
    $new_books = $this->getDoctrine()->getRepository(Livre::class)->findByNew();

    // find book en promotion
    $Promo_books = $this->getDoctrine()->getRepository(Livre::class)->findPromo();

    $propertySearch = new PropertySearch();
    $form = $this->createForm(PropertySearchType::class, $propertySearch);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
      //on récupère le nom d'article tapé dans le formulaire
      $nom = $propertySearch->getNom();
      if ($nom != "")
        //si on a fourni un nom d'article on affiche tous les articles ayant ce nom
        $livres = $this->getDoctrine()->getRepository(Livre::class)->findByMot($nom);
    }

    return $this->render('index.html.twig', [
      'form' => $form->createView(),
      'livres' => $livres,
      'themes' => $themes,
      'auteurs' => $auteurs,
      'rated_books' => $rated_books,
      'new_books' => $new_books,
      'Promo_books' => $Promo_books
    ]);
  }

  /**
   * @Route("{codelivre}", name="livre_show")
   */

  public function show($codelivre)
  {
    $livre = $this->getDoctrine()->getRepository(Livre::class)->find($codelivre);
    return $this->render('show.html.twig', array('livre' => $livre));
  }



  /**
   * @Route("/livr_th/", name="livre_par_th")
   * Method({"GET", "POST"})
   */
  public function themesParCategorie(Request $request)
  {
    $themeSearch = new ThemeSearch();
    $form = $this->createForm(ThemeSearchType::class, $themeSearch);
    $form->handleRequest($request);

    $livres = [];

    if ($form->isSubmitted() && $form->isValid()) {
      $theme = $themeSearch->getCodeth();
      if ($theme != "")
        $livres = $theme->getLivres();
      else
        $livres = $this->getDoctrine()->getRepository(Article::class)->findAll();
    }
    return $this->render('livres/livresParCategorie.html.twig', ['form' => $form->createView(), 'livres' => $livres]);
  }
}
