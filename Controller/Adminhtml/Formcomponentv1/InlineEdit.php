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

class InlineEdit extends \Sanjeev\FormComponentV1\Controller\Adminhtml\Formcomponentv1
{
    /**
     * Core registry
     * 
     * @var \Magento\Framework\Registry
     */
    protected $coreRegistry;

    /**
     * Form Component V1 repository
     * 
     * @var \Sanjeev\FormComponentV1\Api\Formcomponentv1RepositoryInterface
     */
    protected $formcomponentv1Repository;

    /**
     * Page factory
     * 
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;

    /**
     * Data object processor
     * 
     * @var \Magento\Framework\Reflection\DataObjectProcessor
     */
    protected $dataObjectProcessor;

    /**
     * Data object helper
     * 
     * @var \Magento\Framework\Api\DataObjectHelper
     */
    protected $dataObjectHelper;

    /**
     * JSON Factory
     * 
     * @var \Magento\Framework\Controller\Result\JsonFactory
     */
    protected $jsonFactory;

    /**
     * Form Component V1 resource model
     * 
     * @var \Sanjeev\FormComponentV1\Model\ResourceModel\Formcomponentv1
     */
    protected $formcomponentv1ResourceModel;

    /**
     * constructor
     * 
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Registry $coreRegistry
     * @param \Sanjeev\FormComponentV1\Api\Formcomponentv1RepositoryInterface $formcomponentv1Repository
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     * @param \Magento\Framework\Reflection\DataObjectProcessor $dataObjectProcessor
     * @param \Magento\Framework\Api\DataObjectHelper $dataObjectHelper
     * @param \Magento\Framework\Controller\Result\JsonFactory $jsonFactory
     * @param \Sanjeev\FormComponentV1\Model\ResourceModel\Formcomponentv1 $formcomponentv1ResourceModel
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Sanjeev\FormComponentV1\Api\Formcomponentv1RepositoryInterface $formcomponentv1Repository,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\Reflection\DataObjectProcessor $dataObjectProcessor,
        \Magento\Framework\Api\DataObjectHelper $dataObjectHelper,
        \Magento\Framework\Controller\Result\JsonFactory $jsonFactory,
        \Sanjeev\FormComponentV1\Model\ResourceModel\Formcomponentv1 $formcomponentv1ResourceModel
    ) {
        $this->dataObjectProcessor          = $dataObjectProcessor;
        $this->dataObjectHelper             = $dataObjectHelper;
        $this->jsonFactory                  = $jsonFactory;
        $this->formcomponentv1ResourceModel = $formcomponentv1ResourceModel;
        parent::__construct($context, $coreRegistry, $formcomponentv1Repository, $resultPageFactory);
    }

    /**
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Framework\Controller\Result\Json $resultJson */
        $resultJson = $this->jsonFactory->create();
        $error = false;
        $messages = [];

        $postItems = $this->getRequest()->getParam('items', []);
        if (!($this->getRequest()->getParam('isAjax') && count($postItems))) {
            return $resultJson->setData([
                'messages' => [__('Please correct the data sent.')],
                'error' => true,
            ]);
        }

        foreach (array_keys($postItems) as $formcomponentv1Id) {
            /** @var \Sanjeev\FormComponentV1\Model\Formcomponentv1|\Sanjeev\FormComponentV1\Api\Data\Formcomponentv1Interface $formcomponentv1 */
            $formcomponentv1 = $this->formcomponentv1Repository->getById((int)$formcomponentv1Id);
            try {
                $formcomponentv1Data = $postItems[$formcomponentv1Id];
                $this->dataObjectHelper->populateWithArray($formcomponentv1, $formcomponentv1Data, \Sanjeev\FormComponentV1\Api\Data\Formcomponentv1Interface::class);
                $this->formcomponentv1ResourceModel->saveAttribute($formcomponentv1, array_keys($formcomponentv1Data));
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $messages[] = $this->getErrorWithFormcomponentv1Id($formcomponentv1, $e->getMessage());
                $error = true;
            } catch (\RuntimeException $e) {
                $messages[] = $this->getErrorWithFormcomponentv1Id($formcomponentv1, $e->getMessage());
                $error = true;
            } catch (\Exception $e) {
                $messages[] = $this->getErrorWithFormcomponentv1Id(
                    $formcomponentv1,
                    __('Something went wrong while saving the Item.')
                );
                $error = true;
            }
        }

        return $resultJson->setData([
            'messages' => $messages,
            'error' => $error
        ]);
    }

    /**
     * Add Item id to error message
     *
     * @param \Sanjeev\FormComponentV1\Api\Data\Formcomponentv1Interface $formcomponentv1
     * @param string $errorText
     * @return string
     */
    protected function getErrorWithFormcomponentv1Id(\Sanjeev\FormComponentV1\Api\Data\Formcomponentv1Interface $formcomponentv1, $errorText)
    {
        return '[Item ID: ' . $formcomponentv1->getId() . '] ' . $errorText;
    }
}
