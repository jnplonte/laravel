<?php
function _getOldData($key, $val){
    if(!empty($key) && !empty($val)){
      return !empty(old($key)) ? old($key) : $val;
    }else{
      return '';
    }
}
