<?php
/**
 * Created by PhpStorm.
 * User: datdo
 * Date: 2/10/2019
 * Time: 2:45 PM
 */

/**
 * Đệ qui trong PHP là việc bản thân 1 hàm gọi lại chính nó cho đến khi
 * đạt được mục đích nào đó
 * mà kết quả của bước này là đầu vào của bước tiếp theo
 * ví dụ kết quả của bước 1 là đầu vào của bước 2
 * kết quả của bước 2 là đầu vào của bước 3
 * kết quả của bước 3 là đầu vào của bước 4
 * chúng ta sẽ có 1 điều kiện dừng khi mà đạt được kết quả
 */

/**
 * In ra 1 tam giac các ngôi sao mà mỗi dòng từ 1* và kết thúc 100*
 * *
 * **
 * ***
 * n****
 * 100*****
 */

function printStar($n){

    for($i = 1;$i <= $n; $i++){
        echo "<br> dòng $i : " . str_repeat('*', $i);
    }
}

//printStar(100);

function printStarDequy($n, $i){

    echo "<br> dòng $i : " . str_repeat('*', $i);
    if ($i <= ($n-1)) {
        $i++;
        printStarDequy($n, $i);
    }
}
printStarDequy(100, 1);


