<?php

namespace MageMastery\Todo\Api;

/**
 * @api
 * Interface TaskRepositoryInterface
 * @package MageMastery\Todo\Api
 */
interface TaskRepositoryInterface
{
    public function getList();

    public function get(int $taskId);
}

