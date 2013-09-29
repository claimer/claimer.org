<?php

class ClaimerClaimantPager extends DoctrineSortPager
{
  protected function configureSort()
  {
    $this->addSortFields(array('username', 'email', 'register_date', 'total_value'));
    
    if ($this->hasSortOption('manager'))
    {
      $this->addSortField('manager');
    }
    
    $this->setDefaultSort(array('field' => 'username', 'order' => 'asc'));
  }
  
  protected function orderByUsernameQuery(Doctrine_Query $q, $field, $order)
  {
    $q->orderBy($q->getRootAlias().'.username '.$order);
  }
  
  protected function orderByManagerQuery(Doctrine_Query $q, $field, $order)
  {
    $q->orderBy('m.username '.$order);
  }
  
  protected function orderByEmailQuery(Doctrine_Query $q, $field, $order)
  {
    $q->orderBy($q->getRootAlias().'.email_address '.$order);
  }
  
  protected function orderByRegisterDateQuery(Doctrine_Query $q, $field, $order)
  {
    $q->orderBy($q->getRootAlias().'.created_at '.$order);
  }
  
  protected function orderByTotalValueQuery(Doctrine_Query $q, $field, $order)
  {
    $q->orderBy('total_value '.$order);
  }
}
