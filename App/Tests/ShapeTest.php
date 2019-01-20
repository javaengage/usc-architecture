<?php
namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Models\Shapes\Circle;
use App\Models\Shapes\InvalidShapeException;
use App\Models\Shapes\ShapeFactory;
use App\Models\Shapes\ShapeInterface;
use App\Models\Shapes\Square;
use App\Models\Formatter\ShapeResultFormatter;

class ShapeTest extends TestCase
{
    public $shapes;
    public $validShapesArray;
    public $invalidShapesArray;

    public function setUp(): void{
        $this->shapes = [];
        $this->validShapesArray = [
            ['type' => 'circle' , 'params' => ['size' => 10, 'color' => 'red' , 'border' => 'black']],
            ['type' => 'square' , 'params' => ['size' => 12, 'color' => 'blue' , 'border' => 'green']],
            ['type' => 'circle' , 'params' => ['size' => 15, 'color' => 'green' , 'border' => 'yellow']]
        ];

        $this->invalidShapesArray = [
            ['type' => 'triangle' , 'params' => ['size' => 10, 'color' => 'red' , 'border' => 'black']]
        ];
    }

    public function tearDown(): void{
        $this->shapes = null;
        $this->validShapesArray = null;
        $this->invalidShapesArray = null;
    }

    /*
     * This test asserts that shapes can be created from the ShapesFactory
     * when passed valid shape data
     * */
    public function testShapeFactoryCreatesShapes(): void{
        $this->shapes = ShapeFactory::createMultiple($this->validShapesArray);

        $this->assertInstanceOf(Circle::class, $this->shapes[0]);
        $this->assertInstanceOf(Square::class, $this->shapes[1]);
        $this->assertInstanceOf(Circle::class, $this->shapes[2]);
    }


    /*
     * This test asserts that an InvalidShapeException with be thrown
     * from the ShapeFactory when passed invalid shape data
     * */
    public function testShapeCreationException(): void{
        $this->expectException(InvalidShapeException::class);
        $this->shapes = ShapeFactory::createMultiple($this->invalidShapesArray);
    }


    /*
     * This test asserts that Shapes are an Instance of ShapeInterface
     * */
    public function testShapeIsAShapeInterface(): void {
        $this->shapes = ShapeFactory::createMultiple($this->validShapesArray);

        $this->assertInstanceOf(ShapeInterface::class, $this->shapes[0]);
        $this->assertInstanceOf(ShapeInterface::class, $this->shapes[1]);
        $this->assertInstanceOf(ShapeInterface::class, $this->shapes[2]);

    }

    /*
     * This test asserts that the draw() method returns a string
     *
     * */
    public function testDrawShape(): void {
        $this->shapes = ShapeFactory::createMultiple($this->validShapesArray);

        $this->assertIsString($this->shapes[0]->draw());
        $this->assertIsString($this->shapes[1]->draw());
        $this->assertIsString($this->shapes[2]->draw());

    }

    /*
     * This test asserts that the calculate() method returns a string
     *
     * */
    public function testCalculateShape(): void {
        $this->shapes = ShapeFactory::createMultiple($this->validShapesArray);

        $this->assertIsString($this->shapes[0]->calculate());
        $this->assertIsString($this->shapes[1]->calculate());
        $this->assertIsString($this->shapes[2]->calculate());

    }

    /*
     * This test asserts that the ShapeResultFormatter returns
     * various formats of Shape Calculations
     * */
    public function testShapeResultFormatter(): void{
        $this->shapes = ShapeFactory::createMultiple($this->validShapesArray);

        $shapeResultFormatter = new ShapeResultFormatter($this->shapes[0]);
        $this->assertIsString($shapeResultFormatter->toArray());
        $this->assertIsString($shapeResultFormatter->toJSON());
        $this->assertIsString($shapeResultFormatter->toImage());

    }
}