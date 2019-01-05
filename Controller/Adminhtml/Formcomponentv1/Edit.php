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

class Edit extends \Sanjeev\FormComponentV1\Controller\Adminhtml\Formcomponentv1
{
    /**
     * Initialize current Form Component V1 and set it in the registry.
     *
     * @return int
     */
    protected function initFormcomponentv1()
    {
        $formcomponentv1Id = $this->getRequest()->getParam('formcomponentv1_id');
        $this->coreRegistry->register(\Sanjeev\FormComponentV1\Controller\RegistryConstants::CURRENT_FORMCOMPONENTV1_ID, $formcomponentv1Id);

        return $formcomponentv1Id;
    }

    /**
     * Edit or create Form Component V1
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        $formcomponentv1Id = $this->initFormcomponentv1();

        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Sanjeev_FormComponentV1::formcomponentv1_formcomponentv1');
        $resultPage->getConfig()->getTitle()->prepend(__('Form&#x20;Component&#x20;V1s'));
        $resultPage->addBreadcrumb(__('Form Component V1'), __('Form Component V1'));
        $resultPage->addBreadcrumb(__('Form&#x20;Component&#x20;V1s'), __('Form&#x20;Component&#x20;V1s'), $this->getUrl('sanjeev_formcomponentv1/formcomponentv1'));

        if ($formcomponentv1Id === null) {
            $resultPage->addBreadcrumb(__('New Form&#x20;Component&#x20;V1'), __('New Form&#x20;Component&#x20;V1'));
            $resultPage->getConfig()->getTitle()->prepend(__('New Form&#x20;Component&#x20;V1'));
        } else {
            $resultPage->addBreadcrumb(__('Edit Form&#x20;Component&#x20;V1'), __('Edit Form&#x20;Component&#x20;V1'));
            $resultPage->getConfig()->getTitle()->prepend(
                $this->formcomponentv1Repository->getById($formcomponentv1Id)->getTitle()
            );
        }
        return $resultPage;
    }
}
