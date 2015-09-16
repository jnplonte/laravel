<?php
function _checkPicture($gender, $img){
    if(!empty($img)){
      return url($img);
    }else{
      switch ($gender) {
        case '1':
          return url(config('theme.themeAssetsDir').'/img/default-male.png');
        break;
        case '2':
          return url(config('theme.themeAssetsDir').'/img/default-female.jpg');
        break;
        default:
          return url(config('theme.themeAssetsDir').'/img/default-male.png');
        break;
      }
    }
}
