<?php
/**
 * Created by PhpStorm.
 * User: datdo
 * Date: 2/10/2019
 * Time: 4:16 PM
 */

$cities = array('ha noi', 'ho chi minh', 'da nang', 'can tho', 'an giang');
echo '<br> ngoài hàm mảng ban đầu có phạm vi toàn cục $cities';
echo '<pre>';
print_r($cities);
echo '</pre>';
function filterCity(&$cities_arg) {
    foreach ($cities_arg as $key => $city) {
        if (substr($city,0, 1) != 'h') {
            unset($cities_arg[$key]);
        }
    }

    echo '<br> trong hàm mảng có phạm vi cục bộ $cities_arg';
    echo '<pre>';
    print_r($cities_arg);
    echo '</pre>';

    return $cities_arg;
}

filterCity($cities);
echo '<br> ngoài hàm toàn cục sau khi đã chạy qua hàm filterCity $cities';
echo '<pre>';
print_r($cities);
echo '</pre>';

