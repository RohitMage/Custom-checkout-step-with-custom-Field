<?php

namespace Web30india\CheckoutField\Model\Plugin\Checkout;

class LayoutProcessor
{
    /**
     * @param \Magento\Checkout\Block\Checkout\LayoutProcessor $subject
     * @param array $jsLayout
     * @return array
     */
    public function afterProcess(
        \Magento\Checkout\Block\Checkout\LayoutProcessor $subject,
        array  $jsLayout
    ) {

        $jsLayout['components']['checkout']['children']
        ['steps']['children']['personal-info']['children']['personal-data']['children']
        ['alternate_phone'] = [
            'component' => 'Magento_Ui/js/form/element/abstract',
            'config' => [
                'customScope' => 'personal-info',
                'customEntry' => null,
                'template' => 'ui/form/field',
                'elementTmpl' => 'ui/form/element/input',
                'id' => 'second-phone'
            ],
            'dataScope' => 'personal-info.alternate_phone',
            'label' => 'Alternative Phone',
            'provider' => 'checkoutProvider',
            'sortOrder' => 320,
            'validation' => [
                'required-entry' => false
            ],
            'filterBy' => null,
            'customEntry' => null,
            'visible' => true,
            'value' => '',
            'id' => 'second-phone'
        ];

        $jsLayout['components']['checkout']['children']
        ['steps']['children']['personal-info']['children']['personal-data']['children']['delhivery_type'] = [
            'component' => 'Magento_Ui/js/form/element/select',
            'config' => [
                'customScope' => 'personal-info',
                'template' => 'ui/form/field',
                'elementTmpl' => 'ui/form/element/select',
                'id' => 'drop-down',
            ],
            'dataScope' => 'personal-info.delhivery_type',
            'label' => 'Delhivery Type',
            'provider' => 'checkoutProvider',
            'visible' => true,
            'validation' => [],
            'sortOrder' => 340,
            'id' => 'drop-down',
            'options' => [
                [
                    'value' => '',
                    'label' => 'Please Select',
                ],
                [
                    'value' => '1',
                    'label' => 'Home'
                ],
                [
                    'value' => '2',
                    'label' => 'Office'
                ],
                [
                    'value' => '3',
                    'label' => 'Other'
                ]
            ]
        ];

        $jsLayout['components']['checkout']['children']
        ['steps']['children']['personal-info']['children']['personal-data']['children']['delhivery_date'] = [
            'component' => 'Magento_Ui/js/form/element/date',
            'config' => [
                'customScope' => 'personal-info',
                'customEntry' => null,
                'template' => 'ui/form/field',
                'elementTmpl' => 'ui/form/element/date',
                'timezoneFormat' => 'YYYY-MM-DD HH:mm',
                'id' => 'second-date'
            ],
            'dataScope' => 'personal-info.delhivery_date',
            'label' => 'Delhivery Date',
            'provider' => 'checkoutProvider',
            'sortOrder' => 360,
            'validation' => [
                'required-entry' => false
            ],
            'filterBy' => null,
            'customEntry' => null,
            'visible' => true,
            'value' => '',
            'id' => 'second-date',
            'options' => $this->getOptions()
        ];

        $jsLayout['components']['checkout']['children']
        ['steps']['children']['personal-info']['children']['personal-data']['children']['gender'] = [
            'component' => 'Magento_Ui/js/form/element/select',
            'config' => [
                'customScope' => 'personal-info',
                'template' => 'ui/form/field',
                'elementTmpl' => 'ui/form/element/select',
                'id' => 'gender'
            ],
            'dataScope' => 'personal-info.gender',
            'label' => 'Gender',
            'provider' => 'checkoutProvider',
            'sortOrder' => 380,
            'validation' => [
                'required-entry' => false
            ],
            'visible' => true,
            'id' => 'gender',
            'options' => [
                [
                    'value' => '',
                    'label' => 'Please Select',
                ],
                [
                    'value' => '1',
                    'label' => 'Male'
                ],
                [
                    'value' => '2',
                    'label' => 'Female'
                ],
                [
                    'value' => '3',
                    'label' => 'Other'
                ]
            ]
        ];

        $jsLayout['components']['checkout']['children']
        ['steps']['children']['personal-info']['children']['personal-data']['children']['delhivery_note'] = [
            'component' => 'Magento_Ui/js/form/element/textarea',
            'config' => [
                'customScope' => 'personal-info',
                'customEntry' => null,
                'template' => 'ui/form/field',
                'elementTmpl' => 'ui/form/element/textarea',
                'id' => 'second-note'
            ],
            'dataScope' => 'personal-info.delhivery_note',
            'label' => 'Delhivery Note',
            'provider' => 'checkoutProvider',
            'sortOrder' => 400,
            'validation' => [
                'required-entry' => false
            ],
            'filterBy' => null,
            'customEntry' => null,
            'visible' => true,
            'value' => '',
            'id' => 'second-note'
        ];

        return $jsLayout;
    }

    protected function getOptions()
    {
        return ['dateFormat' => 'm/d/Y', 'timeFormat' => 'HH:mm', 'showsTime' => true];
    }
}