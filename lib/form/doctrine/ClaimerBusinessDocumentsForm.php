<?php

class ClaimerBusinessDocumentsForm extends ClaimerDocumentsForm
{
  protected static $labels = array(
    'before'        => 'If possible, please upload photos of the business before it was damaged',
    'otherdocs'     => 'If possible, please upload other documents on your business (contracts, invoices, insurance documents, etc.)',
    'owner'         => 'If possible, please upload the document(s) proving you are the owner',
    'value'         => 'If possible, please upload documents indicating the purchase value of your business before it was damaged (appraisals, adverts for similar businesses for sale, etc.)',
    'after'         => 'If possible, please upload photos of your business after it was damaged',
    'aboutdamage'   => 'If possible, please upload other documents about the damage (insurance letters, repair bills, etc.)');
  
  public function configure()
  {
    parent::configure();
    
    parent::generateDocumentsTypes($this::$labels);
  }
}
