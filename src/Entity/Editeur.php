<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Editeur
 *
 * @ORM\Table(name="editeur")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass=App\Repository\EditeurRepository::class)
 */
class Editeur
{
    /**
     * @var int
     *
     * @ORM\Column(name="codeEditeur", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeediteur;

    /**
     * @var string
     *
     * @ORM\Column(name="nomEd", type="string", length=15, nullable=false)
     */
    private $nomed;

    /**
     * @var string
     *
     * @ORM\Column(name="pays", type="string", length=10, nullable=false)
     */
    private $pays;

    public function getCodeediteur(): ?int
    {
        return $this->codeediteur;
    }

    public function getNomed(): ?string
    {
        return $this->nomed;
    }

    public function setNomed(string $nomed): self
    {
        $this->nomed = $nomed;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): self
    {
        $this->pays = $pays;

        return $this;
    }


}
