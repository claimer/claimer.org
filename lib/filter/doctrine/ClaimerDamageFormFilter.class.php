<?php

/**
 * ClaimerDamage filter form.
 *
 * @package    claimer
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ClaimerDamageFormFilter extends BaseClaimerDamageFormFilter
{
  public function configure()
  {
    if (! $this->getOption('user') instanceof sfUser)
    {
      throw new sfInitializationException("The user must be defined.");
    }

    $user = $this->getOption('user');
    
    if (! $defaultCurrency = Doctrine_Core::getTable('ClaimerCurrency')->getByCode())
    {
      throw new sfException("The default currency does not exist.");
    }
    
    $this->widgetSchema['Value'] = new genExtraWidgetFormNumberRange(array(
      'from_number' => new sfWidgetFormInput(array(), array('size' => 5)),
      'to_number'   => new sfWidgetFormInput(array(), array('size' => 5)),
      'template'    => strtr('from %from_number% to %to_number% %currency%',
        array('%currency%' => $defaultCurrency->getCode()))));
    
    $this->validatorSchema['Value'] = new genExtraValidatorNumberRange(array(
      'required'     => false,
      'from_number'  => new sfValidatorNumber(array('required' => false)),
      'to_number'    => new sfValidatorNumber(array('required' => false))));

    $years = range(date('Y'), sfConfig::get('app_claimer_start_date', 1970));
    $years = array_combine($years, $years);
    
    $this->widgetSchema['occurred_at'] = new sfWidgetFormFilterDate(array(
      'from_date' => new sfWidgetFormDate(array('years'=> $years)),
      'to_date' => new sfWidgetFormDate(array('years'=> $years)),
      'with_empty' => false));
    
    $this->widgetSchema['Where'] = new sfWidgetFormI18nChoiceCountry(array('add_empty' => TRUE));
    $this->validatorSchema['Where'] = new sfValidatorI18nChoiceCountry(array('required' => FALSE));
    
    if ($managersQuery = $this->getManagersQuery($user))
    {
      $this->widgetSchema['manager'] = new sfWidgetFormDoctrineChoice(array(
        'label'     => 'Registrant',
        'model'     => 'sfGuardUser',
        'query'     => $managersQuery,
        'method'    => 'getUsername',
        'order_by'  => array('username', 'asc'),
        'add_empty' => true));
      
      $this->validatorSchema['manager'] = new sfValidatorDoctrineChoice(array(
        'required'  => false,
        'model'     => 'sfGuardUser',
        'query'     => $managersQuery));
    }
    
    if ($claimantsQuery = $this->getClaimantsQuery($user))
    {
      $this->widgetSchema['claimant'] = new sfWidgetFormDoctrineChoice(array(
        'model'     => 'sfGuardUser',
        'query'     => $claimantsQuery,
        'method'    => 'getUsername',
        'order_by'  => array('username', 'asc'),
        'add_empty' => true));
      
      $this->validatorSchema['claimant'] = new sfValidatorDoctrineChoice(array(
        'required'  => false,
        'model'     => 'sfGuardUser',
        'query'     => $claimantsQuery));
    }
    
    $this->widgetSchema->setLabels(array(
      'occurred_at' => 'When',
      'created_at'  => 'Register date',
      'updated_at'  => 'Update date'));
    
    $fields = array();
    
    if ($managersQuery !== null &&
        $user->hasCredential(array('filter_damages_by_any', 'filter_damages_by_manager'), false))
    {
      $fields[] = 'manager';
    }
    
    if($claimantsQuery !== null &&
       $user->hasCredential(array('filter_damages_by_any', 'filter_damages_by_claimant'), false))
    {
      $fields[] = 'claimant';
    }
    
    $this->useFields(array_merge($fields, array('type_id', 'cause_id', 'Value', 'Where', 'occurred_at', 'created_at', 'updated_at')));
  }
  
  protected function getManagersQuery(sfUser $user)
  {
    if ($user->hasCredential('administer_any_user'))
    {
      return Doctrine_Core::getTable('sfGuardUser')->getUsersInGroupsQuery(array('registrants'))
                                                   ->select('u.username');
    }
    
    if ($user->hasCredential(array('administer_granted_user', 'grant_registrants_user'), true))
    {
      return Doctrine_Core::getTable('sfGuardUser')->getGrantedUsersInGroupsQuery($user->getGrantedGroups(), array('registrants'))
                                                   ->select('u.username');
    }

    return null;
  }
  
  protected function getClaimantsQuery(sfUser $user)
  {
    if ($user->hasCredential('administer_any_user'))
    {
      return Doctrine_Core::getTable('sfGuardUser')->getUsersInGroupsQuery(array('claimants'))
                                                   ->select('u.username');
    }
    
    if ($user->hasCredential(array('administer_granted_user', 'grant_claimants_user'), true))
    {
      return Doctrine_Core::getTable('sfGuardUser')->getGrantedUsersInGroupsQuery($user->getGrantedGroups(), array('claimants'))
                                                   ->select('u.username');
    }
    
    if ($user->hasCredential('administer_managed_user') && $user->getGuardUser()->hasManagedUsers())
    {
      return $user->getGuardUser()->getManagedUsersQuery()
                                  ->select('u.username');
    }
    
    return null;
  }
  
  protected function addManagerColumnQuery(Doctrine_Query $q, $field, $value)
  {
    if ($value)
    {
      $q->andWhere('m.id = ?', $value);
    }
  }
  
  protected function addClaimantColumnQuery(Doctrine_Query $q, $field, $value)
  {
    if ($value)
    {
      $q->andWhere('c.id = ?', $value);
    }
  }
  
  protected function addValueColumnQuery(Doctrine_Query $q, $field, $value)
  {
    if ($value['from'] || $value['to'])
    {
      if ($value['from'])
      {
        $q->andWhere('dv.value >= ?', $value['from']);
      }
      
      if ($value['to'])
      {
        $q->andWhere('dv.value <= ?', $value['to']);
      }
    }
  }
  
  protected function addWhereColumnQuery(Doctrine_Query $q, $field, $value)
  {
    $q->andWhere('dw.state = ?', $value);
  }
}
