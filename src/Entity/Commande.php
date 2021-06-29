<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table(name="commande", indexes={@ORM\Index(name="codeCarte", columns={"codeCarte"}), @ORM\Index(name="codePanier", columns={"codePanier"}), @ORM\Index(name="codeClient", columns={"codeClient"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass=App\Repository\CommandeRepository::class)
 */
class Commande
{
    /**
     * @var int
     *
     * @ORM\Column(name="codeCmd", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codecmd;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCmd", type="date", nullable=false)
     */
    private $datecmd;

    /**
     * @var string
     *
     * @ORM\Column(name="modePaiment", type="string", length=10, nullable=false)
     */
    private $modepaiment;

    /**
     * @var string
     *
     * @ORM\Column(name="AdressLivraison", type="string", length=20, nullable=false)
     */
    private $adresslivraison;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="delaiLivraison", type="date", nullable=false)
     */
    private $delailivraison;

    /**
     * @var float
     *
     * @ORM\Column(name="fraitDePort", type="float", precision=10, scale=0, nullable=false)
     */
    private $fraitdeport;

    /**
     * @var float
     *
     * @ORM\Column(name="montantTotal", type="float", precision=10, scale=0, nullable=false)
     */
    private $montanttotal;

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
     * @var \Client
     *
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codeClient", referencedColumnName="codeClient")
     * })
     */
    private $codeclient;

    /**
     * @var \Cartebancaire
     *
     * @ORM\ManyToOne(targetEntity="Cartebancaire")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codeCarte", referencedColumnName="codeCarte")
     * })
     */
    private $codecarte;

    public function getCodecmd(): ?int
    {
        return $this->codecmd;
    }

    public function getDatecmd(): ?\DateTimeInterface
    {
        return $this->datecmd;
    }

    public function setDatecmd(\DateTimeInterface $datecmd): self
    {
        $this->datecmd = $datecmd;

        return $this;
    }

    public function getModepaiment(): ?string
    {
        return $this->modepaiment;
    }

    public function setModepaiment(string $modepaiment): self
    {
        $this->modepaiment = $modepaiment;

        return $this;
    }

    public function getAdresslivraison(): ?string
    {
        return $this->adresslivraison;
    }

    public function setAdresslivraison(string $adresslivraison): self
    {
        $this->adresslivraison = $adresslivraison;

        return $this;
    }

    public function getDelailivraison(): ?\DateTimeInterface
    {
        return $this->delailivraison;
    }

    public function setDelailivraison(\DateTimeInterface $delailivraison): self
    {
        $this->delailivraison = $delailivraison;

        return $this;
    }

    public function getFraitdeport(): ?float
    {
        return $this->fraitdeport;
    }

    public function setFraitdeport(float $fraitdeport): self
    {
        $this->fraitdeport = $fraitdeport;

        return $this;
    }

    public function getMontanttotal(): ?float
    {
        return $this->montanttotal;
    }

    public function setMontanttotal(float $montanttotal): self
    {
        $this->montanttotal = $montanttotal;

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

    public function getCodeclient(): ?Client
    {
        return $this->getCodeclient()-> codeclient;
    }

    public function setCodeclient(?Client $codeclient): self
    {
        $this->codeclient = $codeclient;

        return $this;
    }

    public function getCodecarte(): ?Cartebancaire
    {
        return $this->getCodecarte()-> codecarte;
    }

    public function setCodecarte(?Cartebancaire $codecarte): self
    {
        $this->codecarte = $codecarte;

        return $this;
    }


}
