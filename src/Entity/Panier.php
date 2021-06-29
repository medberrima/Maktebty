<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Panier
 *
 * @ORM\Table(name="panier")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass=App\Repository\PanierRepository::class)
 */
class Panier
{
    /**
     * @var int
     *
     * @ORM\Column(name="CodePanier", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codepanier;

    /**
     * @var float
     *
     * @ORM\Column(name="total", type="float", precision=10, scale=0, nullable=false)
     */
    private $total;

    /**
     * @var int
     *
     * @ORM\Column(name="nombre_article", type="integer", nullable=false)
     */
    private $nombreArticle;

    public function getCodepanier(): ?int
    {
        return $this->codepanier;
    }

    public function getTotal(): ?float
    {
        return $this->total;
    }

    public function setTotal(float $total): self
    {
        $this->total = $total;

        return $this;
    }

    public function getNombreArticle(): ?int
    {
        return $this->nombreArticle;
    }

    public function setNombreArticle(int $nombreArticle): self
    {
        $this->nombreArticle = $nombreArticle;

        return $this;
    }


}
