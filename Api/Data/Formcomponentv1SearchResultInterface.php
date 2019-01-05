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
namespace Sanjeev\FormComponentV1\Api\Data;

/**
 * @api
 */
interface Formcomponentv1SearchResultInterface
{
    /**
     * Get Form Component V1s list.
     *
     * @return \Sanjeev\FormComponentV1\Api\Data\Formcomponentv1Interface[]
     */
    public function getItems();

    /**
     * Set Form Component V1s list.
     *
     * @param \Sanjeev\FormComponentV1\Api\Data\Formcomponentv1Interface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
