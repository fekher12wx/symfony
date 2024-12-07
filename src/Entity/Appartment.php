<?php

namespace App\Entity;

use App\Repository\AppartmentRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AppartmentRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Appartment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column]
    private ?int $numberOfRooms = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?int $squareMeters = null;

    #[ORM\Column]
    private ?bool $furnished = null;

    #[ORM\OneToMany(targetEntity: Listing::class, mappedBy: 'appartment', cascade: ['persist', 'remove'])]
    private Collection $listings;

    public function __construct()
    {
        $this->listings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getListings(): Collection
    {
        return $this->listings;
    }

    public function addListing(Listing $listing): static
    {
        if (!$this->listings->contains($listing)) {
            $this->listings->add($listing);
            $listing->setAppartment($this);
        }

        return $this;
    }

    public function removeListing(Listing $listing): static
    {
        if ($this->listings->removeElement($listing)) {
            if ($listing->getAppartment() === $this) {
                $listing->setAppartment(null);
            }
        }

        return $this;
    }


    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getNumberOfRooms(): ?int
    {
        return $this->numberOfRooms;
    }

    public function setNumberOfRooms(int $numberOfRooms): static
    {
        $this->numberOfRooms = $numberOfRooms;

        return $this;
    }

    public function getSquareMeters(): ?string
    {
        return $this->squareMeters;
    }

    public function setSquareMeters(string $squareMeters): static
    {
        $this->squareMeters = $squareMeters;

        return $this;
    }

    public function isFurnished(): ?bool
    {
        return $this->furnished;
    }

    public function setFurnished(bool $furnished): static
    {
        $this->furnished = $furnished;

        return $this;
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

    public function getDateOfPublish(): ?\DateTimeInterface
    {
        return $this->dateOfPublish;
    }



}
