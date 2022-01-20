<?php

  namespace App\Tests\Entity;

  use App\Entity\Bookings;
  use Monolog\Test\TestCase;

  class BookingTest extends TestCase
  {
    public function dataProviderForEndDate(): array
    {
      return [
      ["2022-01-18 13:00:00", "2022-01-18 13:00:00", false],
      ["2022-01-18 13:00:00", "2022-01-18 12:59:59", false],
      ["2022-01-18 13:00:00", "2022-01-18 13:00:01", true],
      ];
    }

    public function dataProviderForDuration(): array
    {
      return [
      ["2022-01-18 13:00:00", "2022-01-18 17:00:00", true],
      ["2022-01-18 13:00:00", "2022-01-18 17:00:01", false]
      ];
    }

    public function dataProviderForBooking(): array
    {
      return [
      ["2022-01-18 13:00:00", "2022-01-18 13:00:01", true],
      ["2022-01-18 13:00:00", "2022-01-18 13:00:00", false],
      ["2022-01-18 13:00:00", "2022-01-18 12:59:59", false],
      ["2022-01-18 13:00:00", "2022-01-18 17:00:01", false]
      ];
    }

    public function dataProviderForAvailability(): array
    {
      $newBooking = new Bookings("2022-01-21 11:00:00", "2022-01-21 12:00:00");
      return [
      [$newBooking, [new Bookings("2022-01-21 08:00:00", "2022-01-21 10:30:00"), new Bookings("2022-01-21 13:00:00", "2022-01-21 15:00:00"), new Bookings("2022-01-21 15:00:00", "2022-01-21 17:00:00")], true],
      [$newBooking, [new Bookings("2022-01-21 08:00:00", "2022-01-21 11:30:00"), new Bookings("2022-01-21 13:00:00", "2022-01-21 15:00:00"), new Bookings("2022-01-21 15:00:00", "2022-01-21 17:00:00")], false],
      [$newBooking, [new Bookings("2022-01-21 08:00:00", "2022-01-21 10:30:00"), new Bookings("2022-01-21 11:45:00:00", "2022-01-21 15:00:00"), new Bookings("2022-01-21 15:00:00", "2022-01-21 17:00:00")], false],
      [$newBooking, [new Bookings("2022-01-21 08:00:00", "2022-01-21 11:15:00"), new Bookings("2022-01-21 11:30:00", "2022-01-21 15:00:00"), new Bookings("2022-01-21 15:00:00", "2022-01-21 17:00:00")], false],
      ];
    }


    /**
     * function has to start with Test
     * @dataProvider dataProviderForEndDate
     */
    public function testEndDate(string $startDate, string $endDate, bool $expectedOutput): void
    {
      $booking = new Bookings($startDate, $endDate);
      $this->assertEquals($expectedOutput, $booking->checkEndDate());
    }

    /**
     * function has to start with Test
     * @dataProvider dataProviderForDuration
     */
    public function testDuration(string $startDate, string $endDate, bool $expectedOutput): void
    {
      $booking = new Bookings($startDate, $endDate);
      $this->assertEquals($expectedOutput, $booking->checkDuration());
    }

    /**
     * function has to start with Test
     * @dataProvider dataProviderForBooking
     */
    public function testBooking(string $startDate, string $endDate, bool $expectedOutput): void
    {
      $booking = new Bookings($startDate, $endDate);
      $this->assertEquals($expectedOutput, $booking->canBook());
    }

    /**
     * function has to start with Test
     * @dataProvider dataProviderForAvailability
     */
    public function testAvailability(Bookings $newBooking, array $otherBookings, bool $expectedOutcome):void
    {
      $this->assertEquals($expectedOutcome, $newBooking->checkAvailability($otherBookings));
    }
  }