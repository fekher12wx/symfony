<?php

namespace App\Entity;

use App\Repository\ListingRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Location;

#[ORM\HasLifecycleCallbacks]
#[ORM\Entity(repositoryClass: ListingRepository::class)]
class Listing
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;


    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $address = null;

    #[ORM\Column]
    private ?float $rentPrice = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateOfPublish = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $availabefrom = null;

    #[ORM\ManyToOne(targetEntity: Appartment::class, inversedBy: 'listings')]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    private ?Appartment $appartment = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: 'owner', referencedColumnName: 'id', nullable: false, onDelete: 'CASCADE')]
    private ?User $owner = null;


    public function getListingId(): ?int
    {
        return $this->listingId;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): static
    {
        $this->address = $address;

        return $this;
    }

    public function getRentPrice(): ?float
    {
        return $this->rentPrice;
    }

    public function setRentPrice(float $rentPrice): static
    {
        $this->rentPrice = $rentPrice;

        return $this;
    }

    public function getAvailabefrom(): ?\DateTimeInterface
    {
        return $this->availabefrom;
    }

    public function setAvailabefrom(\DateTimeInterface $availabefrom): static
    {
        $this->availabefrom = $availabefrom;

        return $this;
    }

    public function getOwner(): ?User
    {
        return $this->owner;
    }

    public function setOwner(User $owner): static
    {
        $this->owner = $owner;

        return $this;
    }

    public function getAppartment(): ?Appartment
    {
        return $this->appartment;
    }

    public function setAppartment(?Appartment $appartment): static
    {
        $this->appartment = $appartment;

        return $this;
    }
    public function setDateOfPublish(\DateTimeInterface $dateOfPublish): self
    {
        $this->dateOfPublish = $dateOfPublish;

        return $this;
    }
}
