<?php
namespace App\Models\Formatter;

use App\Models\Shapes\ShapeInterface;

class ShapeResultFormatter implements ResultFormatterInterface
{
    protected $shape;

    /**
     * ShapeResultFormatter constructor.
     * @param ShapeInterface $shape
     */
    public function __construct(ShapeInterface $shape)
    {
        $this->shape = $shape;
    }

    /**
     * @return string
     */
    public function toArray(): string {
        return $this->shape->calculate() . " and result formatted to array\n";
    }


    /**
     * @return string
     */
    public function toJSON(): string {
        return $this->shape->calculate() . " and result formatted to JSON\n";
    }


    /**
     * @return string
     */
    public function toImage(): string {
        return $this->shape->calculate() . " and result formatted to Image\n";
    }

}