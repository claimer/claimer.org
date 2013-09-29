<?php

/**
 * ClaimerDamage form.
 *
 * @package    claimer
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ClaimerDamageForm extends BaseClaimerDamageForm
{
  protected $steps = array();
  protected $currentStep = 0;
  
  public function configure()
  {
    if (! $this->getOption('user') instanceof sfUser)
    {
      throw new sfException("The user is invalid.");
    }
    
    $this->configureSteps();
    
    switch ($this->getCurrentStep())
    {
      case 1:
        $stepForm = new ClaimerDamageDefineForm($this->getObject());
        break;
      case 2:
        $formClass = $this->getObject()->getDetailsFormClassName();
        $stepForm = new $formClass($this->getObject()->getDetails());
        break;
      case 3:
        $stepForm = new ClaimerCoownersForm($this->getObject());
        break;
      case 4:
        $formClass = $this->getObject()->getDetailsDocumentsFormClassName();
        $stepForm = new $formClass($this->getObject());
        break;
      case 5:
        $stepForm = new ClaimerDamageConfirmForm($this->getObject());
        break;
      default:
        throw new sfException("The step is invalid.");
    }
    
    $this->getOption('user')->setFormCurrentStep($this->getFormId(), $this->getCurrentStep());
    
    $this->embedForm($this->getCurrentStepName(), $stepForm);
    
    $this->useFields(array($this->getCurrentStepName()));
    
    unset($this['id']);
  }

  protected function configureSteps()
  {
    $this->steps = array(
      1 => 'step1_type',
      2 => 'step2_details',
      3 => 'step2_coowners',
      4 => 'step2_documents',
      5 => 'step3_confirm');

    if ($this->getObject()->isNew())
    {
      $this->currentStep = 1;
    }
    else
    {
      $step = $this->getOption('user')->getFormCurrentStep($this->getFormId());
      
      if (! array_key_exists($step, $this->steps))
      {
        throw new sfException("Invalid form step.");
      }
      
      $this->currentStep = $step;
    }
  }
  
  protected function getFormId()
  {
    return 'form_current_step_'.$this->getName().'_'.md5($this->getObject()->getValidationcode());
  }
  
  public function getCurrentStep()
  {
    return $this->currentStep;
  }
  
  public function getCurrentStepName()
  {
    return $this->steps[$this->getCurrentStep()];
  }
  
  protected function getMinStep()
  {
    reset($this->steps);
    return key($this->steps);
  }
  
  protected function getMaxStep()
  {
    end($this->steps);
    return key($this->steps);
  }
  
  public function prevStep()
  {
    if ($this->currentStep > $this->getMinStep())
    {
      $this->currentStep--;
    }
    
    if ($this->currentStep == 4 &&
        ! $this->getObject()->getType()->getHasDocuments())
    {
      $this->currentStep--;
    }
    
    if ($this->currentStep == 3 &&
        ! $this->getObject()->hasCoowners())
    {
      $this->currentStep--;
    }
    
    $this->getOption('user')->setFormCurrentStep($this->getFormId(), $this->currentStep);
  }
  
  public function nextStep()
  {
    $values = $this->getValue($this->getCurrentStepName());
    
    if ($this->currentStep < $this->getMaxStep())
    {
      $this->currentStep++;
    }
    
    if ($this->currentStep == 3 &&
        (! $this->getObject()->getType()->getHasCoowners() ||
         ! isset($values['coowners']) ||
         $values['coowners'] != 0))
    {
      $this->currentStep++;
    }
    
    if ($this->currentStep == 4 && ! $this->getObject()->getType()->getHasDocuments())
    {
      $this->currentStep++;
    }
    
    $this->getOption('user')->setFormCurrentStep($this->getFormId(), $this->currentStep);
  }
  
  protected function doSave($con = null)
  {
    $user = $this->getOption('user');
    
    $this->getObject()->setUpdatedBy($user->getGuardUser());
    
    if (! $this->embeddedForms[$this->getCurrentStepName()] instanceof BaseClaimerDamageForm)
    {
      $this->getObject()->state('DIRTY');
    }
    
    if ($this->getCurrentStep() == 2)
    {
      if (isset($this->values[$this->getCurrentStepName()]['description']) &&
          $this->values[$this->getCurrentStepName()]['description'])
      {
        $this->getObject()->setDescription($this->values[$this->getCurrentStepName()]['description']);
      }
    }
    
    if ($this->getCurrentStep() == 3 &&
        $this->values[$this->getCurrentStepName()]['new_coowner'] == 1)
    {
      $coowner = $this->getObject()->newCoowner();
    }
    
    parent::doSave($con);
    
    if ($this->getCurrentStep() == 3 &&
        $this->values[$this->getCurrentStepName()]['delete_coowner'] > 0)
    {
      $this->getObject()->deleteCoowner($this->values[$this->getCurrentStepName()]['delete_coowner']);
    }
  }
}
