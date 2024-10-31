<?php

namespace App\Entity;

use App\Repository\ListingRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ListingRepository::class)]
class Listing
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $listingId = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $address = null;

    #[ORM\Column]
    private ?float $rentPrice = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $availabefrom = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $landlordId = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getListingId(): ?string
    {
        return $this->listingId;
    }

    public function setListingId(string $listingId): static
    {
        $this->listingId = $listingId;

        return $this;
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

    public function getLandlordId(): ?string
    {
        return $this->landlordId;
    }

    public function setLandlordId(string $landlordId): static
    {
        $this->landlordId = $landlordId;

        return $this;
    }
}
