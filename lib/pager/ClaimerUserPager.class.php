<?php

class ClaimerUserPager extends DoctrineSortPager
{
  protected function configureSort()
  {
    $this->addSortFields(array('username', 'email', 'register_date', 'manager'));
    
    $this->setDefaultSort(array('field' => 'username', 'order' => 'asc'));
  }
  
  protected function orderByUsernameQuery(Doctrine_Query $q, $field, $order)
  {
    $q->orderBy($q->getRootAlias().'.username '.$order);
  }
  
  protected function orderByEmailQuery(Doctrine_Query $q, $field, $order)
  {
    $q->orderBy($q->getRootAlias().'.email_address '.$order);
  }
  
  protected function orderByRegisterDateQuery(Doctrine_Query $q, $field, $order)
  {
    $q->orderBy($q->getRootAlias().'.created_at '.$order);
  }
  
  protected function orderByManagerQuery(Doctrine_Query $q, $field, $order)
  {
    $q->orderBy('r.username '.$order);
  }
}
