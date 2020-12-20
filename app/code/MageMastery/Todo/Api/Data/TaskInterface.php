<?php

declare(strict_types=1);

namespace MageMastery\Todo\Api\Data;

/**
 * @api
 * Interface TaskInterface
 * @package MageMastery\Todo\Api\Data
 */
interface TaskInterface
{
    /**
     * @return int
     */
    public function getTaskId(): int;

    /**
     * @return string
     */
    public function getStatus(): string;

    /**
     * @return string
     */
    public function getLabel(): string;

}
