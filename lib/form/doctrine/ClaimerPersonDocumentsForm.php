<?php

class ClaimerPersonDocumentsForm extends ClaimerDocumentsForm
{
  protected static $labels = array(
    'before'      => 'If possible, please upload documents that prove your family relationship',
    'owner'       => 'If possible, please upload the document(s) proving the death',
    'otherdocs'   => 'If possible, please upload documents proving the medical treatment of this person (medical documents, hospital bills, etc.)',
    'value'       => 'If possible, please upload documents or photos of the funeral',
    'after'       => 'If possible, please upload other documents in relation to the loss of this person and the money that was lost due o his or her death (e.g. your pay slips if you could not work during some time, the deceased person\' payslips if he/she could not work before dying)');
  
  public function configure()
  {
    parent::configure();
    
    parent::generateDocumentsTypes($this::$labels);
  }
}
