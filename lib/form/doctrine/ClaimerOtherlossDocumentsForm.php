<?php

class ClaimerOtherlossDocumentsForm extends ClaimerDocumentsForm
{
  protected static $labels = array(
    'before' => 'Do you wish to upload a document proving the described loss? Please explain under "description" what the uploaded document can prove');
  
  public function configure()
  {
    parent::configure();
    
    parent::generateDocumentsTypes($this::$labels);
  }
}
