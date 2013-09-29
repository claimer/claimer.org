<?php

abstract class filterAndSortActions extends sfActions
{
  protected function applyFilters($sessionAttribute, sfWebRequest $request)
  {
    if (! $sessionAttribute || ! isset($this->form))
    {
      return;
    }
    
    // post filters
    if ($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT))
    {
      // reset session
      if ($request->hasParameter('reset'))
      {
        $this->getUser()->getAttributeHolder()->remove($sessionAttribute);
        $toBind = null;
      }
      else
      { 
        $toBind = $request->getParameter($this->form->getName());
      }
    }
    // session filters
    else
    {
      $toBind = $this->getUser()->getAttribute($sessionAttribute, null);
    }
    
    if ($toBind !== null)
    {
      $this->form->bind($toBind);
      
      if ($this->form->isValid())
      {
        $this->getUser()->setAttribute($sessionAttribute, $toBind);
      }
    }
  }
  
  protected function applySort($sessionAttribute, sfWebRequest $request)
  {
    if (! $sessionAttribute || ! isset($this->pager))
    {
      return;
    }
    
    // reset sort 
    if (($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT)) &&
        $request->hasParameter('reset'))
    {
      $this->getUser()->getAttributeHolder()->remove($sessionAttribute);
      $sort = null;
    }
    // request sort
    elseif ($request->hasParameter('sort_field') &&
            $request->hasParameter('sort_order'))
    { 
      $sort = array('field' => $request->getParameter('sort_field'),
                    'order' => $request->getParameter('sort_order'));
    }
    // session sort 
    else
    {
      $sort = $this->getUser()->getAttribute($sessionAttribute, null);
    }
    
    if ($sort !== null && $this->pager->bindSort($sort))
    {
      $this->pager->applySort();
      $this->getUser()->setAttribute($sessionAttribute, $sort);
    }
  }
}
