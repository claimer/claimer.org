<?php

/**
 * ClaimerMail form.
 *
 * @package    claimer
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ClaimerMailForm extends BaseClaimerMailForm
{
  public function configure()
  {
    $this->useFields(array('subject', 'message'));
  }
}