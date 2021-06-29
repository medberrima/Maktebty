<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cartebancaire
 *
 * @ORM\Table(name="cartebancaire", indexes={@ORM\Index(name="codeClient", columns={"codeClient"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass=App\Repository\CartebancaireRepository::class)
 */
class Cartebancaire
{
    /**
     * @var int
     *
     * @ORM\Column(name="numero", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $numero;

    /**
     * @var int
     *
     * @ORM\Column(name="codeCarte", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codecarte;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=20, nullable=false)
     */
    private $type;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateValide", type="date", nullable=false)
     */
    private $datevalide;

    /**
     * @var \Client
     *
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codeClient", referencedColumnName="codeClient")
     * })
     */
    private $codeclient;

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function getCodecarte(): ?int
    {
        return $this->codecarte;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getDatevalide(): ?\DateTimeInterface
    {
        return $this->datevalide;
    }

    public function setDatevalide(\DateTimeInterface $datevalide): self
    {
        $this->datevalide = $datevalide;

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


}
