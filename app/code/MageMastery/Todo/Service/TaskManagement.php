<?php

declare(strict_types=1);

namespace MageMastery\Todo\Service;


use MageMastery\Todo\Api\Data\TaskInterface;
use MageMastery\Todo\Api\TaskManagementInterface;
use MageMastery\Todo\Model\ResourceModel\Task;

class TaskManagement implements TaskManagementInterface
{

    private $resource;


    public function __contruct(Task $resource)
    {
        $this->resource = $resource;
    }

    public function save(TaskInterface $task)
    {
        $this->resource->save($task);
    }

    public function delete(TaskInterface $task)
    {
        $this->resource->delete($task);
    }
}
