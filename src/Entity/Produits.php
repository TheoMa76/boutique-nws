<?php

namespace Theo\Entity;



class Produits
{
    private $id;
    protected $nom;
    protected $shortDesc;
    protected $description;
    protected $prix;
    protected $quantite;
    protected $enAvant;

    protected $image;

    public function __construct($nom,$shortDesc,$description,$prix,$quantite,$enAvant, $image = null){ 
        $this->nom = $nom;
        $this->shortDesc = $shortDesc;
        $this->description = $description;
        $this->prix = $prix;
        $this->quantite = $quantite;
        $this->enAvant = $enAvant;
        $this->image = $image;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId($id): self{
        $this->id = $id;
        return $this;
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

    public function getShortDesc(): ?string
    {
        return $this->shortDesc;
    }

    public function setShortDesc(string $shortDesc): self
    {
        $this->shortDesc = $shortDesc;

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

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

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

    public function getEnAvant(): ?bool
    {
        return $this->enAvant;
    }

    public function setEnAvant(bool $enAvant): self
    {
        $this->enAvant = $enAvant;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage($image): self{
        $this->image = $image;
        return $this;
    }
}
