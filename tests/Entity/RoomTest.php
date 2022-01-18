<?php

  namespace App\Tests\Entity;

  use App\Entity\Room;
  use App\Entity\User;
  use Monolog\Test\TestCase;
  use phpDocumentor\Reflection\Types\Boolean;

  class RoomTest extends TestCase
  {

    public function dataProviderForPremiumRoom(): array
    {
      return [
      [true, true, true],
      [false, false, true],
      [false, true, true],
      [true, false, false]
      ];
    }

    /**
     * function has to start with Test
     * @dataProvider dataProviderForPremiumRoom
     */
    public function testPremiumRoom(bool $roomVar, bool $userVar, bool $expectedOutput): void
    {
      $room = new Room($roomVar);
      $user = new User($userVar);

      $this->assertEquals($expectedOutput, $room->canBook($user));
    }
  }