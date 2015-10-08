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

function _checkActive($active){
  switch ($active) {
    case '0':
      return '<span class="alert label">InActive</span>';
    break;
    case '1':
      return '<span class="success label">Active</span>';
    break;
    default:
      return '<span class="alert label">Error</span>';
    break;
  }
}

function _checkRole($role){
  switch ($role) {
    case '1':
      return '<span class="success label">Administrator</span>';
    break;
    case '2':
      return '<span class="label">Manager</span>';
    break;
    case '3':
      return '<span class="secondary label">User</span>';
    break;
    default:
      return '<span class="alert label">Error</span>';
    break;
  }
}

function _checkGender($gender){
  switch ($gender) {
    case '1':
      return 'Male';
    break;
    case '2':
      return 'Female';
    break;
    default:
      return 'Male';
    break;
  }
}
