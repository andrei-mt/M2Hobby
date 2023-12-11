<?php

declare(strict_types = 1);

namespace MT\Hobby\Block\System\Config\Form\Field;

use Magento\Config\Block\System\Config\Form\Field\FieldArray\AbstractFieldArray;

class Hobby extends AbstractFieldArray
{
    /**
     * Construct
     */
    protected function _construct(): void
    {
        parent::_construct();
        $this->_addButtonLabel = __('Add');
    }

    /**
     * Prepare to render the columns
     */
    protected function _prepareToRender(): void
    {
        $this->addColumn('value', ['label' => __('Hobby Code')]);
        $this->addColumn('label', ['label' => __('Hobby Label')]);
        $this->_addAfter       = false;
        $this->_addButtonLabel = __('Add');
    }
}
