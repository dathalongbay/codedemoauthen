<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\MenuModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class MenuController extends Controller
{
    //
    /**
     * Hàm khởi tạo của class được chạy ngay khi khởi tạo đổi tượng
     * Hàm này nó luôn được chạy trước các hàm khác trong class
     * AdminController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        $locations = MenuModel::getMenuLocations();
        view()->share('locations', $locations);
    }

    public function index() {
        $items = DB::table('menus')->paginate(10);

        /**
         * Đây là biến truyền từ controller xuống view
         */
        $data = array();
        $data['menus'] = $items;

        return view('admin.content.menu.index', $data);
    }

    public function create() {
        /**
         * Đây là biến truyền từ controller xuống view
         */
        $data = array();

        return view('admin.content.menu.submit', $data);
    }

    public function edit($id) {
        /**
         * Đây là biến truyền từ controller xuống view
         */
        $data = array();

        $item = MenuModel::find($id);
        $data['menu'] = $item;

        return view('admin.content.menu.edit', $data);
    }

    public function delete($id) {
        /**
         * Đây là biến truyền từ controller xuống view
         */
        $data = array();

        $item = MenuModel::find($id);
        $data['menu'] = $item;

        return view('admin.content.menu.delete', $data);
    }

    public function store(Request $request) {

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required',
            'desc' => 'required',
        ]);

        $input = $request->all();

        $item = new MenuModel();

        $item->name = $input['name'];
        $item->slug = $input['slug'];
        $item->desc = $input['desc'];
        $item->location = isset($input['location']) ? $input['location'] : 0;

        $item->save();

        return redirect('/admin/menu');
    }

    public function update(Request $request, $id) {

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required',
            'desc' => 'required',
        ]);

        $input = $request->all();

        $item = MenuModel::find($id);

        $item->name = $input['name'];
        $item->slug = $input['slug'];
        $item->desc = $input['desc'];
        $item->location = isset($input['location']) ? $input['location'] : 0;

        $item->save();

        return redirect('/admin/menu');
    }

    public function destroy($id) {
        $item = MenuModel::find($id);

        $item->delete();

        return redirect('/admin/menu');
    }
}
