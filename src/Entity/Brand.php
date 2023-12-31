<?php

namespace App\Entity;

use App\Repository\BrandRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\common\Collections\Collection;

#[ORM\Entity(repositoryClass: BrandRepository::class)]
class Brand
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'brand_id')]
    private ?int $id = null;

    #[ORM\Column(name: 'brand_name', length: 100)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'brand', targetEntity: Product::class, cascade: ['persist'])]
    private Collection $products;
    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getProducts(): Collection 
    {
        return $this->products;
    }

}
