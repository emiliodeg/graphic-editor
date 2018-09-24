<?php

declare(strict_types=1);

namespace GraphicEditor\Decorator;

use GraphicEditor\Interfaces\DecoratorInterface;

/**
 * Class Border
 * @package GraphicEditor\Decorator
 */
class Border implements DecoratorInterface
{
    /**
     * Color
     *
     * @var string
     */
    private $color = 'ffffff';

    /**
     * Width
     *
     * @var float
     */
    private $width = .0;

    /**
     * Border constructor.
     *
     * @param string|null $color
     * @param float|null $width
     */
    public function __construct(string $color = null, float $width = null)
    {
        if ($color !== null) {
            $this->setColor($color);
        }

        if ($width !== null) {
            $this->setWidth($width);
        }
    }

    /**
     * @inheritDoc
     */
    public function setFromArray(array $attributes): DecoratorInterface
    {
        if (!empty($attributes['color'])) {
            $this->setColor((string) $attributes['color']);
        }

        if (!empty($attributes['width'])) {
            $this->setWidth((float) $attributes['width']);
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * @param string $color
     * @return Border
     */
    public function setColor(string $color): Border
    {
        if (preg_match('/[a-f0-9]{6}/i', $color) === false) {
            throw new \InvalidArgumentException('Background color invalid hexadecimal value');
        }

        $this->color = strtolower($color);

        return $this;
    }

    /**
     * Border width
     *
     * @return float
     */
    public function getWidth(): float
    {
        return $this->width;
    }

    /**
     * Border width
     *
     * @param float $width
     * @return Border
     */
    public function setWidth(float $width): Border
    {
        $this->width = abs($width);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function draw(): DecoratorInterface
    {
        // @TODO: Implement render() method.
    }
}