<?php
function _checkArrowClass($data, $name){
  if(!empty($data['t']) && $name == $data['t']){
    if(!empty($data['s']) && $data['s'] == 'asc'){
      return 'fi-arrow-down';
    }else{
      return 'fi-arrow-up';
    }
  }else{
    return 'fi-arrow-down';
  }
}

function _checkArrowValue($data, $name){
  if(!empty($data['t']) && $name == $data['t']){
    if(!empty($data['s']) && $data['s'] == 'asc'){
      return 'desc';
    }else{
      return 'asc';
    }
  }else{
    return 'asc';
  }
}

function _checkTableClass($data, $name){
  if(!empty($data['t']) && $name == $data['t']){
    return 'active';
  }else{
    return '';
  }
}
