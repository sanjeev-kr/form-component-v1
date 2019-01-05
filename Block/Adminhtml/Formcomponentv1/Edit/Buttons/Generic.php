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
namespace Sanjeev\FormComponentV1\Block\Adminhtml\Formcomponentv1\Edit\Buttons;

class Generic
{
    /**
     * Widget Context
     * 
     * @var \Magento\Backend\Block\Widget\Context
     */
    protected $context;

    /**
     * Form Component V1 Repository
     * 
     * @var \Sanjeev\FormComponentV1\Api\Formcomponentv1RepositoryInterface
     */
    protected $formcomponentv1Repository;

    /**
     * constructor
     * 
     * @param \Magento\Backend\Block\Widget\Context $context
     * @param \Sanjeev\FormComponentV1\Api\Formcomponentv1RepositoryInterface $formcomponentv1Repository
     */
    public function __construct(
        \Magento\Backend\Block\Widget\Context $context,
        \Sanjeev\FormComponentV1\Api\Formcomponentv1RepositoryInterface $formcomponentv1Repository
    ) {
        $this->context                   = $context;
        $this->formcomponentv1Repository = $formcomponentv1Repository;
    }

    /**
     * Return Form Component V1 ID
     *
     * @return int|null
     */
    public function getFormcomponentv1Id()
    {
        try {
            return $this->formcomponentv1Repository->getById(
                $this->context->getRequest()->getParam('formcomponentv1_id')
            )->getId();
        } catch (\Magento\Framework\Exception\NoSuchEntityException $e) {
            return null;
        }
    }

    /**
     * Generate url by route and parameters
     *
     * @param   string $route
     * @param   array $params
     * @return  string
     */
    public function getUrl($route = '', $params = [])
    {
        return $this->context->getUrlBuilder()->getUrl($route, $params);
    }
}
