<?php

class ClaimerMailPager extends DoctrineSortPager
{
  protected function configureSort()
  {
    $this->addSortFields(array('sender', 'subject', 'sent_date'));
    $this->setDefaultSort(array('field' => 'sent_date', 'order' => 'desc'));
  }
  
  protected function orderBySenderQuery(Doctrine_Query $q, $field, $order)
  {
    $q->orderBy('s.username '.$order);
  }
  
  protected function orderBySubjectQuery(Doctrine_Query $q, $field, $order)
  {
    $q->orderBy($q->getRootAlias().'.subject '.$order);
  }
  
  protected function orderBySentDateQuery(Doctrine_Query $q, $field, $order)
  {
    $q->orderBy($q->getRootAlias().'.created_at '.$order);
  }
}
