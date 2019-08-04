<?php
/**
 * Created by PhpStorm.
 * User: datdo
 * Date: 2/10/2019
 * Time: 4:13 PM
 */

$danhmuc = array();

$danhmuc[] = array('id' => 1, 'name' => 'Điện tử', 'parent_id' => 0, 'level' => 0);
$danhmuc[] = array('id' => 2, 'name' => 'Điện lạnh', 'parent_id' => 0, 'level' => 0);
$danhmuc[] = array('id' => 3, 'name' => 'Gia dụng', 'parent_id' => 0, 'level' => 0);
$danhmuc[] = array('id' => 4, 'name' => 'Mẹ và bé', 'parent_id' => 0, 'level' => 0);


$danhmuc[] = array('id' => 5, 'name' => 'Laptop', 'parent_id' => 1, 'level' => 0);
$danhmuc[] = array('id' => 6, 'name' => 'Điện thoại', 'parent_id' => 1, 'level' => 0);
$danhmuc[] = array('id' => 7, 'name' => 'Máy tính bảng', 'parent_id' => 1, 'level' => 0);
$danhmuc[] = array('id' => 8, 'name' => 'Tivi', 'parent_id' => 3, 'level' => 0);
$danhmuc[] = array('id' => 9, 'name' => 'Tủ lạnh', 'parent_id' => 2, 'level' => 0);
$danhmuc[] = array('id' => 10, 'name' => 'Điều hòa', 'parent_id' => 2, 'level' => 0);
$danhmuc[] = array('id' => 11, 'name' => 'Quạt phun sương', 'parent_id' => 3, 'level' => 0);
$danhmuc[] = array('id' => 12, 'name' => 'Tã bỉm', 'parent_id' => 4, 'level' => 0);
$danhmuc[] = array('id' => 13, 'name' => 'Sữa', 'parent_id' => 4, 'level' => 0);
$danhmuc[] = array('id' => 14, 'name' => 'Máy xay sinh tố', 'parent_id' => 3, 'level' => 0);
$danhmuc[] = array('id' => 15, 'name' => 'Cây nước', 'parent_id' => 3, 'level' => 0);


$danhmuc[] = array('id' => 16, 'name' => 'Laptop dell', 'parent_id' => 5, 'level' => 0);
$danhmuc[] = array('id' => 17, 'name' => 'Laptop sony', 'parent_id' => 5, 'level' => 0);
$danhmuc[] = array('id' => 18, 'name' => 'Iphone', 'parent_id' => 6, 'level' => 0);
$danhmuc[] = array('id' => 19, 'name' => 'Xiaomi', 'parent_id' => 6, 'level' => 0);
$danhmuc[] = array('id' => 20, 'name' => 'Ipad', 'parent_id' => 7, 'level' => 0);
$danhmuc[] = array('id' => 21, 'name' => 'DH Daikin', 'parent_id' => 10, 'level' => 0);
$danhmuc[] = array('id' => 22, 'name' => 'DH Gree', 'parent_id' => 10, 'level' => 0);
$danhmuc[] = array('id' => 23, 'name' => 'Tủ lạnh LG', 'parent_id' => 9, 'level' => 0);
$danhmuc[] = array('id' => 24, 'name' => 'Tủ lạnh Samsung', 'parent_id' => 9, 'level' => 0);
$danhmuc[] = array('id' => 25, 'name' => 'Quạt PS Saiko', 'parent_id' => 11, 'level' => 0);
$danhmuc[] = array('id' => 26, 'name' => 'Máy xay sinh tố sunhouse', 'parent_id' => 14, 'level' => 0);
$danhmuc[] = array('id' => 27, 'name' => 'Máy xay sinh tố kangaro', 'parent_id' => 14, 'level' => 0);

foreach ($danhmuc as $item) {
    echo '<br> id : ' . $item['id'] . ' - ' . $item['name'];
}

$result = array();
function outputLevelCategories($input_categories, &$output_categories, $parent_id = 0, $lvl = 1) {

    if (count($input_categories) > 0) {
        foreach ($input_categories as $key => $category) {
            if ($category['parent_id'] == $parent_id) {
                $category['level'] = $lvl;
                $output_categories[] = $category;
                unset($input_categories[$key]);

                $new_parent_id = $category['id'];
                $new_level = $lvl + 1;
                outputLevelCategories($input_categories, $output_categories, $new_parent_id, $new_level);
            }
        }
    }


}
outputLevelCategories($danhmuc, $result);
echo '<pre>';
print_r($result);
echo '</pre>';
foreach ($result as $item) {
    echo '<br> id : ' . $item['id'] . ' - ' . $item['name'];
}

