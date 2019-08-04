<?php

namespace App\Http\Controllers\Frontend;

use App\Model\Front\ContentPageModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContentPageController extends Controller
{
    //

    public function detail($id) {
        $item = ContentPageModel::find($id);

        $data = array();

        $data['page'] = $item;

        return view('frontend.content.page.detail', $data);
    }
}
