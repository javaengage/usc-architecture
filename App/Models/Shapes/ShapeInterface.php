<?php
namespace App\Models\Shapes;

interface ShapeInterface
{
    /**
     * @return string
     */
    public function draw(): string;

    /**
     * @return string
     */
    public function calculate(): string;
}