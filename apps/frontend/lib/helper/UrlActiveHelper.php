<?php

function link_to_active($label, $route, $options = array())
{
  $routeName = (is_array($route) && isset($route['sf_route'])) ? $route['sf_route'] : $route;
  
  if ($routeName &&
      sfContext::hasInstance() &&
      sfContext::getInstance()->getRouting()->getCurrentRouteName() == str_replace('@', '', $routeName))
  {
    $options['class'] = 'active';
  }
  
  return link_to($label, $route, $options);
}
