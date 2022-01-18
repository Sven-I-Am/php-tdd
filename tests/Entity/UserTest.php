<?php

  namespace App\Tests\Entity;

  use App\Entity\User;
  use Monolog\Test\TestCase;

  class UserTest extends TestCase
  {
    public function dataProviderForTestRent(): array
    {
      return [
      [100, 8, true],
      [8, 8, true],
      [7, 8, false]
      ];
    }

    /**
     * function has to start with Test
     * @dataProvider dataProviderForTestRent
     */
    public function testRent(int $credit, int $rent, bool $expectedOutput): void
    {
      $user = new User(true, $credit);
      $this->assertEquals($expectedOutput, $user->canPay($rent));
    }
  }