<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Livre
 *
 * @ORM\Table(name="livre", indexes={@ORM\Index(name="codeEditeur", columns={"codeEditeur"}), @ORM\Index(name="codeTH", columns={"codeTH"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass=App\Repository\LivreRepository::class)
 */
class Livre
{
    /**
     * @var int
     *
     * @ORM\Column(name="codeLivre", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codelivre;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=20, nullable=false)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="sousTitre", type="string", length=50, nullable=false)
     */
    private $soustitre;

    /**
     * @var int
     *
     * @ORM\Column(name="ISBN", type="integer", nullable=false)
     */
    private $isbn;

    /**
     * @var string
     *
     * @ORM\Column(name="langue", type="string", length=10, nullable=false)
     */
    private $langue;

    /**
     * @var int
     *
     * @ORM\Column(name="rank", type="integer", nullable=false)
     */
    private $rank;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=2000, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=10, nullable=false)
     */
    private $etat;

    /**
     * @var int
     *
     * @ORM\Column(name="promo", type="integer", nullable=false)
     */
    private $promo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=false)
     */
    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=500, nullable=false)
     */
    private $path;

    /**
     * @var \Editeur
     *
     * @ORM\ManyToOne(targetEntity="Editeur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codeEditeur", referencedColumnName="codeEditeur")
     * })
     */
    private $codeediteur;

    /**
     * @var \Theme
     *
     * @ORM\ManyToOne(targetEntity="Theme")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codeTH", referencedColumnName="codeTheme")
     * })
     */
    private $codeth;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Auteur", mappedBy="codelivre")
     */
    private $codeauteur;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->codeauteur = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getCodelivre(): ?int
    {
        return $this->codelivre;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getSoustitre(): ?string
    {
        return $this->soustitre;
    }

    public function setSoustitre(string $soustitre): self
    {
        $this->soustitre = $soustitre;

        return $this;
    }

    public function getIsbn(): ?int
    {
        return $this->isbn;
    }

    public function setIsbn(int $isbn): self
    {
        $this->isbn = $isbn;

        return $this;
    }
    
        public function getLangue(): ?string
        {
            return $this->langue;
        }
    
        public function setLangue(string $langue): self
        {
            $this->langue = $langue;
    
            return $this;
        }
        
    
        public function getRank(): ?int
        {
            return $this->rank;
        }
    
        public function setRank(int $rank): self
        {
            $this->rank = $rank;
    
            return $this;
        }
        
    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getPromo(): ?int
    {
        return $this->promo;
    }

    public function setPromo(int $promo): self
    {
        $this->promo = $promo;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(string $path): self
    {
        $this->path = $path;

        return $this;
    }

    public function getCodeediteur(): ?Editeur
    {
        return $this->getCodeediteur()-> codeediteur;
    }

    public function setCodeediteur(?Editeur $codeediteur): self
    {
        $this->codeediteur = $codeediteur;

        return $this;
    }

    public function getCodeth(): ?Theme
    {
        return $this->getCodeth()-> codeth;
    }

    public function setCodeth(?Theme $codeth): self
    {
        $this->codeth = $codeth;

        return $this;
    }

    /**
     * @return Collection|Auteur[]
     */
    public function getCodeauteur(): Collection
    {
        return $this->codeauteur;
    }

    public function addCodeauteur(Auteur $codeauteur): self
    {
        if (!$this->codeauteur->contains($codeauteur)) {
            $this->codeauteur[] = $codeauteur;
            $codeauteur->addCodelivre($this);
        }

        return $this;
    }

    public function removeCodeauteur(Auteur $codeauteur): self
    {
        if ($this->codeauteur->removeElement($codeauteur)) {
            $codeauteur->removeCodelivre($this);
        }

        return $this;
    }

}
