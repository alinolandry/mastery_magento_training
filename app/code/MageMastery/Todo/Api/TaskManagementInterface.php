<?php


namespace MageMastery\Todo\Api;

/**
 * @api
 * Interface TaskManagementInterface
 * @package MageMastery\Todo\Api
 */
interface TaskManagementInterface
{
    public function save();
    public function delete();
}
