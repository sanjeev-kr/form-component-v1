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

/**
 * @method \Sanjeev\FormComponentV1\Model\ResourceModel\Formcomponentv1 _getResource()
 * @method \Sanjeev\FormComponentV1\Model\ResourceModel\Formcomponentv1 getResource()
 */
class Formcomponentv1 extends \Magento\Framework\Model\AbstractModel implements \Sanjeev\FormComponentV1\Api\Data\Formcomponentv1Interface
{
    /**
     * Cache tag
     * 
     * @var string
     */
    const CACHE_TAG = 'sanjeev_formcomponentv1_formcomponentv1';

    /**
     * Cache tag
     * 
     * @var string
     */
    protected $_cacheTag = self::CACHE_TAG;

    /**
     * Event prefix
     * 
     * @var string
     */
    protected $_eventPrefix = 'sanjeev_formcomponentv1_formcomponentv1';

    /**
     * Event object
     * 
     * @var string
     */
    protected $_eventObject = 'formcomponentv1';

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Sanjeev\FormComponentV1\Model\ResourceModel\Formcomponentv1::class);
    }

    /**
     * Get identities
     *
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * Get Form Component V1 id
     *
     * @return array
     */
    public function getFormcomponentv1Id()
    {
        return $this->getData(\Sanjeev\FormComponentV1\Api\Data\Formcomponentv1Interface::FORMCOMPONENTV1_ID);
    }

    /**
     * set Form Component V1 id
     *
     * @param int $formcomponentv1Id
     * @return \Sanjeev\FormComponentV1\Api\Data\Formcomponentv1Interface
     */
    public function setFormcomponentv1Id($formcomponentv1Id)
    {
        return $this->setData(\Sanjeev\FormComponentV1\Api\Data\Formcomponentv1Interface::FORMCOMPONENTV1_ID, $formcomponentv1Id);
    }

    /**
     * set Title
     *
     * @param mixed $title
     * @return \Sanjeev\FormComponentV1\Api\Data\Formcomponentv1Interface
     */
    public function setTitle($title)
    {
        return $this->setData(\Sanjeev\FormComponentV1\Api\Data\Formcomponentv1Interface::TITLE, $title);
    }

    /**
     * get Title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->getData(\Sanjeev\FormComponentV1\Api\Data\Formcomponentv1Interface::TITLE);
    }
}
