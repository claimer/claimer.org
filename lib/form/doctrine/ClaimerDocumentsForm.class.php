<?php

class ClaimerDocumentsForm extends BaseClaimerDamageForm
{
  protected static $labels = array();
  
  public function configure()
  {
    $this->useFields(array());
    
    unset($this['id']);
  }
  
  public function getDocumentsTypesLabels() {
    return $this::$labels;
  }
  
  protected function generateDocumentsTypes($labels)
  {
    $types = $this->getObject()->getType()->getDocumentsTypes();
    
    foreach ($types as $type)
    {
      $typeForm = new sfForm();
      
      $documents = Doctrine_Core::getTable('ClaimerDocument')->findByDamageAndType($this->getObject()->getId(), $type->getId());
      $nbDocuments = 0;
      
      // Embed existing documents
      foreach ($documents as $index => $document)
      {
        $documentForm = new ClaimerDocumentForm($document);
        $typeForm->embedForm($nbDocuments++, $documentForm);
      }
      
      // 3 empty document form
      for ($i = 0; $i < 3; $i++)
      {
        $document = new ClaimerDocument();
        $document->setDamageId($this->getObject()->getId());
        $document->setDocumentType($type);
        $documentForm = new ClaimerDocumentForm($document);
        $typeForm->embedForm($nbDocuments + $i, $documentForm);
      }
      
      // Embed type form
      $this->embedForm($type->getName(), $typeForm);
    }
  }
  
  public function saveEmbeddedForms($con = null, $forms = null)
  {
    if ($forms === null)
    {
      $forms = $this->embeddedForms;
    }
    
    // don't save empty embedded forms (documents)
    foreach ($forms as $name => $form)
    {
      if ($form instanceof ClaimerDocumentForm)
      {
        $filename = $form->getObject()->getFilename();
        
        if ($form->getObject()->isNew() && empty($filename))
        {
          unset($forms[$name]);
        }
      }
    }
    
    parent::saveEmbeddedForms($con, $forms);
  }
}
