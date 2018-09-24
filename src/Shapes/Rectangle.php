<?php

declare(strict_types=1);

namespace GraphicEditor\Shapes;

use GraphicEditor\Interfaces\ShapeInterface;
use GraphicEditor\Interfaces\SideShapeInterface;

/**
 * Class Rectangle
 *
 * @package GraphicEditor\Shapes
 */
class Rectangle extends ShapeAbstract implements ShapeInterface, SideShapeInterface
{
    /**
     * Rectangle height
     *
     * @var null|float
     */
    private $height = null;

    /**
     * Rectangle width
     *
     * @var null|float
     */
    private $width = null;

    /**
     * Set rectangle parameters from array
     *
     * @inheritdoc
     * @throws \InvalidArgumentException
     */
    public function setFromArray(array $params): ShapeInterface
    {
        if (!isset($params['height']) || !is_numeric($params['height'])) {
            throw new \InvalidArgumentException('Rectangle: Numeric height is required');
        }

        if (!isset($params['width']) || !is_numeric($params['width'])) {
            throw new \InvalidArgumentException('Rectangle: Numeric width is required');
        }

        $this->setHeight((float) $params['height'])
            ->setWidth((float) $params['width']);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getType(): string
    {
        return 'rectangle';
    }

    /**
     * Get rectangle height
     *
     * @return float
     */
    public function getHeight(): float
    {
        return $this->height;
    }

    /**
     * Set rectangle height
     *
     * @param float $height
     * @return Rectangle
     */
    public function setHeight(float $height): Rectangle
    {
        $this->height = abs($height);

        return $this;
    }

    /**
     * Get rectangle width
     *
     * @return float
     */
    public function getWidth(): float
    {
        return $this->width;
    }

    /**
     * Set rectangle width
     *
     * @param float $width
     * @return Rectangle
     */
    public function setWidth(float $width): Rectangle
    {
        $this->width = abs($width);

        return $this;
    }

    /**
     * Is it an equilateral rectangle?
     *
     * @return bool
     */
    public function isEquilateral(): bool
    {
        return round($this->getHeight(), self::PRECISION) === round($this->getWidth(), self::PRECISION);
    }

    /**
     * @inheritDoc
     */
    public function getArea(): float
    {
        return round($this->getHeight() * $this->getWidth(), self::PRECISION);
    }

    /**
     * @inheritDoc
     */
    public function getPerimeter(): float
    {
        return round($this->getHeight() * 2 + $this->getWidth() * 2, self::PRECISION);
    }

    /**
     * @inheritDoc
     */
    public function save(string $fileName): bool
    {
        return file_put_contents($this->render(), $fileName) !== false;
    }

    /**
     * @inheritDoc
     */
    public function render()
    {
        // TODO: Implement render() method.
    }
}
