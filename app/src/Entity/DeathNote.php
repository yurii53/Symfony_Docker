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
    private ?int $born_year = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $city_of_born = null;

    #[ORM\Column(length: 5)]
    private ?int $dead_year = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $city_of_dead = null;

    private ?int $age = null;

    private ?int $dead_N_years_ago = null;

    private ?int $now = null;
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

    public function getBorn_Year(): ?int
    {
        return $this->born_year;
    }

    public function setBorn_Year(string $born_year): self
    {
        $this->born_year = (int)$born_year;

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

    public function getDead_Year(): ?int
    {
        return $this->dead_year;
    }

    public function setDead_Year(string $dead_year): self
    {
        $this->dead_year = (int)$dead_year;

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

    public function getAge(): ?int
    {
        if ($this->born_year > $this->dead_year)
            $this->age = 0;
        else
            $this->age = $this->dead_year - $this->born_year;
        return $this->age;
    }

    public function getDead_N_Years_ago(): ?int
    {
        $this->dead_N_years_ago = (int)date('Y') - $this->dead_year;
        return $this->dead_N_years_ago;
    }

    public function getNow(): ?int
    {
        $this->now = date('Y');
        return $this->now;
    }

    public function __construct($Name, $born_year, $city_of_born, $dead_year, $city_of_dead) {
        $this->Name = $Name;
        $this->city_of_born = $city_of_born;
        $this->city_of_dead = $city_of_dead;
        $this->born_year = (int)$born_year;
        if ($born_year > $dead_year)
            $this->dead_year = (int)$born_year;
        else
            $this->dead_year = (int)$dead_year;

    }
}
