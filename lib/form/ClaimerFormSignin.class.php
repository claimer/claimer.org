<?php

/**
 * sfGuardFormSignin for sfGuardAuth signin action
 *
 * @package    sfDoctrineGuardPlugin
 * @subpackage form
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfGuardFormSignin.class.php 23536 2009-11-02 21:41:21Z Kris.Wallsmith $
 */
class ClaimerFormSignin extends sfGuardFormSignin
{
  /**
   * @see sfForm
   */
  public function configure()
  {
    $this->widgetSchema['username']->setLabel('Username');
    
    unset($this['remember']);
  }
}
