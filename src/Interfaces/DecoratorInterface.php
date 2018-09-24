<?php

declare(strict_types=1);

namespace GraphicEditor\Interfaces;

/**
 * Interface DecoratorInterface
 * @package GraphicEditor\Interfaces
 */
interface DecoratorInterface
{
    /**
     * Draw
     *
     * @param string $name
     * @param $value
     * @return DecoratorInterface
     */
    public function draw(): DecoratorInterface;

    /**
     * Set attributes from array
     *
     * @param array $attributes
     * @return DecoratorInterface
     */
    public function setFromArray(array $attributes): DecoratorInterface;
}
