<?php

class DoctrineSortPager extends sfDoctrinePager
{
  protected $sortFields = array();
  protected $sort = null;
  protected $sortOptions = null;
  
  public function init()
  {
    parent::init();
    $this->configureSort();
    $this->applySort();
  }
  
  protected function configureSort()
  {
    return;
  }
  
  public function setSortOptions(array $options)
  {
    $this->sortOptions = $options;
  }
  
  protected function hasSortOption($option)
  {
    if (! $option || $this->sortOptions === null || ! isset($this->sortOptions[$option]) || ! $this->sortOptions[$option])
    {
      return false;
    }

    return true;
  }
  
  public function hasSort()
  {
    return $this->sort !== null;
  }
  
  public function countFields()
  {
    return count($this->sortFields);
  }
  
  public function hasSortField($field)
  {
    if (! $field || $this->sortFields === null)
    {
      return false;
    }
    
    return in_array($field, $this->sortFields);
  }
  
  public function getSortField()
  {
    if (! $this->hasSort())
    {
      return null;
    }
    
    return $this->sort['field'];
  }
  
  public function getSortOrder()
  {
    if (! $this->hasSort())
    {
      return null;
    }
    
    return $this->sort['order'];
  }
  
  protected function addSortFields(array $fields)
  {
    foreach($fields as $field)
    {
      $this->addSortField($field);
    }
  }
  
  protected function addSortField($field)
  {
    if ($field)
    {
      $this->sortFields[] = $field;
    }
  }
  
  public function bindSort(array $sort)
  {
    if (empty($sort) || ! isset($sort['field']) || ! isset($sort['order']))
    {
      return false;
    }
    
    $field = trim($sort['field']);
    $order = trim($sort['order']);
    
    if (! $this->hasSortField($field))
    {
      return false;
    }
    
    if (! in_array($order, array('asc', 'desc')))
    {
      return false;
    }
    
    $this->sort = array('field' => $field, 'order' => $order);

    return true;
  }
  
  public function setDefaultSort(array $sort)
  {
    $this->bindSort($sort);
  }
  
  public function applySort()
  {
    if (! $this->hasSort())
    {
      return;
    }
    
    if (method_exists($this, $method = sprintf("orderBy%sQuery", sfInflector::camelize($this->sort['field']))))
    {
      $this->$method($this->getQuery(), $this->sort['field'], $this->sort['order']);
    }
  }
}
