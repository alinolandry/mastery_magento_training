<?php


namespace MageMastery\Todo\Model;


use MageMastery\Todo\Api\Data\TaskInterface;
use Magento\Framework\Model\AbstractModel;
use MageMastery\Todo\Model\ResourceModel\Task as TaskResource;

class Task extends AbstractModel implements TaskInterface
{
    protected function _construct()
    {
        $this->_init(TaskResource::class);
    }
}
