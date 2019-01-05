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
namespace Sanjeev\FormComponentV1\Model;

class Formcomponentv1Repository implements \Sanjeev\FormComponentV1\Api\Formcomponentv1RepositoryInterface
{
    /**
     * Cached instances
     * 
     * @var array
     */
    protected $instances = [];

    /**
     * Form Component V1 resource model
     * 
     * @var \Sanjeev\FormComponentV1\Model\ResourceModel\Formcomponentv1
     */
    protected $resource;

    /**
     * Form Component V1 collection factory
     * 
     * @var \Sanjeev\FormComponentV1\Model\ResourceModel\Formcomponentv1\CollectionFactory
     */
    protected $formcomponentv1CollectionFactory;

    /**
     * Form Component V1 interface factory
     * 
     * @var \Sanjeev\FormComponentV1\Api\Data\Formcomponentv1InterfaceFactory
     */
    protected $formcomponentv1InterfaceFactory;

    /**
     * Data Object Helper
     * 
     * @var \Magento\Framework\Api\DataObjectHelper
     */
    protected $dataObjectHelper;

    /**
     * Search result factory
     * 
     * @var \Sanjeev\FormComponentV1\Api\Data\Formcomponentv1SearchResultInterfaceFactory
     */
    protected $searchResultsFactory;

    /**
     * constructor
     * 
     * @param \Sanjeev\FormComponentV1\Model\ResourceModel\Formcomponentv1 $resource
     * @param \Sanjeev\FormComponentV1\Model\ResourceModel\Formcomponentv1\CollectionFactory $formcomponentv1CollectionFactory
     * @param \Sanjeev\FormComponentV1\Api\Data\Formcomponentv1InterfaceFactory $formcomponentv1InterfaceFactory
     * @param \Magento\Framework\Api\DataObjectHelper $dataObjectHelper
     * @param \Sanjeev\FormComponentV1\Api\Data\Formcomponentv1SearchResultInterfaceFactory $searchResultsFactory
     */
    public function __construct(
        \Sanjeev\FormComponentV1\Model\ResourceModel\Formcomponentv1 $resource,
        \Sanjeev\FormComponentV1\Model\ResourceModel\Formcomponentv1\CollectionFactory $formcomponentv1CollectionFactory,
        \Sanjeev\FormComponentV1\Api\Data\Formcomponentv1InterfaceFactory $formcomponentv1InterfaceFactory,
        \Magento\Framework\Api\DataObjectHelper $dataObjectHelper,
        \Sanjeev\FormComponentV1\Api\Data\Formcomponentv1SearchResultInterfaceFactory $searchResultsFactory
    ) {
        $this->resource                         = $resource;
        $this->formcomponentv1CollectionFactory = $formcomponentv1CollectionFactory;
        $this->formcomponentv1InterfaceFactory  = $formcomponentv1InterfaceFactory;
        $this->dataObjectHelper                 = $dataObjectHelper;
        $this->searchResultsFactory             = $searchResultsFactory;
    }

    /**
     * Save Form Component V1.
     *
     * @param \Sanjeev\FormComponentV1\Api\Data\Formcomponentv1Interface $formcomponentv1
     * @return \Sanjeev\FormComponentV1\Api\Data\Formcomponentv1Interface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(\Sanjeev\FormComponentV1\Api\Data\Formcomponentv1Interface $formcomponentv1)
    {
        /** @var \Sanjeev\FormComponentV1\Api\Data\Formcomponentv1Interface|\Magento\Framework\Model\AbstractModel $formcomponentv1 */
        try {
            $this->resource->save($formcomponentv1);
        } catch (\Exception $exception) {
            throw new \Magento\Framework\Exception\CouldNotSaveException(__(
                'Could not save the Form&#x20;Component&#x20;V1: %1',
                $exception->getMessage()
            ));
        }
        return $formcomponentv1;
    }

    /**
     * Retrieve Form Component V1.
     *
     * @param int $formcomponentv1Id
     * @return \Sanjeev\FormComponentV1\Api\Data\Formcomponentv1Interface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($formcomponentv1Id)
    {
        if (!isset($this->instances[$formcomponentv1Id])) {
            /** @var \Sanjeev\FormComponentV1\Api\Data\Formcomponentv1Interface|\Magento\Framework\Model\AbstractModel $formcomponentv1 */
            $formcomponentv1 = $this->formcomponentv1InterfaceFactory->create();
            $this->resource->load($formcomponentv1, $formcomponentv1Id);
            if (!$formcomponentv1->getId()) {
                throw new \Magento\Framework\Exception\NoSuchEntityException(__('Requested Form&#x20;Component&#x20;V1 doesn\'t exist'));
            }
            $this->instances[$formcomponentv1Id] = $formcomponentv1;
        }
        return $this->instances[$formcomponentv1Id];
    }

    /**
     * Retrieve Form Component V1s matching the specified criteria.
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Sanjeev\FormComponentV1\Api\Data\Formcomponentv1SearchResultInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria)
    {
        /** @var \Sanjeev\FormComponentV1\Api\Data\Formcomponentv1SearchResultInterface $searchResults */
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);

        /** @var \Sanjeev\FormComponentV1\Model\ResourceModel\Formcomponentv1\Collection $collection */
        $collection = $this->formcomponentv1CollectionFactory->create();

        //Add filters from root filter group to the collection
        /** @var \Magento\Framework\Api\Search\FilterGroup $group */
        foreach ($searchCriteria->getFilterGroups() as $group) {
            $this->addFilterGroupToCollection($group, $collection);
        }
        $sortOrders = $searchCriteria->getSortOrders();
        /** @var \Magento\Framework\Api\SortOrder $sortOrder */
        if ($sortOrders) {
            foreach ($searchCriteria->getSortOrders() as $sortOrder) {
                $field = $sortOrder->getField();
                $collection->addOrder(
                    $field,
                    ($sortOrder->getDirection() == \Magento\Framework\Api\SortOrder::SORT_ASC) ? 'ASC' : 'DESC'
                );
            }
        } else {
            // set a default sorting order since this method is used constantly in many
            // different blocks
            $field = 'formcomponentv1_id';
            $collection->addOrder($field, 'ASC');
        }
        $collection->setCurPage($searchCriteria->getCurrentPage());
        $collection->setPageSize($searchCriteria->getPageSize());

        /** @var \Sanjeev\FormComponentV1\Api\Data\Formcomponentv1Interface[] $formcomponentv1s */
        $formcomponentv1s = [];
        /** @var \Sanjeev\FormComponentV1\Model\Formcomponentv1 $formcomponentv1 */
        foreach ($collection as $formcomponentv1) {
            /** @var \Sanjeev\FormComponentV1\Api\Data\Formcomponentv1Interface $formcomponentv1DataObject */
            $formcomponentv1DataObject = $this->formcomponentv1InterfaceFactory->create();
            $this->dataObjectHelper->populateWithArray(
                $formcomponentv1DataObject,
                $formcomponentv1->getData(),
                \Sanjeev\FormComponentV1\Api\Data\Formcomponentv1Interface::class
            );
            $formcomponentv1s[] = $formcomponentv1DataObject;
        }
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults->setItems($formcomponentv1s);
    }

    /**
     * Delete Form Component V1.
     *
     * @param \Sanjeev\FormComponentV1\Api\Data\Formcomponentv1Interface $formcomponentv1
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(\Sanjeev\FormComponentV1\Api\Data\Formcomponentv1Interface $formcomponentv1)
    {
        /** @var \Sanjeev\FormComponentV1\Api\Data\Formcomponentv1Interface|\Magento\Framework\Model\AbstractModel $formcomponentv1 */
        $id = $formcomponentv1->getId();
        try {
            unset($this->instances[$id]);
            $this->resource->delete($formcomponentv1);
        } catch (\Magento\Framework\Exception\ValidatorException $e) {
            throw new \Magento\Framework\Exception\CouldNotSaveException(__($e->getMessage()));
        } catch (\Exception $e) {
            throw new \Magento\Framework\Exception\StateException(
                __('Unable to remove Form&#x20;Component&#x20;V1 %1', $id)
            );
        }
        unset($this->instances[$id]);
        return true;
    }

    /**
     * Delete Form Component V1 by ID.
     *
     * @param int $formcomponentv1Id
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($formcomponentv1Id)
    {
        $formcomponentv1 = $this->getById($formcomponentv1Id);
        return $this->delete($formcomponentv1);
    }

    /**
     * Helper function that adds a FilterGroup to the collection.
     *
     * @param \Magento\Framework\Api\Search\FilterGroup $filterGroup
     * @param \Sanjeev\FormComponentV1\Model\ResourceModel\Formcomponentv1\Collection $collection
     * @return $this
     * @throws \Magento\Framework\Exception\InputException
     */
    protected function addFilterGroupToCollection(
        \Magento\Framework\Api\Search\FilterGroup $filterGroup,
        \Sanjeev\FormComponentV1\Model\ResourceModel\Formcomponentv1\Collection $collection
    ) {
        $fields = [];
        $conditions = [];
        foreach ($filterGroup->getFilters() as $filter) {
            $condition = $filter->getConditionType() ? $filter->getConditionType() : 'eq';
            $fields[] = $filter->getField();
            $conditions[] = [$condition => $filter->getValue()];
        }
        if ($fields) {
            $collection->addFieldToFilter($fields, $conditions);
        }
        return $this;
    }
}
