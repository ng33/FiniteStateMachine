<?php

include_once  'autoload.php';

print 'Running the Finite State Machine' . "<br><br>";

print "First input is 1101 or 13<br>";
try {
    $machine = new FiniteStateMachine('1101');

    $state = $machine->moduloThree();

    print "First Input State: {$state} <br><br>";

} catch (Exception $e) {
    print $e->getMessage() . "<br><br>";
}


print "Second input is 1110 or 14  <br>";
try {
    $machine = new FiniteStateMachine('1110');

    $state = $machine->moduloThree();

    print "Second Input State: {$state} <br><br>";
} catch (Exception $e) {
    print $e->getMessage() . "<br><br>";
}

print "Third input is 1110 or 14  <br>";
try {
    $machine = new FiniteStateMachine('1111');

    $state = $machine->moduloThree();

    print "Third Input State: {$state} <br><br>";
} catch (Exception $e) {
    print $e->getMessage() . "<br><br>";
}

print "Fourth input is ABCD to error check that letters are not allowed<br>";
try {
    $machine = new FiniteStateMachine('ABCD');

    $state = $machine->moduloThree();

    print "Fourth Input State: {$state} <br><br>";

} catch (Exception $e) {
    print $e->getMessage() . "<br><br>";
}

print "Fifth input is 20134989 to error check being with 0 or 1 <br>";
try {
    $machine = new FiniteStateMachine('20134989');

    $state = $machine->moduloThree();

    print "Fifth Input State: {$state} <br><br>";

} catch (Exception $e) {
    print $e->getMessage() . "<br><br>";
}

print "Sixth input is 01989801 to error check only 0 or 1 allowed <br>";
try {
    $machine = new FiniteStateMachine('01989801');

    $state = $machine->moduloThree();

    print "Sixth Input State: {$state} <br><br>";

} catch (Exception $e) {
    print $e->getMessage() . "<br><br>";
}