<?php

class ClaimerDamagePager extends DoctrineSortPager
{
  protected function configureSort()
  {
    $this->addSortFields(array('code', 'type', 'cause', 'value', 'when', 'where'));
    
    if ($this->hasSortOption('manager'))
    {
      $this->addSortFields(array('manager'));
    }

    if ($this->hasSortOption('claimant'))
    {
      $this->addSortFields(array('claimant'));
    }
    
    $this->setDefaultSort(array('field' => 'when', 'order' => 'desc'));
  }
  
  protected function orderByCodeQuery(Doctrine_Query $q, $field, $order)
  {
    $q->orderBy($q->getRootAlias().'.validationcode '.$order);
  }
  
  protected function orderByManagerQuery(Doctrine_Query $q, $field, $order)
  {
    $q->orderBy('m.username '.$order);
  }
  
  protected function orderByClaimantQuery(Doctrine_Query $q, $field, $order)
  {
    $q->orderBy('c.username '.$order);
  }
  
  protected function orderByTypeQuery(Doctrine_Query $q, $field, $order)
  {
    $q->orderBy('dt.name '.$order);
  }
  
  protected function orderByCauseQuery(Doctrine_Query $q, $field, $order)
  {
    $q->orderBy('dc.name '.$order);
  }
  
  protected function orderByValueQuery(Doctrine_Query $q, $field, $order)
  {
    $q->orderBy('dv.value '.$order);
  }
  
  protected function orderByWhenQuery(Doctrine_Query $q, $field, $order)
  {
    $q->orderBy($q->getRootAlias().'.occurred_at '.$order);
  }
  
  protected function orderByWhereQuery(Doctrine_Query $q, $field, $order)
  {
    $q->orderBy('dw.state '.$order);
  }
}
