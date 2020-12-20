<?php

declare(strict_types=1);

namespace MageMastery\Todo\Model;


use MageMastery\Todo\Api\Data\TaskInterface;
use Magento\Framework\Model\AbstractModel;
use MageMastery\Todo\Model\ResourceModel\Task as TaskResource;

class Task extends AbstractModel implements TaskInterface
{
    const TASK_ID = 'task_id';
    const STATUS = 'status';
    const LABEL = 'label';

    protected function _construct()
    {
        $this->_init(TaskResource::class);
    }

    /**
     * @return int
     */
    public function getTaskId(): int
    {
        return (int) $this->getData(self::TASK_ID);
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->getData(self::STATUS);
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->getData(self::LABEL);
    }
}
