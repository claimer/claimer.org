<?php

/**
 * ClaimerDocument filter form.
 *
 * @package    claimer
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ClaimerDocumentFormFilter extends BaseClaimerDocumentFormFilter
{
  public function configure()
  {
    $this->useFields('type_id');
  }
}
