<?php

/**
 * ClaimerMail form.
 *
 * @package    claimer
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ClaimerMailManagedUsersForm extends ClaimerMailForm
{
  public function configure()
  {
    $user = $this->getOption('user');
    
    if (! $user instanceof sfUser)
    {
      throw new sfException("The user must be defined.");
    }
    
    if (! $user->getGuardUser()->hasManagedUsers())
    {
      throw new sfException("The user has no managed user.");
    }
    
    $this->useFields(array('subject', 'message'));
  }
  
  protected function doSave($con = null)
  {
    // sender
    $user = $this->getOption('user');
    $this->getObject()->setSender($user->getGuardUser());
    
    $recipientsLabel = 'Managed claimants';
    $this->getObject()->setRecipientsLabel($recipientsLabel);
    
    $recipients = $user->getGuardUser()->getManagedUsersQuery()
                                       ->select('u.email_address')
                                       ->execute();
    $this->getObject()->setRecipients($recipients);
    
    if ($this->getObject()->hasRecipients())
    {
      parent::doSave($con);
    }
  }  
}
