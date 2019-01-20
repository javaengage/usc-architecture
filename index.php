<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\Controllers\ShapeController;
use App\Models\Shapes\InvalidShapeException;

$shape = [
    ['type' => 'circle' , 'params' => ['size' => 10, 'color' => 'red' , 'border' => 'black']],
    ['type' => 'square' , 'params' => ['size' => 12, 'color' => 'blue' , 'border' => 'green']],
    ['type' => 'circle' , 'params' => ['size' => 15, 'color' => 'green' , 'border' => 'yellow']]
];

$shapeController = new ShapeController();

try{
    $shapeController->createShapes($shape);
    $shapeController->drawShapes();
    $shapeController->calculateShapes();
}catch (InvalidShapeException $ex){
    echo "Error - " . $ex->getMessage() . "\n";
}


