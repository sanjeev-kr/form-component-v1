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

class Index extends \Sanjeev\FormComponentV1\Controller\Adminhtml\Formcomponentv1
{
    /**
     * Form Component V1s list.
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Sanjeev_FormComponentV1::formcomponentv1');
        $resultPage->getConfig()->getTitle()->prepend(__('Form&#x20;Component&#x20;V1s'));
        $resultPage->addBreadcrumb(__('Form Component V1'), __('Form Component V1'));
        $resultPage->addBreadcrumb(__('Form&#x20;Component&#x20;V1s'), __('Form&#x20;Component&#x20;V1s'));
        return $resultPage;
    }
}
