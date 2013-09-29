<?php

class ContactForm extends sfForm
{
  protected static $genders = array('Mr', 'Ms');
  
  public function configure()
  {	
    $this->setWidgets(array(
      'subject'   => new sfWidgetFormInput(),
      'gender'    => new sfWidgetFormChoice(array('choices' => self::$genders)),
      'name'      => new sfWidgetFormInput(),
      'email'     => new sfWidgetFormInput(),
      'message'   => new sfWidgetFormTextarea(),
      'captcha'   => new sfWidgetFormReCaptcha(array('public_key' => sfConfig::get('app_recaptcha_public_key')))));
    
    $this->setValidatorSchema(new sfValidatorSchema(array(
      'email'     => new sfValidatorEmail(array(), array('required' => 'E-mail is required')),
      'gender'    => new sfValidatorChoice(array('choices' => array_keys(self::$genders))),
      'name'      => new sfValidatorString(array('min_length' => 4)),
      'subject'   => new sfValidatorString(array('min_length' => 4)),
      'message'   => new sfValidatorString(array('min_length' => 4), array('required' => 'Message is required')))));
    
    $this->validatorSchema['captcha'] = new sfValidatorReCaptcha(array('private_key' => sfConfig::get('app_recaptcha_private_key')));
    
    $this->widgetSchema->setNameFormat('contact[%s]');
  }
}
