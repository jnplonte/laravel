<?php
function _getUserPaginationURL($url, $data){
  if(!empty($url)){
    $getURL = '';
    if(!empty(http_build_query($data))){
      $getURL = '&'.http_build_query($data);
    }
    $pageURL = $url.$getURL;
    $pageClass = '';
  }else{
    $pageURL = 'javascript:void(0);';
    $pageClass = 'unavailable';
  }

  return array('pageURL' => $pageURL, 'pageClass' => $pageClass );
}

function _getUserPagination($usersData, $getData){
  $total = ceil($usersData->total() / $usersData->perPage());

  $content = '<ul class="pagination">';

  $pPage = _getUserPaginationURL($usersData->previousPageUrl(), $getData);
  $content .= '<li class="arrow'.$pPage['pageClass'].'"><a href="'.$pPage['pageURL'].'">&laquo;</a></li>';
  $z1 = ($usersData->currentPage() - config('site.paginationOffset'));
  $z2 = ($usersData->currentPage() + config('site.paginationOffset'));

  if($usersData->currentPage() >= (1 + config('site.paginationLast'))){
    $sPage = _getUserPaginationURL($usersData->url(1), $getData);
    $content .= '<li class="arrow"><a href="'.$sPage['pageURL'].'">1</a></li>';
  }

  if($usersData->currentPage() >= (1 + config('site.paginationHeillip'))){
    $content .= '<li class="unavailable"><a href="">&hellip;</a></li>';
  }

  for ($i=1; $i <= $total; $i++) {
    if( ($z1 <= $i) && ($i <= $z2)){
      $page = _getUserPaginationURL($usersData->url($i), $getData);
      if($usersData->currentPage() == $i){
        $isCur = 'current';
      }else{
        $isCur = '';
      }
      $content .= '<li class="'.$isCur.'"><a href="'.$page['pageURL'].'">'.$i.'</a></li>';
    }
  }

  if($usersData->currentPage() <= ($usersData->lastPage() - config('site.paginationHeillip'))){
    $content .= '<li class="unavailable"><a href="">&hellip;</a></li>';
  }

  if($usersData->currentPage() <= ($usersData->lastPage() - config('site.paginationLast'))){
    $cPage = _getUserPaginationURL($usersData->url($usersData->lastPage()), $getData);
    $content .= '<li class="arrow"><a href="'.$cPage['pageURL'].'">'.$usersData->lastPage().'</a></li>';
  }

  $lPage = _getUserPaginationURL($usersData->nextPageUrl(), $getData);
  $content .= '<li class="arrow'.$lPage['pageClass'].'"><a href="'.$lPage['pageURL'].'">&raquo;</a></li>';

  $content .= '</ul>';

  return $content;
}
