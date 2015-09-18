<?php
function _showAlert($data, $type){
  $template = '';
  if(is_array($data) || is_object($data)){
    if (count($data) > 0){
      $template .= '<div class="alert alert-'.$type.'"><ul>';
        if(!empty($data->all())){
          foreach ($data->all() as $key => $value) {
            $template .= '<li>'.$value.'</li>';
          }
        }else{
          foreach ($data as $key => $value) {
            $template .= '<li>'.$value.'</li>';
          }
        }
      $template .= '</ul></div>';
    }
  }else{
    $template .= '<div class="alert alert-'.$type.'"><p>'.$data.'</p></div>';
  }
  return $template;
}
