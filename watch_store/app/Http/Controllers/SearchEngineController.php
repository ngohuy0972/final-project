<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchEngineController extends Controller
{
    
    public function index(Request $request) {
        $keyword = $request->keyword;
        // dd($keyword);
        $searchResults = Product::where('name', 'LIKE', '%'.$keyword.'%')
                                ->take(9)
                                ->get();

        // dd($searchResults);

        return view('search.searchresult')->with(compact('searchResults'));

    }

    public function searchEngine(Request $request){
        $output = '';

        $keyword = $request->keyword;
        $searchResults = Product::where('name', 'LIKE', '%'.$keyword.'%')
                                ->take(10)
                                ->get();

        $output = '<ul class="dropdown-menu">';
       
        if(!$searchResults->isEmpty()){
            foreach ($searchResults as $item ){
                $output .='<li class="item-search-results"><a href="#">'.$item->name.'</a></li>';
            }
            $output .='</ul>';

            echo $output;
        } else {
            $output .= '    <li>
                                <a>Không tim thấy sản phẩm cần tìm</a>
                            </li>
                        ';
            echo $output;    
        }
    }

}
