<?php

/**
 * Project form base class.
 *
 * @package    claimer
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormBaseTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
abstract class BaseFormDoctrine extends sfFormDoctrine
{
  public function setup()
  {
  }
  
  public function embedRelation($relationName, $formClass = null, $formArgs = array(), $innerDecorator = null, $decorator = null)
  {
    if ($this->getObject()->$relationName instanceof Doctrine_Record &&
        $this->getObject()->$relationName->isNew())
    {
      $relation = $this->getObject()->getTable()->getRelation($relationName);
      
      if (Doctrine_Relation::ONE == $relation->getType())
      {
        $this->getObject()->set($relationName, $this->getObject()->$relationName);
      }
    }
    
    parent::embedRelation($relationName, $formClass, $formArgs, $innerDecorator, $decorator);
  }
}
