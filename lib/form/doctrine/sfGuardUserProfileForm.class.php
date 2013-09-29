<?php

/**
 * sfGuardUserProfile form.
 *
 * @package    claimer
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfGuardUserProfileForm extends BasesfGuardUserProfileForm
{
  public function configure()
  {
    parent::configure();
    
    $this->embedRelation('Address');
    
    $this->validatorSchema['email_alt'] = new sfValidatorEmail(array(
      'required' => false));
    
    if ($this->getOption('with_manager', false) &&
        $managersQuery = $this->getManagersQuery())
    {
      $this->widgetSchema['manager_id'] = new sfWidgetFormDoctrineChoice(array(
        'model' => 'sfGuardUser',
        'query' => $managersQuery,
        'method' => 'getUsername',
        'order_by' => array('username', 'asc'),
        'add_empty' => true));
      
      $this->validatorSchema['manager_id'] = new sfValidatorDoctrineChoice(array(
        'model' => 'sfGuardUser',
        'query' => $managersQuery,
        'required' => false));
    }
    else
    {
      unset($this['manager_id']);
    }
    
    unset($this['id'],
          $this['sf_guard_user_id'],
          $this['address_id'],
          $this['group_id']);
  }

  protected function getManagersQuery()
  {
    $user = $this->getOption('user');
    
    if (! $user instanceof sfUser)
    {
      return null;
    }
    
    if ($user->hasCredential('administer_any_user'))
    {
      return Doctrine_Core::getTable('sfGuardUser')->getUsersInGroupsQuery(array('registrants'))
                                                   ->andWhere('p.manager_id IS NULL')
                                                   ->select('u.username');
    }
    elseif ($user->hasCredential(array('administer_granted_user', 'grant_registrants_user'), true))
    {
      return Doctrine_Core::getTable('sfGuardUser')->getGrantedUsersInGroupsQuery($user->getGrantedGroups(), array('registrants'))
                                                   ->andWhere('p.manager_id IS NULL')
                                                   ->select('u.username');
    }
    
    return null;
  }
}
