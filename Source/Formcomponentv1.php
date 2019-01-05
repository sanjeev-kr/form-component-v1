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
namespace Sanjeev\FormComponentV1\Source;

class Formcomponentv1 implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * Form Component V1 repository
     * 
     * @var \Sanjeev\FormComponentV1\Api\Formcomponentv1RepositoryInterface
     */
    protected $formcomponentv1Repository;

    /**
     * Search Criteria Builder
     * 
     * @var \Magento\Framework\Api\SearchCriteriaBuilder
     */
    protected $searchCriteriaBuilder;

    /**
     * Filter Builder
     * 
     * @var \Magento\Framework\Api\FilterBuilder
     */
    protected $filterBuilder;

    /**
     * Options
     * 
     * @var array
     */
    protected $options;

    /**
     * constructor
     * 
     * @param \Sanjeev\FormComponentV1\Api\Formcomponentv1RepositoryInterface $formcomponentv1Repository
     * @param \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder
     * @param \Magento\Framework\Api\FilterBuilder $filterBuilder
     */
    public function __construct(
        \Sanjeev\FormComponentV1\Api\Formcomponentv1RepositoryInterface $formcomponentv1Repository,
        \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder,
        \Magento\Framework\Api\FilterBuilder $filterBuilder
    ) {
        $this->formcomponentv1Repository = $formcomponentv1Repository;
        $this->searchCriteriaBuilder     = $searchCriteriaBuilder;
        $this->filterBuilder             = $filterBuilder;
    }

    /**
     * Retrieve all Form Component V1s as an option array
     *
     * @return array
     * @throws StateException
     */
    public function getAllOptions()
    {
        if (empty($this->options)) {
            $options = [];
            $searchCriteria = $this->searchCriteriaBuilder->create();
            $searchResults = $this->formcomponentv1Repository->getList($searchCriteria);
            foreach ($searchResults->getItems() as $formcomponentv1) {
                $options[] = [
                    'value' => $formcomponentv1->getFormcomponentv1Id(),
                    'label' => $formcomponentv1->getTitle(),
                ];
            }
            $this->options = $options;
        }

        return $this->options;
    }

    /**
     * @return array
     */
    public function toOptionArray()
    {
        return $this->getAllOptions();
    }
}
