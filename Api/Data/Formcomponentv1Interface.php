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
interface Formcomponentv1Interface
{
    /**
     * ID
     * 
     * @var string
     */
    const FORMCOMPONENTV1_ID = 'formcomponentv1_id';

    /**
     * Title attribute constant
     * 
     * @var string
     */
    const TITLE = 'title';

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId();

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getFormcomponentv1Id();

    /**
     * Set ID
     *
     * @param int $formcomponentv1Id
     * @return Formcomponentv1Interface
     */
    public function setFormcomponentv1Id($formcomponentv1Id);

    /**
     * Get Title
     *
     * @return mixed
     */
    public function getTitle();

    /**
     * Set Title
     *
     * @param mixed $title
     * @return Formcomponentv1Interface
     */
    public function setTitle($title);
}
