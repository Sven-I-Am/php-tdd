<?php

  namespace App\Tests\Entity;

  use App\Entity\Bookings;
  use App\Entity\User;
  use Monolog\Test\TestCase;

  class UserTest extends TestCase
  {
    public function dataProviderForTestRent(): array
    {
      return [
      [100, "2022-01-18 13:00:00", "2022-01-18 17:00:00", true],
      [8, "2022-01-18 13:00:00", "2022-01-18 17:00:00", true],
      [7, "2022-01-18 13:00:00", "2022-01-18 17:00:00", false]
      ];
    }

    /**
     * function has to start with Test
     * @dataProvider dataProviderForTestRent
     */
    public function testRent(int $credit, string $startDate, string $endDate, bool $expectedOutput): void
    {
      $user = new User(true, $credit);
      $booking = new Bookings($startDate, $endDate);
      $this->assertEquals($expectedOutput, $user->canPay($booking->getRent()));
    }
  }