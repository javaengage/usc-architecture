<?php
namespace App\Models\Formatter;

interface ResultFormatterInterface
{

    /**
     * @return string
     */
    public function toArray(): string;


    /**
     * @return string
     */
    public function toJSON(): string ;


    /**
     * @return string
     */
    public function toImage(): string;
}