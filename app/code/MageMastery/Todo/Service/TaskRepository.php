<?php


namespace MageMastery\Todo\Service;


use MageMastery\Todo\Api\TaskRepositoryInterface;
use MageMastery\Todo\Model\TaskFactory;
use MageMastery\Todo\Model\ResourceModel\Task;

class TaskRepository implements TaskRepositoryInterface
{
    /**
     * @var Task
     */
    private $resource;

    /**
     * @var TaskFactory
     */
    private $taskFactory;

    /**
     * TaskRepository constructor.
     * @param Task $resource
     * @param TaskFactory $taskFactory
     */
    public function __construct(Task $resource, TaskFactory $taskFactory)
    {
        $this->resource = $resource;
        $this->taskFactory = $taskFactory;
    }


    public function getList()
    {
        // TODO: Implement getList() method.
    }

    public function get(int $taskId)
    {
        $object = $this->taskFactory->create();
        $this->resource->load($object, $taskId); // find in the database the create with id taskId and put the result in the object $object.
        return $object;
    }
}
