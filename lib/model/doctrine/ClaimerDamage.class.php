<?php

/**
 * ClaimerDamage
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    claimer
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class ClaimerDamage extends BaseClaimerDamage
{
  public function init(sfGuardUser $claimant, sfGuardUser $user = null)
  {
    if ($user === null)
    {
      $user = $claimant;
    }
    
    if ($this->isNew())
    {
      $this->setClaimant($claimant);
      $this->setCreatedBy($user);
      $this->loadImportance();
    }
    else
    {
      $this->setUpdatedBy($user);
    }
    
    return $this;
  }
  
  public function preSave($event)
  {
    if ($this->isNew())
    {
      if (! $this->relatedExists('Claimant'))
      {
        throw new sfException("The claimant must be defined.");
      }
      
      if (! $this->relatedExists('CreatedBy'))
      {
        throw new sfException("The created by user must be defined.");
      }
      
      if (! $this->relatedExists('UpdatedBy'))
      {
        $this->setUpdatedBy($this->getCreatedBy());
      }
      
      if (! $this->relatedExists('Type'))
      {
        throw new sfException("The damage type must be defined.");
      }
      
      if (! $this->relatedExists('Cause'))
      {
        throw new sfException("The damage cause must be defined.");
      }
      
      if (! isset($this->Value))
      {
        $value = new ClaimerValue();
        $value->save();
        $this->setValue($value);
      }
      
      if (! isset($this->importance))
      {
        $this->loadImportance();
      }
      elseif ($this->getImportance() <= 0)
      {
        throw new sfException("The damage importance must be positive.");
      }
      
      $this->setValidationcode($this->generateValidationcode());
    }
    
    if ($this->getCause()->getType() != "other")
    {
      $this->setCauseOther(null);
    }
  }

  public function postSave($event)
  {
    if ($this->getType()->getHasDocuments())
    {
      foreach ($this->Documents as $index => $document)
      {
        if (! $document->getFilename())
        {
          $document->delete();
          $this->Documents->remove($index);
        }
      }
    }
  }
  
  public function preDelete($event)
  {
    if ($this->getType()->getHasCoowners())
    {
      $this->getCoowners()->delete();
    }
    
    $this->getDetails()->delete();
  }
  
  public function postDelete($event)
  {
    Doctrine_Core::getTable('ClaimerDamage')->updateImportanceSortByClaimant($this->getImportance(), $this->getClaimant()->getId());
  }
  
  protected function loadImportance()
  {
    if ($this->isNew())
    {
      $nb_damages = Doctrine_Core::getTable('ClaimerDamage')->getNbDamagesByClaimant($this->getClaimant()->getId());
      $this->setImportance($nb_damages + 1);
    }
  }

  protected function generateValidationcode()
  {
    if ($this->isNew())
    {
      $managerCode = $this->getClaimant()->hasManager() ? $this->getClaimant()->getManager()->getId() : '000';
      $nbDamagesType = Doctrine_Core::getTable('ClaimerDamage')->getNbCreatedDamagesByClaimantAndType($this->getClaimantId(), $this->getTypeId()) + 1;
      
      $validationCode = $managerCode . '-'
                      . $this->getClaimantId() . '-'
                      . $this->getImportance() . '-'
                      . strtoupper(substr($this->getType(), 0, 1)) . '-'
                      . $nbDamagesType;
      
      return $validationCode;
    }
    
    return $this->getValidationcode();
  }
  
  public function getDetails()
  {
    if (! $this->relatedExists('Type'))
    {
      throw new sfException("The damage type must be defined.");
    }
     
    if (! Doctrine_Core::getTable($this->getType()->getTblName()))
    {
      throw new sfDatabaseException(sprintf("The damage type %s table does not exist.", $this->getType()->getTblName()));
    }
    
    if ($this->isNew() || ! $details = Doctrine_Core::getTable($this->getType()->getTblName())->findOneByDamage($this->getId()))
    {
      $detailsClass = $this->getDetailsClassName();
      $details = new $detailsClass();
      
      $details->setDamage($this);
    }
    
    return $details;
  }
  
  protected function getClassFromType($suffix='')
  {
    $className = $this->getType()->getTblName() . $suffix;
    
    if(preg_match('/^\w+$/', $className) && class_exists($className))
    {
      return $className;
    }
    
    throw new sfException(sprintf("The %s class does not exist.", $className));
  }
  
  public function getDetailsClassName()
  {
    if (! $this->relatedExists('Type'))
    {
      throw new sfException("The damage type must be defined.");
    }
    
    return $this->getClassFromType();
  }
  
  public function getDetailsFormClassName()
  {
    if (! $this->relatedExists('Type'))
    {
      throw new sfException("The damage type must be defined.");
    }
    
    return $this->getClassFromType('Form');
  }
  
  public function getDetailsDocumentsFormClassName()
  {
    if (! $this->relatedExists('Type'))
    {
      throw new sfException("The damage type must be defined.");
    }
    
    if (! $this->getType()->getHasDocuments())
    {
      throw new sfException("This damage can not have documents.");
    }
    
    return $this->getClassFromType('DocumentsForm');
  }
  
  public function hasCoowners()
  {
    if (! $this->relatedExists('Type'))
    {
      return false;
    }
    
    if (! $this->getType()->getHasCoowners())
    {
      return false;
    }
    
    return ($this->getCoowners()->count() > 0);
  }
  
  public function newCoowner()
  {
    if (! $this->relatedExists('Type'))
    {
      throw new sfException("The damage type must be defined.");
    }
    
    if (! $this->getType()->getHasCoowners())
    {
      throw new sfException("This damage type can not have coowners.");
    }
    
    $coowner = new ClaimerCoowner();
    $coowner->setDamage($this);
    $this->getCoowners()->add($coowner);
    
    return $coowner;
  }

  public function deleteCoowner($coownerCode)
  {
    if (! $this->relatedExists('Type'))
    {
      throw new sfException("The damage type must be defined.");
    }
    
    if (! $this->getType()->getHasCoowners())
    {
      throw new sfException("This damage type can't have coowners.");
    }
    
    foreach ($this->Coowners as $index => $coowner)
    {
      if ($coowner->getCoownercode() == $coownerCode)
      { 
        $coowner->delete();
        $this->Coowners->remove($index);
        
        return true;
      }
    }

    return false;
  }
  
  public function hasDocuments()
  {
    if (! $this->relatedExists('Type'))
    {
      return false;
    }
    
    if (! $this->getType()->getHasDocuments())
    {
      return false;
    }
    
    return ($this->getDocuments()->count() > 0);
  }
}
