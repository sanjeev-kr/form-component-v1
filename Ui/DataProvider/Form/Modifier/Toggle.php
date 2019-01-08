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

namespace Sanjeev\FormComponentV1\Ui\DataProvider\Form\Modifier;

use Magento\Ui\Component\Form;

class Toggle extends AbstractModifier
{
	
    public function modifyMeta(array $meta)
    {	
    	$meta['first_fieldset_name']['children']['first_fieldset_container']['children']['status'] = [  'arguments' => [
                              'data' => [
                                 'config' => [
                                    'dataType' => Form\Element\DataType\Number::NAME,
                                    'formElement' => Form\Element\Checkbox::NAME,
                                    'componentType' => Form\Field::NAME,
                                    'prefer' => 'toggle',
                                    'dataScope' => 'status',
                                    'source' => 'formcomponentv1',
                                    'valueMap' => [
                                        'true' => '1',
                                        'false' => '2'
                                        ],
                                     'label' => __("Status"),
                                     'validation' => [
                                        'required-entry' => true
                                     ],
                                    ]
                                ]
                            ]       
                        ];
        return $meta;
    }

}
