<?php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

class ThemeSearch{
  /**
    * @ORM\ManyToOne(targetEntity="App\Entity\Theme")
    */
  private $theme;

  public function getTheme(): ?Theme
  {
  return $this->theme;
  }
  public function setTheme(?Theme $theme): self
  {
  $this->theme = $theme;
  return $this;
  }
}