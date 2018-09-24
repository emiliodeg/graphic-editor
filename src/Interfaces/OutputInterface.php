<?php

declare(strict_types=1);

namespace GraphicEditor\Interfaces;

/**
 * Interface for output of geometric shapes
 *
 * @package GraphicEditor\Shapes
 */
interface OutputInterface
{
    /**
     * Save as file
     *
     * @param string $fileName
     * @return mixed
     */
    public function save(string $fileName): bool;

    /**
     * Render or draw a shape
     *
     * @return mixed
     */
    public function render();
}
