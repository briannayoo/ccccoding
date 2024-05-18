<?php
  $pageNumber = $_GET['pageNumber'] ?? 1;
  $pageCount = 6;
  $startLimit = ($pageNumber-1)*$pageCount;
  $endLimit = $pageCount;
  $block_ct = 10;
  $block_num = ceil($pageNumber/$block_ct);
  $block_start = (($block_num -1) * $block_ct ) + 1;
  $block_end = $block_start + $block_ct -1;
  
  $total_page = ceil($totalcount/$pageCount);
  if ($total_page == 0) {
      $total_page = 1; // 데이터가 없을 때 1페이지를 출력하도록 설정
      $block_start = 1;
      $block_end = 1;
  }
  
  if($block_end > $total_page) $block_end = $total_page;
  $total_block = ceil($total_page/$block_ct);

?>