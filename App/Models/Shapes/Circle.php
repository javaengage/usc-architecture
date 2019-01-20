<?php
namespace App\Models\Shapes;

class Circle extends Shape
{
    /**
     * Circle constructor.
     * @param array $properties
     */
    public function __construct(array $properties)
    {
        parent::__construct($properties);
    }

    /**
     * @return string
     */
    public function draw() : string
    {
        return "Circle has been drawn.\n";
    }

    /**
     * @return string
     */
    public function calculate(): string
    {
        return "Circle has been calculated";
    }


}