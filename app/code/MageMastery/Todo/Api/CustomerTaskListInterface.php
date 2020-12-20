<?php


namespace MageMastery\Todo\Api;


use MageMastery\Todo\Api\Data\TaskInterface;

/**
 * @api
 * Interface CustomerTaskListInterface
 * @package MageMastery\Todo\Api
 */
interface CustomerTaskListInterface
{
    /**
     * @return TaskInterface[]
     */
    public function getList();

}
