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

class Text extends AbstractModifier
{
	
    public function modifyMeta(array $meta)
    {	
    	$meta['first_fieldset_name'] = [
            'arguments' => [
                'data' => [
                    'config' => [
                        'label' => __('Label For Fieldset'),
                        'componentType' => 'fieldset',
                        'sortOrder' => 20,
                        'collapsible' => false
                    ]
                ]
            ],
            'children' => [
                'first_fieldset_container' => [
                    'arguments' => [
                        'data' => [
                            'config' => [
                                'formElement' => 'container',
                                'componentType' => 'container',
                                'visible' => 0,
                                'required' => 0,
                              ]
                        ]
                    ],
                    'children' =>[
                    	'title' => [ 
                    		'arguments' => [
                        	'data' => [
                            	'config' => [
                                	 'formElement' => Form\Element\Input::NAME,
                                     'componentType' => Form\Field::NAME,
                                     'dataType' => Form\Element\DataType\Text::NAME,
                                     'dataScope' => 'title',
                                	 'source' => 'formcomponentv1',
                                	 'visible' => 1,
                                	 'required' => 1,
                                     'validation' => [
                                        'required-entry' => true
                                     ],
                                     'additionalClasses' => '', /*if any additional css classes are required.*/
                                	 'label' => __("Title"),
                                	 'placeholder' => __("Please enter title"),
                              		]
                        		]
                    		]		
                    	]
                    ]

                ]
            ]
        ];

        return $meta;
    }

}
