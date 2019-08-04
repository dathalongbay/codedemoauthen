<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    //

    public function index(Request $request) {
        $data = array();

        $input = $request->all();

        if (isset($input['Search']) && (strlen($input['Search']) > 2)) {
            $data['search'] = $search = $input['Search'];
        } else {
            $data['search'] = $search = '';
        }

        $data['result'] = DB::table('shop_products')->where('name', 'like', '%'.$search.'%')->paginate(10);


        return view('frontend.search.search', $data);
    }
}
