<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;


/**
 * Theme
 *
 * @ORM\Table(name="theme")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass=App\Repository\ThemeRepository::class)
 */
class Theme
{
    /**
     * @var int
     *
     * @ORM\Column(name="codeTheme", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codetheme;

    /**
     * @var string
     *
     * @ORM\Column(name="nomTh", type="string", length=15, nullable=false)
     */
    private $nomth;

    public function getCodetheme(): ?int
    {
        return $this->codetheme;
    }

    public function getNomth(): ?string
    {
        return $this->nomth;
    }

    public function setNomth(string $nomth): self
    {
        $this->nomth = $nomth;

        return $this;
    }

    /**
     * @ORM\OneToMany(targetEntity=Livre::class, mappedBy="theme")
     */
    private $livres;

    public function __construct()
    {
        $this->livres = new ArrayCollection();
    }


     /**
     * @return Collection|livres[]
     */
    public function getLivres(): Collection
    {
        return $this->livres;
    }

    

}
