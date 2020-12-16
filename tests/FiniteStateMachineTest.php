<?php
declare(strict_types=1);

namespace Tests\FiniteStateMachine;

use FiniteStateMachine;
use PHPUnit\Framework\Test;
use PHPUnit\Framework\TestCase;

class FiniteStateMachineTest extends TestCase
{
    protected $finiteStateMachine;
    protected $state;

    public function testConstructValidInstanceWhenCalledWithValidUnsignedInt() : void {
        $this->finiteStateMachine = new FiniteStateMachine('1101');

        $this->assertInstanceOf(FiniteStateMachine::class, $this->finiteStateMachine);
    }

    public function testValidStateReturned() : void {
        $this->finiteStateMachine = new FiniteStateMachine('1101');
        $this->state = $this->finiteStateMachine->moduloThree();

        $this->assertEquals(1, $this->state);
    }

    public function testConstructFailuerWhenCalledWithAlphanumberic() : void {
        $this->expectException('Exception');
        $this->expectExceptionMessage("Error: Input must be a binary unsigned integer");

        $this->finiteStateMachine = new FiniteStateMachine('ABCD');
    }

    public function testConstructFailuerWhenCalledOtherThanZeroOrOneStart() : void {
        $this->expectException('Exception');
        $this->expectExceptionMessage("Error: Input must be a binary unsigned integer");

        $this->finiteStateMachine = new FiniteStateMachine('20134989');
    }

    public function testConstructFailuerWhenCalledOtherThanZeroOrOnes() : void {
        $this->expectException('Exception');
        $this->expectExceptionMessage("Error: Input must be a binary unsigned integer");

        $this->finiteStateMachine = new FiniteStateMachine('01989801');
    }
}