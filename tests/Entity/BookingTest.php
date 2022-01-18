<?php

  namespace App\Tests\Entity;
  use App\Entity\Bookings;
  use Monolog\Test\TestCase;

  class BookingTest extends TestCase
  {
    public function dataProviderForBookingTime(): array
    {
      return [
      ["2022-01-18 13:00:00", "2022-01-18 17:00:00", true],
      ["2022-01-18 13:00:00", "2022-01-18 17:00:01", false]
      ];
    }

    /**
     * function has to start with Test
     * @dataProvider dataProviderForBookingTime
     */
    public function testBookingTime(string $startVar, string $endVar, bool $expectedOutput):void
    {
      $booking = new Bookings($startVar, $endVar);
      $this->assertEquals($expectedOutput, $booking->isLessThanFour());
    }
  }