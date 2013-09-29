<?php

class ClaimerValidationCodeAuthForm extends BaseForm
{
  public function setup()
  {
    $this->setWidgets(array(
      'validationcode' => new sfWidgetFormInputText(),
      'password' => new sfWidgetFormInputPassword()));
    
    $this->setValidators(array(
      'validationcode' => new sfValidatorString(array('max_length' => 255, 'required' => true)),
      'password' => new SfValidatorString(array('required' => true))));
    
    $this->validatorSchema->setPostValidator(new ClaimerValidatorValidationCodeAuth());
    
    $this->widgetSchema->setNameFormat('validation_code[%s]');
  }

  public function getObject()
  {
    if ($this->isValid())
    {
        return $this->getValue('damage');
    }
    
    return null;
  }
}
