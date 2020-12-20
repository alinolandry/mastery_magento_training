<?php

declare(strict_types=1);

namespace MageMastery\Todo\Service;


use MageMastery\Todo\Api\CustomerTaskListInterface;
use MageMastery\Todo\Api\Data\TaskInterface;
use MageMastery\Todo\Api\TaskRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use phpDocumentor\Reflection\Utils;

class CustomerTaskList implements CustomerTaskListInterface
{
    /**
     * @var TaskRepositoryInterface
     */
    private $taskRepository;

    /**
     * @var SearchCriteriaBuilder
     */
    private $searchCriteriaBuilder;

    /**
     * CustomerTaskList contructor
     * @param TaskRepositoryInterface $taskRepository
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     */
    public function __contruct(
        TaskRepositoryInterface $taskRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder
    ) {
        $this->taskRepository = $taskRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
    }


    /**
     * @return TaskInterface[]
     */
    public function getList()
    {
        return $this->taskRepository->getList($this->searchCriteriaBuilder->create())->getItems();
    }
}
