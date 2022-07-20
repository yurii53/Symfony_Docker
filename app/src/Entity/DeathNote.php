<?php

namespace App\Entity;

use App\Repository\DeathNoteRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DeathNoteRepository::class)]
class DeathNote
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Name = null;

    #[ORM\Column(length: 5)]
    private ?string $born_year = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $city_of_born = null;

    #[ORM\Column(length: 5)]
    private ?string $dead_year = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $city_of_dead = null;

    #[ORM\Column(length: 5)]
    private ?string $age = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getBorn_Year(): ?string
    {
        return $this->born_year;
    }

    public function setBorn_Year(string $born_year): self
    {
        $this->born_year = $born_year;

        return $this;
    }

    public function getCity_Of_Born(): ?string
    {
        return $this->city_of_born;
    }

    public function setCity_Of_Born(string $city_of_born): self
    {
        $this->city_of_born = $city_of_born;

        return $this;
    }

    public function getDead_Year(): ?string
    {
        return $this->dead_year;
    }

    public function setDead_Year(string $dead_year): self
    {
        $this->dead_year = $dead_year;

        return $this;
    }

    public function getCity_Of_Dead(): ?string
    {
        return $this->city_of_dead;
    }

    public function setCity_Of_Dead(string $city_of_dead): self
    {
        $this->city_of_dead = $city_of_dead;

        return $this;
    }

    public function getAge(): ?string
    {
        return $this->age;
    }

    public function setAge(string $age): self
    {
        $this->born_year = $age;

        return $this;
    }

    public function __construct($Name, $born_year, $city_of_born, $dead_year, $city_of_dead) {
        $this->Name = $Name;
        $this->city_of_born = $city_of_born;
        $this->city_of_dead = $city_of_dead;
        $this->born_year = $born_year;
        if ($born_year > $dead_year){
            $this->dead_year = $born_year;
            $this->age = 0;
        }
        else{
            $this->dead_year = $dead_year;
            $this->age = $dead_year - $born_year;
        }

    }
}
