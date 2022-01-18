<?php

namespace App\Entity;

use App\Repository\BookingsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BookingsRepository::class)]
class Bookings
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\ManyToOne(targetEntity: Room::class, inversedBy: 'bookings')]
    #[ORM\JoinColumn(nullable: false)]
    private int $room;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'bookings')]
    #[ORM\JoinColumn(nullable: false)]
    private int $userId;

    #[ORM\Column(type: 'datetime')]
    private string $start_date;

    #[ORM\Column(type: 'datetime')]
    private string $end_date;


    #[ORM\Column(type: 'float')]
    private float $duration;

    public function __construct(string $start_date, string $end_date){
      $this->start_date = $start_date;
      $this->end_date = $end_date;
      $this->duration = abs(strtotime($this->end_date) - strtotime($this->start_date))/(60*60);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRoom(): int
    {
        return $this->room;
    }

    public function setRoom(int $room): self
    {
        $this->room = $room;

        return $this;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    public function getStartDate(): string
    {
        return $this->start_date;
    }

    public function setStartDate(string $start_date): self
    {
        $this->start_date = $start_date;

        return $this;
    }

    public function getEndDate(): string
    {
        return $this->end_date;
    }

    public function setEndDate(string $end_date): self
    {
        $this->end_date = $end_date;

        return $this;
    }

    public function getDuration(): float
    {
        return $this->duration;
    }

    public function setDuration(float $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function checkEndDate(): bool
    {
      return strtotime($this->getStartDate())<strtotime($this->getEndDate());
    }

    public function checkDuration():bool
    {
      return $this->getDuration() <= 4;
    }

    public function getRent():float
    {
      return ceil($this->getDuration())*2;
    }

    public function checkAvailability(Bookings $prevBooking, Bookings $nextBooking):bool
    {
      return ($this->getStartDate()>=$prevBooking->getEndDate() && $this->getStartDate()<=$nextBooking->getStartDate());
    }

    public function canBook(): bool
    {
      return ($this->checkEndDate() && $this->checkDuration());
    }
}
