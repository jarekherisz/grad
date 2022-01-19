<?php

namespace Grad\CoreBundle\Entity;

use Grad\CoreBundle\Repository\ModuleVersionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ModuleVersionRepository::class)]
#[ORM\Table(name: '`version`')]
class ModuleVersion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 32)]
    private ?string $name;

    #[ORM\Column(type: 'string', length: 32, columnDefinition: "AFTER `name`")]
    private ?string $class;

    #[ORM\Column(type: 'string', length: 32, columnDefinition: "AFTER `class`")]
    private ?string $version;

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

    public function getClass(): ?string
    {
        return $this->class;
    }

    public function setClass(string $class): self
    {
        $this->class = $class;

        return $this;
    }

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function setVersion(string $version): self
    {
        $this->version = $version;

        return $this;
    }
}
