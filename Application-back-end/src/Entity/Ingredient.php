<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\IngredientRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=IngredientRepository::class)
 */
class Ingredient
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $unite_de_mesure;

    /**
     * @ORM\ManyToOne(targetEntity=Repa::class, inversedBy="relation")
     */
    private $repa;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getUniteDeMesure(): ?string
    {
        return $this->unite_de_mesure;
    }

    public function setUniteDeMesure(string $unite_de_mesure): self
    {
        $this->unite_de_mesure = $unite_de_mesure;

        return $this;
    }

    public function getRepa(): ?Repa
    {
        return $this->repa;
    }

    public function setRepa(?Repa $repa): self
    {
        $this->repa = $repa;

        return $this;
    }
}
