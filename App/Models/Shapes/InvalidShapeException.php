<?php
namespace App\Models\Shapes;

use Throwable;

class InvalidShapeException extends \Exception
{
    /**
     * InvalidShapeException constructor.
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($message = "Invalid Shape", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}