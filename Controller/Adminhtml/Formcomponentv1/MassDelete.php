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

class MassDelete extends \Sanjeev\FormComponentV1\Controller\Adminhtml\Formcomponentv1\MassAction
{
    /**
     * @param \Sanjeev\FormComponentV1\Api\Data\Formcomponentv1Interface $formcomponentv1
     * @return $this
     */
    protected function massAction(\Sanjeev\FormComponentV1\Api\Data\Formcomponentv1Interface $formcomponentv1)
    {
        $this->formcomponentv1Repository->delete($formcomponentv1);
        return $this;
    }
}
