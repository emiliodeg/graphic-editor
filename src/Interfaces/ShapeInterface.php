<?php

declare(strict_types=1);

namespace GraphicEditor\Interfaces;

/**
 * Interface ShapeInterface
 * @package GraphicEditor\Shapes
 */
interface ShapeInterface extends OutputInterface
{
    /**
     * Get type name
     *
     * @return string
     */
    public function getType(): string;

    /**
     * Set shape parameters from array
     *
     * @param array $params
     * @return ShapeInterface
     */
    public function setFromArray(array $params): ShapeInterface;

    /**
     * Calculate area
     *
     * @return float
     */
    public function getArea(): float;

    /**
     * Calculate perimeter
     *
     * @return float
     */
    public function getPerimeter(): float;
}
