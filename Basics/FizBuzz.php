<?php

for ($i = 1; $i <=100; $i++) {
    if ($i %3 === 0 && $i%5===0 ) {
        echo "FizzBuzz\n";
    }

    elseif ($i%3===0) {
        echo "Fizz\n";
    }

    elseif ($i%5===0){
        echo "Buzz\n";
    }
    else {
        echo $i . "\n";
    }
}


//Opcion Refactorizada

for ($i =1; $i <=100; $i++) {
    $resultado = ""; 

    if ($i % 3 ===0 ) {$resultado .="Fizz";}
    if ($i % 5 ===0) {$resultado .="Buzz";}

    echo ($resultado ?: $i) . "\n"; 
}

?>

