<?php
// config
$link_limit = 7; 
$qr = explode("&",$_SERVER['QUERY_STRING']);

$query = $_SERVER['QUERY_STRING'];

if(isset($_GET['page'])){
    $query = "";

    $tm = 0;
    foreach($qr as $str){
        if($tm > 0){
            if($tm < (count($qr)-1)){
                $query .= $str."&";
            }
            else{
                $query .= $str;
            }
        }
        $tm++;
    }
}
?>

@if ($paginator->lastPage() > 1)
    <ul class="pagination">
        <li class="page-item {{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
            <a href="<?php echo $paginator->url(1)."&".$query; ?>" class="page-link">First</a>
         </li>
        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            <?php
            $half_total_links = floor($link_limit / 2);
            $from = $paginator->currentPage() - $half_total_links;
            $to = $paginator->currentPage() + $half_total_links;
            if ($paginator->currentPage() < $half_total_links) {
               $to += $half_total_links - $paginator->currentPage();
            }
            if ($paginator->lastPage() - $paginator->currentPage() < $half_total_links) {
                $from -= $half_total_links - ($paginator->lastPage() - $paginator->currentPage()) - 1;
            }
            ?>
            @if ($from < $i && $i < $to)
                <li class="page-item {{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
                    <a href="<?php echo $paginator->url($i)."&".$query; ?>" class="page-link">{{ $i }}</a>
                </li>
            @endif
        @endfor
        <li class="page-item {{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
            <a href="<?php echo $paginator->url($paginator->lastPage())."&".$query; ?>" class="page-link">Last</a>
        </li>
    </ul>
@endif