<?php

declare(strict_types=1);

namespace GraphicEditor\Decorator;

use GraphicEditor\Interfaces\DecoratorInterface;

/**
 * Class Background
 * @package GraphicEditor\Decorator
 */
class Background implements DecoratorInterface
{
    /**
     * Color
     *
     * @var string
     */
    private $color = 'ffffff';

    /**
     * Background constructor.
     *
     * @param string|null $color
     */
    public function __construct(string $color = null)
    {
        if ($color !== null) {
            $this->setColor($color);
        }
    }

    /**
     * @inheritDoc
     */
    public function setFromArray(array $attributes): DecoratorInterface
    {
        if (!empty($attributes['color'])) {
            $this->setColor($attributes['color']);
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
     * @return Background
     */
    public function setColor(string $color): Background
    {
        if (preg_match('/[a-f0-9]{6}/i', $color) === false) {
            throw new \InvalidArgumentException('Background color invalid hexadecimal value');
        }

        $this->color = strtolower($color);

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
