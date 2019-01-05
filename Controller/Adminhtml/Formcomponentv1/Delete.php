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

class Delete extends \Sanjeev\FormComponentV1\Controller\Adminhtml\Formcomponentv1
{
    /**
     * @return \Magento\Framework\Controller\Result\Redirect
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $id = $this->getRequest()->getParam('formcomponentv1_id');
        if ($id) {
            try {
                $this->formcomponentv1Repository->deleteById($id);
                $this->messageManager->addSuccessMessage(__('The Form&#x20;Component&#x20;V1 has been deleted.'));
                $resultRedirect->setPath('sanjeev_formcomponentv1/*/');
                return $resultRedirect;
            } catch (\Magento\Framework\Exception\NoSuchEntityException $e) {
                $this->messageManager->addErrorMessage(__('The Form&#x20;Component&#x20;V1 no longer exists.'));
                return $resultRedirect->setPath('sanjeev_formcomponentv1/*/');
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
                return $resultRedirect->setPath('sanjeev_formcomponentv1/formcomponentv1/edit', ['formcomponentv1_id' => $id]);
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage(__('There was a problem deleting the Form&#x20;Component&#x20;V1'));
                return $resultRedirect->setPath('sanjeev_formcomponentv1/formcomponentv1/edit', ['formcomponentv1_id' => $id]);
            }
        }
        $this->messageManager->addErrorMessage(__('We can\'t find a Form&#x20;Component&#x20;V1 to delete.'));
        $resultRedirect->setPath('sanjeev_formcomponentv1/*/');
        return $resultRedirect;
    }
}
