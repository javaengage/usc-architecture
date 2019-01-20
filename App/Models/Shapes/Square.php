<?php
namespace App\Models\Shapes;

class Square extends Shape
{
    /**
     * Square constructor.
     * @param array $properties
     */
    public function __construct(array $properties)
    {
        parent::__construct($properties);
    }

    /**
     * @return string
     */
    public function draw(): string
    {
        return "Square has been drawn.\n";
    }

    /**
     * @return string
     */
    public function calculate(): string
    {
        return "Square has been calculated";
    }


}