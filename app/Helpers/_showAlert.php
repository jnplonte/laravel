<?php
function _showAlert($data, $type){
  $template = '';
  if(!empty($data)){
    if(is_array($data) || is_object($data)){
      if (count($data) > 0){
        $template .= '<div data-alert class="alert-box '.$type.'"><ul>';
          if(!empty($data->all())){
            foreach ($data->all() as $key => $value) {
              $template .= '<li><span>'.$value.'</span></li>';
            }
          }else{
            foreach ($data as $key => $value) {
              $template .= '<li><span>'.$value.'</span></li>';
            }
          }
        $template .= '</ul><a href="#" class="close">&times;</a></div>';
      }
    }else{
      $template .= '<div data-alert class="alert-box '.$type.'"><span>'.$data.'</span><a href="#" class="close">&times;</a></div>';
    }
  }
  return $template;
}
