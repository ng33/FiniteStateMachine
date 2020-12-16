<?php

class FiniteStateMachine
{
    const STATE_S0 = 0;
    const STATE_S1 = 1;
    const STATE_S2 = 2;

    const ONE  = "1";
    const ZERO = "0";

    protected $unsBinaryInt;
    protected $currentState;
    protected $resultState;

    /*
     * @param int $unsBinaryInt
     *
     * @throws Exception
     *
     */
    public function __construct(string $unsBinaryInt)
    {
        if (preg_match('/^[01]+$/', $unsBinaryInt)) {
            $this->unsBinaryInt = $unsBinaryInt;

            // default the initial state to S0
            $this->currentState = self::STATE_S0;
        } else {
            throw new Exception("Error: Input must be a binary unsigned integer");
        }
    }

    /*
     * This method takes the valid input, store it in an array, then
     * loops through the array to determine the state after each digit
     *
     * @return int     *
     */
    public function moduloThree() : int {
        $intArray = str_split($this->unsBinaryInt);

        foreach($intArray as $value) {
            $this->determineState($value);
            $this->currentState = $this->resultState;
        }

        return $this->currentState;
    }

    /*
     * This method determine the new state, given the current state
     * and current input digit
     *
     * @return void
     */
    protected function determineState( string $input) : void {
        switch ($this->currentState) {
            case self::STATE_S0:
                if (strcmp($input, self::ZERO) == 0) {
                    $this->resultState = self::STATE_S0;
                }  else {
                    $this->resultState = self::STATE_S1;
                }
                break;

            case self::STATE_S1:
                if (strcmp($input, self::ZERO) == 0) {
                    $this->resultState = self::STATE_S2;
                }  else {
                    $this->resultState = self::STATE_S0;
                }
                break;

            case self::STATE_S2:
                if (strcmp($input, self::ZERO) == 0) {
                    $this->resultState = self::STATE_S1;
                }  else {
                    $this->resultState = self::STATE_S2;
                }
                break;

        }
    }
}