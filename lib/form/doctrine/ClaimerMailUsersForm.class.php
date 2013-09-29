<?php

/**
 * ClaimerMail form.
 *
 * @package    claimer
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ClaimerMailUsersForm extends ClaimerMailForm
{
  public function configure()
  {
    $user = $this->getOption('user');
    
    if (! $user instanceof sfUser)
    {
      throw new sfException("The user must be defined.");
    }
    
    $q = $this->getAvailableGroupsQuery($user);
    
    if ($q === null)
    {
      throw new sfException("The user can't send mail to any group");
    }
    
    $this->widgetSchema['groups_list'] = new sfWidgetFormDoctrineChoice(
      array('multiple' => true,
            'model' => 'sfGuardGroup',
            'query' => $q));
    
    $this->validatorSchema['groups_list'] = new sfValidatorDoctrineChoice(
      array('multiple' => true,
            'model' => 'sfGuardGroup',
            'required' => true,
            'query' => $q));
    
    $this->widgetSchema->setLabels(array('groups_list' => 'Groups'));
    
    $this->useFields(array('subject', 'message', 'groups_list'));
  }
  
  protected function doSave($con = null)
  {
    $values = $this->getValues();
    
    // sender
    $user = $this->getOption('user');
    $this->getObject()->setSender($user->getGuardUser());
    
    // groups
    $groups = Doctrine_Core::getTable('sfGuardGroup')->getGroupsNameByIdIn($values['groups_list']);
    
    $recipientsLabel = implode(', ', $groups);
    $this->getObject()->setRecipientsLabel($recipientsLabel);

    $recipients = Doctrine_Core::getTable('sfGuardUser')->getUsersInGroupsQuery($groups)
                                                        ->select('u.email_address')
                                                        ->execute();
    $this->getObject()->setRecipients($recipients);
    
    if ($this->getObject()->hasRecipients())
    {
      parent::doSave($con);
    }
  }  

  protected function getAvailableGroupsQuery(sfUser $user)
  {
    if ($user->hasCredential('administer_any_user'))
    {
      return Doctrine_Core::getTable('sfGuardGroup')->getGroupsQuery();
    }
    elseif ($user->hasCredential('administer_granted_user'))
    {
      return Doctrine_Core::getTable('sfGuardGroup')->getGroupsInQuery($user->getGrantedGroups());
    }
    
    return null;
  }
}
