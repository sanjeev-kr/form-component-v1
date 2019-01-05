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
namespace Sanjeev\FormComponentV1\Controller\Adminhtml;

abstract class Formcomponentv1 extends \Magento\Backend\App\Action
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
     * constructor
     * 
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Registry $coreRegistry
     * @param \Sanjeev\FormComponentV1\Api\Formcomponentv1RepositoryInterface $formcomponentv1Repository
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Sanjeev\FormComponentV1\Api\Formcomponentv1RepositoryInterface $formcomponentv1Repository,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        $this->coreRegistry              = $coreRegistry;
        $this->formcomponentv1Repository = $formcomponentv1Repository;
        $this->resultPageFactory         = $resultPageFactory;
        parent::__construct($context);
    }
}
