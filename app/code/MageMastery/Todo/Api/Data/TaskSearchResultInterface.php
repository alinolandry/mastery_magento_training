<?php

namespace MageMastery\Todo\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * @api
 * Interface TaskSearchResultInterface
 * @package MageMastery\Todo\Api\Data
 */
interface TaskSearchResultInterface extends SearchResultsInterface
{
    /**
     * @return TaskInterface[]
     */
    public function getItems();

    /**
     * @param TaskInterface[] $items
     * @return SearchResultsInterface
     */
    public function setItems(array $items);
}
