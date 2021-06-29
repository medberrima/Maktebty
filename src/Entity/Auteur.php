<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Auteur
 *
 * @ORM\Table(name="auteur")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass=App\Repository\AuteurRepository::class)
 */
class Auteur
{
    /**
     * @var int
     *
     * @ORM\Column(name="codeAuteur", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeauteur;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=20, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=20, nullable=false)
     */
    private $prenom;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Livre", inversedBy="codeauteur")
     * @ORM\JoinTable(name="est-ecrit-par",
     *   joinColumns={
     *     @ORM\JoinColumn(name="codeAuteur", referencedColumnName="codeAuteur")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="codeLivre", referencedColumnName="codeLivre")
     *   }
     * )
     */
    private $codelivre;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->codelivre = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getCodeauteur(): ?int
    {
        return $this->codeauteur;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * @return Collection|Livre[]
     */
    public function getCodelivre(): Collection
    {
        return $this->codelivre;
    }

    public function addCodelivre(Livre $codelivre): self
    {
        if (!$this->codelivre->contains($codelivre)) {
            $this->codelivre[] = $codelivre;
        }

        return $this;
    }

    public function removeCodelivre(Livre $codelivre): self
    {
        $this->codelivre->removeElement($codelivre);

        return $this;
    }

}
