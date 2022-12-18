<?php 
namespace App\Http\Pagination;
// use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class MyPaginator 
{
    private $paginator;

    public function __construct(LengthAwarePaginator $paginator)
    {
        $this->paginator = $paginator;
    }

    public function link()
    {
        $prev = $this->paginator->currentPage() == 1 ? ' disabled' : ''; //最初のページだったらdisabled

        $next = $this->paginator->currentPage() == $this->paginator->count() ? ' disabled' : '';//最後のページだったらdisabled

        $result = '<ul class="pagination" role="navigation">';
        //前に戻るボタン
        $result .= '<li class="page-item ' . $prev . '"><a class="page-link" href="' . $this->paginator->previousPageUrl() . '">←前のページ</a></li>';
        //現在のページボタン
        $result .= '<li class="page-item disabled"><a class="page-link">' . $this->paginator->currentPage() . '</a></li>';
        //次に行くボタン
        $result .= '<li class="page-item ' . $next . '"><a class="page-link" href="' . $this->paginator->nextPageUrl() . '">次のページ→</a></li>';
        $result .= '</ul>';

        return $result;
    }
}