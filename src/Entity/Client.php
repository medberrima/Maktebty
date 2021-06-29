<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Client
 *
 * @ORM\Table(name="client")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass=App\Repository\ClientRepository::class)
 */
class Client
{
    /**
     * @var int
     *
     * @ORM\Column(name="codeClient", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeclient;

    /**
     * @var string
     *
     * @ORM\Column(name="nomCl", type="string", length=20, nullable=false)
     */
    private $nomcl;

    /**
     * @var string
     *
     * @ORM\Column(name="prenomCl", type="string", length=20, nullable=false)
     */
    private $prenomcl;

    /**
     * @var string
     *
     * @ORM\Column(name="adressCl", type="string", length=30, nullable=false)
     */
    private $adresscl;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=30, nullable=false)
     */
    private $email;

    /**
     * @var int
     *
     * @ORM\Column(name="tel", type="integer", nullable=false)
     */
    private $tel;

    public function getCodeclient(): ?int
    {
        return $this->codeclient;
    }

    public function getNomcl(): ?string
    {
        return $this->nomcl;
    }

    public function setNomcl(string $nomcl): self
    {
        $this->nomcl = $nomcl;

        return $this;
    }

    public function getPrenomcl(): ?string
    {
        return $this->prenomcl;
    }

    public function setPrenomcl(string $prenomcl): self
    {
        $this->prenomcl = $prenomcl;

        return $this;
    }

    public function getAdresscl(): ?string
    {
        return $this->adresscl;
    }

    public function setAdresscl(string $adresscl): self
    {
        $this->adresscl = $adresscl;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTel(): ?int
    {
        return $this->tel;
    }

    public function setTel(int $tel): self
    {
        $this->tel = $tel;

        return $this;
    }


}
