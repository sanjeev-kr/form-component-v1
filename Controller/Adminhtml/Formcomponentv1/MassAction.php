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
namespace Sanjeev\FormComponentV1\Controller\Adminhtml\Formcomponentv1;

abstract class MassAction extends \Magento\Backend\App\Action
{
    /**
     * Form Component V1 repository
     * 
     * @var \Sanjeev\FormComponentV1\Api\Formcomponentv1RepositoryInterface
     */
    protected $formcomponentv1Repository;

    /**
     * Mass Action filter
     * 
     * @var \Magento\Ui\Component\MassAction\Filter
     */
    protected $filter;

    /**
     * Form Component V1 collection factory
     * 
     * @var \Sanjeev\FormComponentV1\Model\ResourceModel\Formcomponentv1\CollectionFactory
     */
    protected $collectionFactory;

    /**
     * Action success message
     * 
     * @var string
     */
    protected $successMessage;

    /**
     * Action error message
     * 
     * @var string
     */
    protected $errorMessage;

    /**
     * constructor
     * 
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Sanjeev\FormComponentV1\Api\Formcomponentv1RepositoryInterface $formcomponentv1Repository
     * @param \Magento\Ui\Component\MassAction\Filter $filter
     * @param \Sanjeev\FormComponentV1\Model\ResourceModel\Formcomponentv1\CollectionFactory $collectionFactory
     * @param string $successMessage
     * @param string $errorMessage
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Sanjeev\FormComponentV1\Api\Formcomponentv1RepositoryInterface $formcomponentv1Repository,
        \Magento\Ui\Component\MassAction\Filter $filter,
        \Sanjeev\FormComponentV1\Model\ResourceModel\Formcomponentv1\CollectionFactory $collectionFactory,
        $successMessage,
        $errorMessage
    ) {
        $this->formcomponentv1Repository = $formcomponentv1Repository;
        $this->filter                    = $filter;
        $this->collectionFactory         = $collectionFactory;
        $this->successMessage            = $successMessage;
        $this->errorMessage              = $errorMessage;
        parent::__construct($context);
    }

    /**
     * @param \Sanjeev\FormComponentV1\Api\Data\Formcomponentv1Interface $formcomponentv1
     * @return mixed
     */
    abstract protected function massAction(\Sanjeev\FormComponentV1\Api\Data\Formcomponentv1Interface $formcomponentv1);

    /**
     * execute action
     *
     * @return \Magento\Framework\Controller\Result\Redirect
     */
    public function execute()
    {
        try {
            $collection = $this->filter->getCollection($this->collectionFactory->create());
            $collectionSize = $collection->getSize();
            foreach ($collection as $formcomponentv1) {
                $this->massAction($formcomponentv1);
            }
            $this->messageManager->addSuccessMessage(__($this->successMessage, $collectionSize));
        } catch (\Magento\Framework\Exception\LocalizedException $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        } catch (\Exception $e) {
            $this->messageManager->addExceptionMessage($e, $this->errorMessage);
        }
        $redirectResult = $this->resultRedirectFactory->create();
        $redirectResult->setPath('sanjeev_formcomponentv1/*/index');
        return $redirectResult;
    }
}
