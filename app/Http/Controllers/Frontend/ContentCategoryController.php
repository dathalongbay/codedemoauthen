<?php

namespace App\Http\Controllers\Frontend;

use App\Model\Front\ContentCategoryModel;
use App\Model\Front\ContentPostModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContentCategoryController extends Controller
{
    //

    public function detail($id) {


        $data = array();

        $data['category'] = ContentCategoryModel::find($id);

        $data['posts'] = ContentPostModel::where('cat_id', $id)->paginate(10);;

        return view('frontend.content.category.detail', $data);
    }
}
