<?php
// config
$link_limit = 7; // maximum number of links (a little bit inaccurate, but will be ok for now)

$keys = "";
if(isset($_GET['keyword'])){
    $keys = $_GET['keyword'];
}

$cat = "";
if(isset($_GET['cat'])){
    $cat = $_GET['cat'];
}

?>

@if ($paginator->lastPage() > 1)
    
        <ul class="pagination justify-content-center">
            <li class="page-item {{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
                <a  href="<?php echo $paginator->url(1)."&keyword=".$keys."&cat=".$cat; ?>"><span class="page-link">First</span></a>
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
                    <a class="page-link" href="{{ $paginator->url($i).'&keyword='.$keys.'&cat='.$cat  }}">{{ $i }}</a>
                </li>
            @endif
        @endfor
        <li class="page-item {{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
            <a  href="{{ $paginator->url($paginator->lastPage()) }}"><span class="page-link">Last</span></a>
        </li>
    </ul>
@endif

<!--

            <div class="blog-pagination">
              <ul class="justify-content-center">
                <li class="disabled"><i class="icofont-rounded-left"></i></li>
                <li><a href="#">1</a></li>
                <li class="active"><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#"><i class="icofont-rounded-right"></i></a></li>
              </ul>
            </div>

          -->