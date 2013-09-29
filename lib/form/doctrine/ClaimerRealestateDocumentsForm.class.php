<?php

class ClaimerRealestateDocumentsForm extends ClaimerDocumentsForm
{
  protected static $labels = array(
    'before'      => 'If possible, please upload photos of your real estate property before it was damaged',
    'otherdocs'   => 'If possible, please upload other documents relating to your real estate property (maps, insurance, documents, etc.)',
    'owner'       => 'If possible, please upload the document(s) proving you are the owner',
    'value'       => 'If possible, please upload documents indicating the value (expertices, adverts of similar properties, etc.)',
    'after'       => 'If possible, please upload photos of your real estate property after it was damaged',
    'aboutdamage' => 'If possible, please upload other documents about the damage (insurance letters, repair bills, etc.)',
    'googleearth' => 'If possible, please upload an image of Google Earth showing your real estate property');
  
  public function configure()
  {
    parent::configure();
    
    parent::generateDocumentsTypes($this::$labels);
  }
}
