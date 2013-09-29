<?php

function link_to_pager_sort($label, $route, $pager, $sortField)
{
  if (! $sortField)
  {
    return link_to($label, $route);
  }
  
  if ($pager->getSortField() == $sortField)
  {
    $asc = ($pager->getSortOrder() == 'asc');
    
    $order = ($asc) ? 'desc' : 'asc';
    $arrow = ($asc) ?  '▲' : '▼';
  }
  else
  {
    $order = 'asc';
    $arrow = '';
  }
  
  return link_to($label . " " . $arrow, $route.'?page='.$pager->getPage().'&sort_field='.$sortField.'&sort_order='.$order);
}

