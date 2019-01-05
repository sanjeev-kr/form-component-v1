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

class Save extends \Sanjeev\FormComponentV1\Controller\Adminhtml\Formcomponentv1
{
    /**
     * Form Component V1 factory
     * 
     * @var \Sanjeev\FormComponentV1\Api\Data\Formcomponentv1InterfaceFactory
     */
    protected $formcomponentv1Factory;

    /**
     * Data Object Processor
     * 
     * @var \Magento\Framework\Reflection\DataObjectProcessor
     */
    protected $dataObjectProcessor;

    /**
     * Data Object Helper
     * 
     * @var \Magento\Framework\Api\DataObjectHelper
     */
    protected $dataObjectHelper;

    /**
     * Uploader pool
     * 
     * @var \Sanjeev\FormComponentV1\Model\UploaderPool
     */
    protected $uploaderPool;

    /**
     * Data Persistor
     * 
     * @var \Magento\Framework\App\Request\DataPersistorInterface
     */
    protected $dataPersistor;

    /**
     * constructor
     * 
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Registry $coreRegistry
     * @param \Sanjeev\FormComponentV1\Api\Formcomponentv1RepositoryInterface $formcomponentv1Repository
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     * @param \Sanjeev\FormComponentV1\Api\Data\Formcomponentv1InterfaceFactory $formcomponentv1Factory
     * @param \Magento\Framework\Reflection\DataObjectProcessor $dataObjectProcessor
     * @param \Magento\Framework\Api\DataObjectHelper $dataObjectHelper
     * @param \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Sanjeev\FormComponentV1\Api\Formcomponentv1RepositoryInterface $formcomponentv1Repository,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Sanjeev\FormComponentV1\Api\Data\Formcomponentv1InterfaceFactory $formcomponentv1Factory,
        \Magento\Framework\Reflection\DataObjectProcessor $dataObjectProcessor,
        \Magento\Framework\Api\DataObjectHelper $dataObjectHelper,
        \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor
    ) {
        $this->formcomponentv1Factory = $formcomponentv1Factory;
        $this->dataObjectProcessor    = $dataObjectProcessor;
        $this->dataObjectHelper       = $dataObjectHelper;
        $this->dataPersistor          = $dataPersistor;
        parent::__construct($context, $coreRegistry, $formcomponentv1Repository, $resultPageFactory);
    }

    /**
     * run the action
     *
     * @return \Magento\Framework\Controller\Result\Redirect
     */
    public function execute()
    {
        /** @var \Sanjeev\FormComponentV1\Api\Data\Formcomponentv1Interface $formcomponentv1 */
        $formcomponentv1 = null;
        $postData = $this->getRequest()->getPostValue();
        $data = $postData;
        $id = !empty($data['formcomponentv1_id']) ? $data['formcomponentv1_id'] : null;
        $resultRedirect = $this->resultRedirectFactory->create();
        try {
            if ($id) {
                $formcomponentv1 = $this->formcomponentv1Repository->getById((int)$id);
            } else {
                unset($data['formcomponentv1_id']);
                $formcomponentv1 = $this->formcomponentv1Factory->create();
            }
            $this->dataObjectHelper->populateWithArray($formcomponentv1, $data, \Sanjeev\FormComponentV1\Api\Data\Formcomponentv1Interface::class);
            $this->formcomponentv1Repository->save($formcomponentv1);
            $this->messageManager->addSuccessMessage(__('You saved the Item'));
            $this->dataPersistor->clear('sanjeev_formcomponentv1_formcomponentv1');
            if ($this->getRequest()->getParam('back')) {
                $resultRedirect->setPath('sanjeev_formcomponentv1/formcomponentv1/edit', ['formcomponentv1_id' => $formcomponentv1->getId()]);
            } else {
                $resultRedirect->setPath('sanjeev_formcomponentv1/formcomponentv1');
            }
        } catch (\Magento\Framework\Exception\LocalizedException $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
            $this->dataPersistor->set('sanjeev_formcomponentv1_formcomponentv1', $postData);
            $resultRedirect->setPath('sanjeev_formcomponentv1/formcomponentv1/edit', ['formcomponentv1_id' => $id]);
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__('There was a problem while saving'));
            $this->dataPersistor->set('sanjeev_formcomponentv1_formcomponentv1', $postData);
            $resultRedirect->setPath('sanjeev_formcomponentv1/formcomponentv1/edit', ['formcomponentv1_id' => $id]);
        }
        return $resultRedirect;
    }

    
}
