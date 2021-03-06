<?php

/**
 * sfGuardGroupTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class sfGuardGroupTable extends PluginsfGuardGroupTable
{
  /**
   * Returns an instance of this class.
   *
   * @return object sfGuardGroupTable
   */
  public static function getInstance()
  {
      return Doctrine_Core::getTable('sfGuardGroup');
  }
  
  public function getGroupsQuery()
  {
    $q = Doctrine_Core::getTable('sfGuardGroup')->createQuery('g');
    
    return $q;
  }
  
  public function getGroupsInQuery($groups)
  {
    $q = $this->getGroupsQuery()
              ->whereIn('g.name', $groups);
    
    return $q;
  }
  
  public function getGroupsName()
  {
    $q = $this->getGroupsQuery()
              ->select('g.name');
    
    $groups = array();
    
    foreach ($q->execute() as $group)
    {
      $groups[] = $group->getName();
    }

    return $groups;
  }
  
  public function getGroupsNameByIdIn($groupsId)
  {
    $q = $this->getGroupsQuery()
              ->select('g.name')
              ->whereIn('g.id', $groupsId);
    
    $groups = array();
    
    foreach ($q->execute() as $group)
    {
      $groups[] = $group->getName();
    }

    return $groups;
  }
}
