<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lignepanier
 *
 * @ORM\Table(name="lignepanier", indexes={@ORM\Index(name="codePanier", columns={"codePanier"}), @ORM\Index(name="codeLivre", columns={"codeLivre"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass=App\Repository\LignepanierRepository::class)
 */
class Lignepanier
{
    /**
     * @var int
     *
     * @ORM\Column(name="codeLigne", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeligne;

    /**
     * @var int
     *
     * @ORM\Column(name="qte", type="integer", nullable=false)
     */
    private $qte;

    /**
     * @var int
     *
     * @ORM\Column(name="montant", type="integer", nullable=false)
     */
    private $montant;

    /**
     * @var \Panier
     *
     * @ORM\ManyToOne(targetEntity="Panier")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codePanier", referencedColumnName="CodePanier")
     * })
     */
    private $codepanier;

    /**
     * @var \Livre
     *
     * @ORM\ManyToOne(targetEntity="Livre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codeLivre", referencedColumnName="codeLivre")
     * })
     */
    private $codelivre;

    public function getCodeligne(): ?int
    {
        return $this->codeligne;
    }

    public function getQte(): ?int
    {
        return $this->qte;
    }

    public function setQte(int $qte): self
    {
        $this->qte = $qte;

        return $this;
    }

    public function getMontant(): ?int
    {
        return $this->montant;
    }

    public function setMontant(int $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getCodepanier(): ?Panier
    {
        return $this->getCodepanier()-> codepanier;
    }

    public function setCodepanier(?Panier $codepanier): self
    {
        $this->codepanier = $codepanier;

        return $this;
    }

    public function getCodelivre(): ?Livre
    {
        return $this->getCodelivre()-> codelivre;
    }

    public function setCodelivre(?Livre $codelivre): self
    {
        $this->codelivre = $codelivre;

        return $this;
    }


}
