<?php

namespace App\Traits;

trait matchOldData
{
    public function matchData(array $data, $param)
    {
      if(!empty($data[$param])){
        if($data[$param] == $data['old_'.$param]){
          return true;
        }
      }

      return false;
    }
}
