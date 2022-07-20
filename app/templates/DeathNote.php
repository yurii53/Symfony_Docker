<?php

namespace App\templates;

use App\templates\DeathNoteRepository;
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

    private ?string $age = null;

    private ?string $dead_N_years_ago = null;

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
        if ($this->born_year > $this->dead_year)
            $this->age = 0;
        else
            $this->age = $this->dead_year - $this->born_year;
        return $this->age;
    }

    public function getDead_N_Years_ago(): ?string
    {
        $this->dead_N_years_ago = date('Y') - $this->dead_year;
        return $this->dead_N_years_ago;
    }

    public function __construct($Name, $born_year, $city_of_born, $dead_year, $city_of_dead) {
        $this->Name = $Name;
        $this->city_of_born = $city_of_born;
        $this->city_of_dead = $city_of_dead;
        $this->born_year = $born_year;
        if ($born_year > $dead_year)
            $this->dead_year = $born_year;
        else
            $this->dead_year = $dead_year;
    }
}
