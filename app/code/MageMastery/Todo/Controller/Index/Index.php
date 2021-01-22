<?php

namespace MageMastery\Todo\Controller\Index;

use MageMastery\Todo\Api\TaskManagementInterface;
use MageMastery\Todo\Model\ResourceModel\Task as TaskResource;
use MageMastery\Todo\Model\TaskFactory;
use MageMastery\Todo\Service\TaskRepository;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;

class Index extends Action
{
    private $logger;

    private $taskResource;

    private $taskFactory;

    private $searchCriteriaBuilder;

    /**
     * @var TaskRepository
     */
    private $taskRepository;

    /**
     * @var TaskManagementInterface
     */
    private $taskManagement;

    public function __construct(\Psr\Log\LoggerInterface $logger,
        Context $context,
        TaskFactory $taskFactory,
        TaskResource $taskResource,
        TaskRepository $taskRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        TaskManagementInterface $taskManagement
    ) {
        $this->logger = $logger;
        $this->taskRepository = $taskRepository;
        $this->taskFactory = $taskFactory;
        $this->taskResource = $taskResource;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->taskManagement = $taskManagement;
        parent::__construct($context);
    }

    public function execute()
    {

        $task = $this->taskRepository->get(1);
        $task->setData('status', 'complete');
        //var_dump($task);

        $this->logger->debug("before run -> here is good", $task->toArray());
        $this->taskManagement->save($task); // The problem is here
        $this->logger->debug("after run", $task->toArray());
        //$task = $this->taskRepository->getList($this->searchCriteriaBuilder->create())->getItems();
        //var_dump($this->taskRepository->getList($this->searchCriteriaBuilder->create())->getItems());

       // var_dump($this->taskRepository->get(1));

        //return;
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
