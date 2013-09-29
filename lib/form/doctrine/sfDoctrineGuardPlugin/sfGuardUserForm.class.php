<?php

/**
 * sfGuardUser form.
 *
 * @package    claimer
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrinePluginFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfGuardUserForm extends PluginsfGuardUserForm
{
  public function configure()
  {
    $this->widgetSchema['password'] = new sfWidgetFormInputPassword();
    $this->widgetSchema['password_confirmation'] = new sfWidgetFormInputPassword();
    
    $this->validatorSchema['username'] = new sfValidatorAnd(array(
      new sfValidatorString(array(
        'max_length' => 128,
        'required' => $this->getObject()->isNew())),
      new sfValidatorRegex(array(
        'pattern' => '/^\w+$/'))));
    
    $this->validatorSchema['password'] = new sfValidatorString(
      array(
        'min_length' => 8,
        'max_length' => 128,
        'required' => $this->getObject()->isNew()),
      array(
        'min_length' => '(%min_length% characters min).',
        'max_length' => '(%max_length% characters max).'));
    
    $this->validatorSchema['password_confirmation'] = clone $this->validatorSchema['password'];
    
    $this->validatorSchema['email_address'] = new sfValidatorEmail(array(
      'required' => $this->getObject()->isNew()));

    $this->mergePostValidator(new sfValidatorSchemaCompare(
      'password',
      sfValidatorSchemaCompare::EQUAL,
      'password_confirmation'),
      array(),
      array('invalid' => 'Please verify your password.'));
    
    $withActive = false;
    $withGroups = false;
    
    if ($user = $this->getOption('user'))
    {
      if (! $user instanceof sfUser)
      {
        throw new sfException("The user is invalid.");
      }
      
      if ($user->getGuardUser() !== $this->getObject())
      {
        // is_active
        $withActive = true;
        
        // groups
        if ($q = $this->getAvailableGroupsQuery($user))
        {
          $withGroups = true;
          
          $this->widgetSchema['groups_list'] = new sfWidgetFormDoctrineChoice(
            array('multiple' => true,
                  'model' => 'sfGuardGroup',
                  'query' => $q));
          
          $this->validatorSchema['groups_list'] = new sfValidatorAnd(array(
            new sfValidatorDoctrineChoice(array('multiple' => true,
                                                'model' => 'sfGuardGroup',
                                                'required' => false,
                                                'query' => $q)),
            new ClaimerValidatorUserGroups(array('user' => $this->getObject()))));
          
          $this->widgetSchema->setLabels(array('groups_list' => 'Groups'));
        }
      }
    }
    
    if (! $withActive)
    {
      unset($this['is_active']);
    }
    
    if (! $withGroups)
    {
      unset($this['groups_list']);
    }
    
    $profile = new sfGuardUserProfileForm($this->getObject()->getProfile(),
                                          array('user' => $this->getOption('user'),
                                                'with_manager' => $this->getObject()->isClaimant()));
    
    $this->embedForm('Profile', $profile);
    
    if (! $this->isNew())
    {
      unset($this['username']);
    }
    
    unset($this['is_super_admin'],
          $this['permissions_list'],
          $this['last_login'],
          $this['created_at'],
          $this['updated_at'],
          $this['salt'],
          $this['algorithm']);
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
