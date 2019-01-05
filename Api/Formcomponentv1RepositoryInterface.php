<?php
/**
 * Sanjeev_FormComponentV1 extension
 * NOTICE OF LICENSE
 * 
 * This source file is subject to the MIT License
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/mit-license.php
 * 
 * @category  Sanjeev
 * @package   Sanjeev_FormComponentV1
 * @copyright Copyright (c) 2019
 * @license   http://opensource.org/licenses/mit-license.php MIT License
 */
namespace Sanjeev\FormComponentV1\Api;

/**
 * @api
 */
interface Formcomponentv1RepositoryInterface
{
    /**
     * Save Form Component V1.
     *
     * @param \Sanjeev\FormComponentV1\Api\Data\Formcomponentv1Interface $formcomponentv1
     * @return \Sanjeev\FormComponentV1\Api\Data\Formcomponentv1Interface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(\Sanjeev\FormComponentV1\Api\Data\Formcomponentv1Interface $formcomponentv1);

    /**
     * Retrieve Form Component V1
     *
     * @param int $formcomponentv1Id
     * @return \Sanjeev\FormComponentV1\Api\Data\Formcomponentv1Interface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($formcomponentv1Id);

    /**
     * Retrieve Form Component V1s matching the specified criteria.
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Sanjeev\FormComponentV1\Api\Data\Formcomponentv1SearchResultInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    /**
     * Delete Form Component V1.
     *
     * @param \Sanjeev\FormComponentV1\Api\Data\Formcomponentv1Interface $formcomponentv1
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(\Sanjeev\FormComponentV1\Api\Data\Formcomponentv1Interface $formcomponentv1);

    /**
     * Delete Form Component V1 by ID.
     *
     * @param int $formcomponentv1Id
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($formcomponentv1Id);
}
