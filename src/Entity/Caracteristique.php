<?php

namespace App\Entity;

use App\Entity\Langue;
use App\Entity\ProduitTeste;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CaracteristiqueRepository")
 * @UniqueEntity(
 * fields={"langue"},
 * message="Les caractéristiques pour cette langue existent déjà"
 * )
 */
class Caracteristique
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomChimique;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomCommun;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nomCommercial;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\ManyToOne(
     * targetEntity="ProduitTeste", 
     * inversedBy="caracteristiques"
     * )
     * @Assert\Valid()
     */
    private $produitTeste;

    /**
     * @ORM\ManyToOne(
     * targetEntity="Langue", 
     * inversedBy="caracteristiques"
     * )
     * @Assert\Valid()
     */
    private $langue;

    public function getProduitTeste(): ?ProduitTeste
    {
        return $this->produitTeste;
    }

    public function setProduitTeste(?ProduitTeste $produitTeste): self
    {
        $this->produitTeste = $produitTeste;

        return $this;
    }

    public function getLangue(): ?Langue
    {
        return $this->langue;
    }

    public function setLangue(?Langue $langue): self
    {
        $this->langue = $langue;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomChimique(): ?string
    {
        return $this->nomChimique;
    }

    public function setNomChimique(string $nomChimique): self
    {
        $this->nomChimique = $nomChimique;

        return $this;
    }

    public function getNomCommun(): ?string
    {
        return $this->nomCommun;
    }

    public function setNomCommun(string $nomCommun): self
    {
        $this->nomCommun = $nomCommun;

        return $this;
    }

    public function getNomCommercial(): ?string
    {
        return $this->nomCommercial;
    }

    public function setNomCommercial(?string $nomCommercial): self
    {
        $this->nomCommercial = $nomCommercial;

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

    public function __toString(){
        return (string) $this->getNomCommun().' - '.$this->getNomCommercial().' - '.$this->getNomChimique();
    }
}
