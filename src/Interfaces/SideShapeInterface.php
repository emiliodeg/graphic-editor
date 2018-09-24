<?php

declare(strict_types=1);

namespace GraphicEditor\Interfaces;

/**
 * Interface SideShapeInterface
 * @package GraphicEditor\Interfaces
 */
interface SideShapeInterface
{
    /**
     * All sides are equals?
     *
     * @return bool
     */
    public function isEquilateral(): bool;
}