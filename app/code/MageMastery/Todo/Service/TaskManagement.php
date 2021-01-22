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
        \Magento\Framework\App\ObjectManager::getInstance()->get('Psr\Log\LoggerInterface')->debug('here is good', $task->toArray());
        $this->resource->save($task); /**     The problem is in this line so I don't why,
                                         * I make some check, $this->resource is an Task(resourceModel) who extends AbstractDb.
                                         * AbstractDb object have save() method who take an AbstractModel($task in our case) object in parameter...
                                         * I check the value of my object $task before run this line, this object is good.
                                         * So now, I don't why is not working, please help me Max
                                        */
    }

    public function delete(TaskInterface $task)
    {
        $this->resource->delete($task);
    }
}
