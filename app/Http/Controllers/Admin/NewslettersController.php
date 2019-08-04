<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\NewslettersModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class NewslettersController extends Controller
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
    }


    public function index() {

        $items = DB::table('newsletters')->paginate(10);

        /**
         * Đây là biến truyền từ controller xuống view
         */
        $data = array();
        $data['newsletters'] = $items;

        return view('admin.content.newsletters.index', $data);
    }

    public function create() {
        /**
         * Đây là biến truyền từ controller xuống view
         */
        $data = array();

        return view('admin.content.newsletters.submit', $data);
    }

    public function edit($id) {
        /**
         * Đây là biến truyền từ controller xuống view
         */
        $data = array();

        $item = NewslettersModel::find($id);
        $data['newsletter'] = $item;


        return view('admin.content.newsletters.edit', $data);
    }

    public function delete($id) {
        /**
         * Đây là biến truyền từ controller xuống view
         */
        $data = array();

        $item = NewslettersModel::find($id);
        $data['newsletter'] = $item;

        return view('admin.content.newsletters.delete', $data);
    }


    public function store(Request $request) {

        $validatedData = $request->validate([
            'email' => 'required',
        ]);

        $input = $request->all();

        $item = new NewslettersModel();

        $item->email = $input['email'];
        $item->save();

        return redirect('/admin/newsletters');
    }

    public function update(Request $request, $id) {

        $validatedData = $request->validate([
            'email' => 'required',
        ]);

        $input = $request->all();

        $item = NewslettersModel::find($id);

        $item->email = $input['email'];
        $item->save();

        return redirect('/admin/newsletters');
    }

    public function destroy($id) {
        $item = NewslettersModel::find($id);

        $item->delete();

        return redirect('/admin/newsletters');
    }
}
