<?php

class ClaimerMovableobjectDocumentsForm extends ClaimerDocumentsForm
{
  protected static $labels = array(
    'before'        => 'If possible, please upload photos of the object before it was damaged',
    'otherdocs'     => 'If possible, please upload other documents relating to your object (purchase contract or invoice, insurance documents, etc.)',
    'owner'         => 'If possible, please upload the document(s) proving you are the owner',
    'value'         => 'If possible, please upload documents indicating the value before it was damaged (appraisals, adverts for similar objects, etc.)',
    'after'         => 'If possible, please upload photos of the object after it was damaged',
    'aboutdamage'   => 'If possible, please upload other documents about the damage (insurance letters, repair bills, etc.)');
  
  public function configure()
  {
    parent::configure();
    
    parent::generateDocumentsTypes($this::$labels);
  }
}
