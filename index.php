<?php declare(strict_types=1);

if (PHP_SAPI == 'cli-server') {
    // To help the built-in PHP dev server, check if the request was actually for
    // something which should probably be served as a static file
    $url = parse_url($_SERVER['REQUEST_URI']);
    $file = __DIR__ . $url['path'];
    if (is_file($file)) {
        return false;
    }
}

require_once dirname(__FILE__) . '/vendor/autoload.php';

session_start();

$app = new \MediSoft\App;

require __DIR__ . '/routes/web.php';

$app->run();

//$string = 'football vs soccer';
//$array = str_split($string);
//$array_unique = array_unique($array);
//$res = '';
//var_dump(get_duplicates($array));
//
//foreach($array_unique as $char){
//    $keys = getKeys($array,$char);
//    $count = getCount($keys);
//    $before = getBefore($array,$keys);
//    $after = getAfter($array,$keys);
//    //echo $char.' : '.$count.' : before: '.$before.' after: '.$after;
//    //echo "\r\n";
//}
//
//function getKeys($array, $value){
//    return array_keys($array, $value);
//}
//
//function getCount($keys){
//    return count($keys);
//}
//
//function getBefore($array, $keys){
//    $list = [];
//    foreach ($keys as $key){
//        if( isset($array[$key + 1]) ){
//            $list[] = $array[$key + 1];
//        }
//    }
//    return (!empty(implode(",",$list)) ? implode(",",$list) : 'none');
//}
//
//function getAfter($array, $keys){
//    $list = [];
//    foreach ($keys as $key){
//        if( isset($array[$key - 1]) ){
//            $list[] = $array[$key - 1];
//        }
//    }
//    return (!empty(implode(",",$list)) ? implode(",",$list) : 'none');
//}
//
//function get_duplicates ($array) {
//    return array_unique( array_diff_assoc( $array, array_unique( $array ) ) );
//}
