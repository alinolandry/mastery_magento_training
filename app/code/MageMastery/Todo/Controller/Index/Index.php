<?php

namespace MageMastery\Todo\Controller\Index;

use MageMastery\Todo\Model\ResourceModel\Task as TaskResource;
use MageMastery\Todo\Model\TaskFactory;
use MageMastery\Todo\Service\TaskRepository;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;

class Index extends Action
{
    private $taskResource;

    private $taskFactory;

    /**
     * @var TaskRepository
     */
    private $taskRepository;

    public function __construct(
        Context $context,
        TaskFactory $taskFactory,
        TaskResource $taskResource,
        TaskRepository $taskRepository
    ) {
        $this->taskRepository = $taskRepository;
        $this->taskFactory = $taskFactory;
        $this->taskResource = $taskResource;
        parent::__construct($context);
    }

    public function execute()
    {
        $task = $this->taskRepository->get(1);
        var_dump($task->getData());
        /*
        $task = $this->taskFactory->create();

        $task->setData([
           'label' => 'New Task 22',
           'status' => 'open',
           'customer_id' => 1
        ]);

        $this->taskResource->save($task);
        */
        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}
