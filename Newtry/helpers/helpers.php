<?php
  function display_error($errors){
  $display = '<ul class="bg-danger">';
  foreach($errors as $error){
    $display.='<li class="text-dnager">'.$error.'<li>';
  }
  $display .= '</ul>';
  return $display;
}

function sanitize($dirty){
  return htmlentities($dirty,ENT_QUOTES,"UTF-8");
}
