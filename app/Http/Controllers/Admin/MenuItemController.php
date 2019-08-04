<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\ContentCategoryModel;
use App\Model\Admin\ContentPageModel;
use App\Model\Admin\ContentPostModel;
use App\Model\Admin\ContentTagModel;
use App\Model\Admin\MenuItemModel;
use App\Model\Admin\MenuModel;
use App\Model\Admin\ShopCategoryModel;
use App\Model\Admin\ShopProductModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class MenuItemController extends Controller
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
        $items = DB::table('menu_items')->paginate(10);

        $items = MenuItemModel::getMenuItemRecursive();

        /**
         * Đây là biến truyền từ controller xuống view
         */
        $data = array();
        $data['menuitems'] = $items;

        return view('admin.content.menuitem.index', $data);
    }

    public function create() {
        /**
         * Đây là biến truyền từ controller xuống view
         */
        $data = array();

        $data['types'] = MenuItemModel::getTypeOfMenuItem();

        $data['menus'] = MenuModel::all();
        $data['menuitems'] = MenuItemModel::getMenuItemRecursive();

        $data['shop_categories'] = ShopCategoryModel::all();
        $data['shop_products'] = ShopProductModel::all();
        $data['content_categories'] = ContentCategoryModel::all();
        $data['content_tags'] = ContentTagModel::all();
        $data['content_pages'] = ContentPageModel::all();
        $data['content_posts'] = ContentPostModel::all();

        return view('admin.content.menuitem.submit', $data);
    }

    public function edit($id) {
        /**
         * Đây là biến truyền từ controller xuống view
         */
        $data = array();

        $item = MenuItemModel::find($id);
        $data['menu'] = $item;

        $data['types'] = MenuItemModel::getTypeOfMenuItem();

        $data['menus'] = MenuModel::all();
        $data['menuitems'] = MenuItemModel::getMenuItemRecursiveExcept($id);

        $data['shop_categories'] = ShopCategoryModel::all();
        $data['shop_products'] = ShopProductModel::all();
        $data['content_categories'] = ContentCategoryModel::all();
        $data['content_tags'] = ContentTagModel::all();
        $data['content_pages'] = ContentPageModel::all();
        $data['content_posts'] = ContentPostModel::all();

        return view('admin.content.menuitem.edit', $data);
    }

    public function delete($id) {
        /**
         * Đây là biến truyền từ controller xuống view
         */
        $data = array();

        $item = MenuItemModel::find($id);
        $data['menu'] = $item;

        return view('admin.content.menuitem.delete', $data);
    }

    public function store(Request $request) {

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'type' => 'required',
            'desc' => 'required',
            'menu_id' => 'required',
        ]);

        $input = $request->all();

        $item = new MenuItemModel();

        $params = array();

        $types = MenuItemModel::getTypeOfMenuItem();
        foreach ($types as $type_key => $type) {
            $params['params_'.$type_key] = isset($input['params_'.$type_key]) ? $input['params_'.$type_key] : '';
        }

        $params_json = json_encode($params);



        $item->name = $input['name'];
        $item->sort = isset($input['sort']) ? (int) $input['sort'] : 0;
        $item->type = isset($input['type']) ? $input['type'] : 0;

        $final_link = '';

        /**
         * $types[1] = 'Shop category';
        $types[2] = 'Shop product';
        $types[3] = 'Content category';
        $types[4] = 'Content post';
        $types[5] = 'Content page';
        $types[6] = 'Content tag';
        $types[7] = 'Custom Link';
         */

        switch ($item->type) {
            case 1:
                $final_link = '/shop/category/' . (int) $params['params_1'];
                break;
            case 2:
                $final_link = '/shop/product/' . (int) $params['params_2'];
                break;
            case 3:
                $final_link = '/content/category/' . (int) $params['params_3'];
                break;
            case 4:
                $final_link = '/content/post/' . (int) $params['params_4'];
                break;
            case 5:
                $final_link = '/page/'. (int) $params['params_5'];
                break;
            case 6:

                $final_link = '/content/tag/'.(int) $params['params_6'];
                break;
            case 7:
                $final_link = $params['params_7'];
                break;
            default:
                $final_link = '';
                break;
        }


        $item->params = $params_json;
        $item->link = $final_link;
        $item->desc = $input['desc'];
        $item->icon = isset($input['icon']) ? $input['icon'] : '';
        $item->menu_id = isset($input['menu_id']) ? $input['menu_id'] : 0;
        $item->parent_id = isset($input['parent_id']) ? $input['parent_id'] : 0;

        $item->save();



        if ($item->parent_id > 0) {
            /**
             * Đếm tổng số menu_item có cha là $item->parent_id
             */
            $total = DB::table('menu_items')->where('parent_id', $item->parent_id)->count();

            /**
             * Cập nhật tổng số bản ghi con cho menu item cha
             */
            $parent = MenuItemModel::find($item->parent_id);
            $parent->total = (int) $total;
            $parent->save();
        }


        return redirect('/admin/menuitems');
    }



    public function update(Request $request, $id) {

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'type' => 'required',
            'desc' => 'required',
            'menu_id' => 'required',
        ]);

        $input = $request->all();

        $item = MenuItemModel::find($id);

        /**
         * Kiểm tra xem có đổi parent_id không
         */
        if ( $item->parent_id != $input['parent_id']) {
            $change_parent = true;
        } else {
            $change_parent = false;
        }
        $old_parent_id = $item->parent_id;

        $params = array();

        $types = MenuItemModel::getTypeOfMenuItem();
        foreach ($types as $type_key => $type) {
            $params['params_'.$type_key] = isset($input['params_'.$type_key]) ? $input['params_'.$type_key] : '';
        }

        $params_json = json_encode($params);

        $item->name = $input['name'];
        $item->sort = isset($input['sort']) ? (int) $input['sort'] : 0;
        $item->type = isset($input['type']) ? $input['type'] : 0;

        switch ($item->type) {
            case 1:
                $final_link = '/shop/category/' . (int) $params['params_1'];
                break;
            case 2:
                $final_link = '/shop/product/' . (int) $params['params_2'];
                break;
            case 3:
                $final_link = '/content/category/' . (int) $params['params_3'];
                break;
            case 4:
                $final_link = '/content/post/' . (int) $params['params_4'];
                break;
            case 5:
                $final_link = '/page/'. (int) $params['params_5'];
                break;
            case 6:

                $final_link = '/content/tag/'.(int) $params['params_6'];
                break;
            case 7:
                $final_link = $params['params_7'];
                break;
            default:
                $final_link = '';
                break;
        }

        $item->params = $params_json;
        $item->link = $final_link;
        $item->desc = $input['desc'];
        $item->icon = isset($input['icon']) ? $input['icon'] : '';
        $item->menu_id = isset($input['menu_id']) ? $input['menu_id'] : 0;
        $item->parent_id = isset($input['parent_id']) ? $input['parent_id'] : 0;

        $item->save();

        if ($change_parent == true) {

            if ($old_parent_id > 0) {
                /**
                 * trước khi save
                 * Đếm tổng số menu_item có cha là $item->parent_id
                 */
                $total_old = DB::table('menu_items')->where('parent_id', $old_parent_id)->count();

                /**
                 * Cập nhật tổng số bản ghi con cho menu item cha
                 */
                $old_parent = MenuItemModel::find($old_parent_id);
                $old_parent->total = (int) $total_old;
                $old_parent->save();
            }

        }

        if ($item->parent_id > 0) {
            /**
             * Đếm tổng số menu_item có cha là $item->parent_id
             */
            $total = DB::table('menu_items')->where('parent_id', $item->parent_id)->count();

            /**
             * Cập nhật tổng số bản ghi con cho menu item cha
             */
            $parent = MenuItemModel::find($item->parent_id);
            $parent->total = (int) $total;
            $parent->save();
        }


        return redirect('/admin/menuitems');
    }

    public function destroy($id) {
        $item = MenuItemModel::find($id);

        $item->delete();

        return redirect('/admin/menuitems');
    }
}
