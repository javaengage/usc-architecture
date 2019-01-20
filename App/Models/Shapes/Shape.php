<?php
namespace App\Models\Shapes;

abstract class Shape implements ShapeInterface
{

    protected $properties;

    /**
     * Shape constructor.
     * @param $properties
     */
    public function __construct(array $properties)
    {
        $this->properties = $properties;
    }

    /**
     * @return array
     */
    public function getProperties(): array
    {
        return $this->properties;
    }

    /**
     * @param array $properties
     */
    public function setProperties(array $properties)
    {
        $this->properties = $properties;
    }


    /**
     * @return string
     */
    public function __toString(): string
    {
        return get_class($this) . ' - ' . json_encode($this->properties);
    }


}