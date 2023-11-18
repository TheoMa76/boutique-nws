<?php

namespace Theo\Entity;



class Commandes
{
    private $id;
    protected $nom;
    protected $adresse;
    protected $telephone;
    protected $envoye;

    public function __construct($nom,$adresse,$telephone,$envoye){ 
        $this->nom = $nom;
        $this->adresse = $adresse;
        $this->telephone = $telephone;
        $this->envoye = $envoye;
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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getEnvoye(): ?bool
    {
        return $this->envoye;
    }

    public function setEnvoye(bool $envoye): self
    {
        $this->envoye = $envoye;

        return $this;
    }
}
