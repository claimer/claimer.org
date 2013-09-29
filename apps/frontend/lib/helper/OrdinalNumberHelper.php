<?php

function ordinalNumber($number)
{
  switch($number)
  {
    case 1:
      return $number.'st';
    case 2:
      return $number.'nd';
    case 3:
      return $number.'rd';
    default:
      return $number.'th';
  }
}
