<?php

namespace App\Http\Controllers\Frontend;

use App\Model\Admin\ShopProductModel;
use App\Model\Front\BannerModel;
use App\Model\Front\BrandModel;
use App\Model\Front\ShopCategoryModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomepageController extends Controller
{
    //

    public function index() {

        $data = array();

        $data['banner_main'] = $banner_main = BannerModel::getBannerByLocation(1);
        $data['sale1_banner'] = $sale1_banner = BannerModel::getBannerByLocation(2);
        $data['sale2_banner'] = $sale2_banner = BannerModel::getBannerByLocation(3);
        $data['sale3_banner'] = $sale3_banner = BannerModel::getBannerByLocation(4);
        $data['sale4_banner'] = $sale4_banner = BannerModel::getBannerByLocation(5);
        $data['sale5_banner'] = $sale5_banner = BannerModel::getBannerByLocation(6);

        $data['brands'] = $brands = BrandModel::all();

        $homepage_category = ShopCategoryModel::where('homepage', 1)->orderBy('id', 'asc')->take(4)->get();

        foreach ($homepage_category as $key => $cat) {
            $homepage_category[$key]['products'] = ShopProductModel::where(array('cat_id'=> $cat->id, 'homepage' => 1))->orderBy('id', 'asc')->take(8)->get();
        }

        $data['homepage_category'] = $homepage_category;



        return view('frontend.homepages.index', $data);
    }
}
