<?php
namespace App\Models\Shapes;

class ShapeFactory
{
    /**
     * @param string $type
     * @param array $params
     * @return Shape
     * @throws InvalidShapeException
     */
    public static function create(string $type , array $params): Shape{
        $className = ucfirst(strtolower($type));
        try{
            $shapesNameSpace = 'App\Models\Shapes\\';
            $class = new \ReflectionClass($shapesNameSpace . $className);

            $shape = $class->newInstanceArgs([$params]);

            if($shape instanceof Shape){
                return $shape;
            }
            throw new InvalidShapeException();

        } catch (\Exception $ex){
           throw  new InvalidShapeException($className . " is an Invalid Shape and hasn't been implemented.");
        }
    }

    /**
     * @param array $data
     * @return array
     * @throws \Exception
     */
    public static function createMultiple(array $data): array {
        $shapes = [];
        foreach ($data as $datum){
            try{
                $shapes[] = self::create($datum['type'], $datum['params']);
            }catch(\Exception $ex){
                throw $ex;
            }
        }

        return $shapes;
    }

}