<?php

/**
 * ClaimerDamageTypeTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class ClaimerDamageTypeTable extends Doctrine_Table
{
  /**
   * Returns an instance of this class.
   *
   * @return object ClaimerDamageTypeTable
   */
  public static function getInstance()
  {
    return Doctrine_Core::getTable('ClaimerDamageType');
  }

  public function getDamageTypes()
  {
    return $this->createQuery()
                ->execute();
  }
}
