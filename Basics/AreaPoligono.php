//Solucion con match (Match es un switch mas limpio)

<?php

function calcularArea (array $poligono) {
    if (!isset($poligono['tipo'])) {
        return "tipo de poligono no especificado";
    }

    $area = match ($poligono ['tipo']) {
        'triangulo' => ($poligono ['base'] * $poligono ['altura']) / 2, 
        'cuadrado' => $poligono ['lado'] **2, 
        'rectangulo' => $poligono ['base'] * $poligono ['altura'], 
        default = null
    }; 

    if ($area === null) {
        return "poligono no soportado"; 
    }

    return "El area del {$poligono ['tipo']} es: {$area}"; 
}

$triangulo = ['tipo' => 'triangulo' , 'base' =>10, 'altura' => 5]; 
$cuadrado = ['tipo' => 'cuadrado', 'lado' => 4]; 
$restangulo = ['tipo' => 'rectangulo', 'base' => 8, 'altura' => 4];

echo calcularArea($triangulo) . "\n"; 
echo calcularArea($cuadrado) . "\n"; 
echo calcularArea($rectangulo) . "\n"; 


//Alternativa refactorizada (POO), se aplica el Principio de Responsabilidad Única y Polimorfismo.


<?php 

interface Poligono {
    public function obtenerArea(): float; 
    public function obtenerNombre(): string; 
}

class Triangulo implements Poligono {
    public function __construct (private float $base, private float $altura) {}

    public function obtenerArea() : float {
        return ($this-> base * $this -> altura) / 2;
    }

    public function obtenerNombre(): string {return 'Triangulo'; }
}

class Cuadrado implements Poligono {
    public function __construct (private float $lado) {}

    public function obtenerArea(): float {
        return $this-> lado ** 2;  
    } 

    public function obtenerNombre(): string {return 'cuadrado'; }
}

class Rectangulo implements Poligono {
    public function __construct (private float $base, private float $altura) {}

    public function obtenerArea(): float {
        return $this-> base * $this-> altura; 
    }
    public function obtenerNNombre(): string {return 'Rectangulo'; }
}
function imprimirArea (poligono: poligono): void {
    echo "El area del " . $poligono->obtenerNombre() . "es : " . $poligono->obtenerArea() . "\n"; 
}


$triangulo = new Triangulo (10,5); 
$triangulo = new Cuadrado (4); 
$rectangulo = new Rectangulo (8,4); 

imprimirArea($triangulo);
imprimirArea($cuadrado);
imprimirArea($rectangulo);

