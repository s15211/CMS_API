<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\CarRepository")
 */
class Car
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
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Mark", inversedBy="cars")
     * @ORM\JoinColumn(nullable=false)
     */
    private $mark;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\EngineSize", inversedBy="cars")
     * @ORM\JoinColumn(nullable=false)
     */
    private $engineSize;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\BodyType", inversedBy="cars")
     * @ORM\JoinColumn(nullable=false)
     */
    private $bodyType;

    /**
     * @ORM\Column(type="datetime")
     */
    private $year;

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

    public function getMark(): ?Mark
    {
        return $this->mark;
    }

    public function setMark(?Mark $mark): self
    {
        $this->mark = $mark;

        return $this;
    }

    public function getEngineSize(): ?EngineSize
    {
        return $this->engineSize;
    }

    public function setEngineSize(?EngineSize $engineSize): self
    {
        $this->engineSize = $engineSize;

        return $this;
    }

    public function getBodyType(): ?BodyType
    {
        return $this->bodyType;
    }

    public function setBodyType(?BodyType $bodyType): self
    {
        $this->bodyType = $bodyType;

        return $this;
    }

    public function getYear(): ?\DateTimeInterface
    {
        return $this->year;
    }

    public function setYear(\DateTimeInterface $year): self
    {
        $this->year = $year;

        return $this;
    }
}
