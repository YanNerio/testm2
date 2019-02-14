<?php

namespace Yannerio\Calculadora\Block\Adminhtml\Grid\Edit;

/**
 * Adminhtml Add New Row Form.
 */
class Form extends \Magento\Backend\Block\Widget\Form\Generic
{
    /**
     * @var \Magento\Store\Model\System\Store
     */
    protected $_systemStore;

    /**
     * @param \Magento\Backend\Block\Template\Context $context,
     * @param \Magento\Framework\Registry $registry,
     * @param \Magento\Framework\Data\FormFactory $formFactory,
     * @param \Yannerio\Calculadora\Model\Status $options,
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Yannerio\Calculadora\Model\Status $options,
        array $data = []
    ) {
        $this->_options = $options;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * Prepare form.
     *
     * @return $this
     */
    protected function _prepareForm()
    {
        $dateFormat = $this->_localeDate->getDateFormat(\IntlDateFormatter::SHORT);
        $model = $this->_coreRegistry->registry('row_data');
        $form = $this->_formFactory->create(
            ['data' => [
                            'id' => 'edit_form',
                            'enctype' => 'multipart/form-data',
                            'action' => $this->getData('action'),
                            'method' => 'post'
                        ]
            ]
        );

        $form->setHtmlIdPrefix('wkgrid_');
        if ($model->getEntityId()) {
            $fieldset = $form->addFieldset(
                'base_fieldset',
                ['legend' => __('Edit Row Data'), 'class' => 'fieldset-wide']
            );
            $fieldset->addField('entity_id', 'hidden', ['name' => 'entity_id']);
        } else {
            $fieldset = $form->addFieldset(
                'base_fieldset',
                ['legend' => __('Add Row Data'), 'class' => 'fieldset-wide']
            );
        }

        $fieldset->addField(
            'nombre',
            'text',
            [
                'name' => 'nombre',
                'label' => __('Nombre'),
                'id' => 'nombre',
                'title' => __('Nombre'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );
        $fieldset->addField(
            'plazo',
            'text',
            [
                'name' => 'plazo',
                'label' => __('Plazos'),
                'id' => 'plazo',
                'title' => __('Plazos'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );
        $fieldset->addField(
            'interes',
            'text',
            [
                'name' => 'interes',
                'label' => __('Interes (%)'),
                'id' => 'interes',
                'title' => __('Interes (%)'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );
        $fieldset->addField(
            'monto_max',
            'text',
            [
                'name' => 'monto_max',
                'label' => __('Monto Maximo'),
                'id' => 'monto_max',
                'title' => __('Monto Maximo'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );
        $fieldset->addField(
            'estado',
            'select',
            [
                'name' => 'estado',
                'label' => __('Estado'),
                'id' => 'estado',
                'title' => __('Estado'),
                'values' => $this->_options->getOptionArray(),
                'class' => 'status',
                'required' => true,
            ]
        );
        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}
