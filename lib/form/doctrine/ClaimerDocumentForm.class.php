<?php

/**
 * ClaimerDocument form.
 *
 * @package    claimer
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ClaimerDocumentForm extends BaseClaimerDocumentForm
{
  public function configure()
  {
    $this->setWidget('filename', new sfWidgetFormInputFileEditable(array(
      'file_src' => $this->getObject()->getFilename(),
      'edit_mode' => true,
      'with_delete' => true,
      'template' => $this->getObject()->isNew() ? '%input%' : '%delete% %delete_label%')));
    
    $this->setValidator('filename', new sfValidatorFile(array(
      'required' => false,
      'path' => sfConfig::get('app_claimer_files_damages_dir'),
      'mime_types' => array(
        'image/jpeg',
        'image/pjpeg',
        'image/png',
        'image/x-png',
        'image/gif',
        'image/bmp',
        'image/svg',
        'text/plain',
        'text/rtf',
        'application/pdf',
        'application/msword',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        'application/vnd.oasis.opendocument.text',
        'application/vnd.sun.xml.writer',
        'application/vnd.stardivision.writer'),
      'max_size' => 1024*1024*5)));
    
    $this->setValidator('filename_delete', new sfValidatorBoolean());
    
    $this->widgetSchema->setLabels(array(
      'filename'          => 'File',
      'description'       => 'Description'));
    
    if ($this->getObject()->isNew())
    {
      $this->useFields(array('filename', 'description'));
    }
    else
    {
      $this->useFields(array('filename'));
    }
    
    unset($this['id']);
  }
  
  protected function removeFile($field)
  {
    parent::removeFile($field);
    
    $this->getObject()->delete();
  }
}
