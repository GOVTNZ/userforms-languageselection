<?php

class EditableLanguageDropdownField extends EditableFormField {

    private static $singular_name = 'Language Dropdown';

    private static $plural_name = 'Language Dropdowns';

    /**
     * @return FieldList
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->removeByName('Default');

        return $fields;
    }

    public function getFormField()
    {
        $field = LanguageDropdownField::create(
            $this->Name,
            $this->EscapedTitle)
            ->setFieldHolderTemplate('UserFormsField_holder')
            ->setTemplate('UserFormsDropdownField');

        $this->doUpdateFormField($field);

        return $field;
    }

    public function getValueFromData($data)
    {
        if (isset($data[$this->Name])) {
            $source = $this->getFormField()->getSource();
            return $source[$data[$this->Name]];
        }
    }

    public function getIcon()
    {
        return USERFORMS_DIR . '/images/editabledropdown.png';
    }

    public function getSelectorField(EditableCustomRule $rule, $forOnLoad = false)
    {
        return "$(\"select[name='{$this->Name}']\")";
    }

}
