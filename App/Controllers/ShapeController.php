<?php
namespace App\Controllers;

use App\Models\Formatter\ShapeResultFormatter;
use App\Models\Shapes\InvalidShapeException;
use App\Models\Shapes\ShapeFactory;

class ShapeController extends Controller
{
    protected $shapes;

    /**
     * ShapeController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->shapes = [];
    }


    /**
     * @param array $data
     * @throws InvalidShapeException
     */
    public function createShapes(array $data) : void{
        try{
            $this->shapes =  ShapeFactory::createMultiple($data);
        } catch(InvalidShapeException $ex) {
            throw $ex;
        }
    }

    /**
     *
     */
    public function calculateShapes(): void {
        foreach ($this->shapes as $shape){
            $shapeResultFormatter = new ShapeResultFormatter($shape);
            echo $shapeResultFormatter->toArray();
            echo $shapeResultFormatter->toJSON();
            echo $shapeResultFormatter->toImage();

        }
    }

    /**
     *
     */
    public function drawShapes(): void{
        foreach ($this->shapes as $shape){
           echo $shape->draw();
        }
    }
}

