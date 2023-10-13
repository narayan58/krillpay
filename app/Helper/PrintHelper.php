<?php
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class PrintHelper {

    public static function dragDropSorting() {
        $sort_orders = explode(',', Request::get('sort_orders'));
        $ids_order = Request::get('ids_order');
        

        $ids_order = str_replace('sortable[]=', '', $ids_order);
        $ids_order = substr($ids_order, 1);
        $ids_order = explode('&', $ids_order);

        // pe($ids_order);
        $count = 1;
        for ($i = 0; $i < sizeof($ids_order); $i++) {
            p(Request::get('table'));
            p(explode('=', $ids_order[$i])[1].' x '.$count);
            $dataset = DB::table(Request::get('table'))
                    ->where('id', explode('=', $ids_order[$i])[1])
                    ->update(array('sort_order' => $count++));
            p($dataset);
        }
    }

    public static function nextSortOrder($table) {
        return DB::table($table)->max('sort_order') + 1;
    }

    public static function nextPageSortOrder($table, $bookid) {
        return DB::table($table)->where('book_id', $bookid)->max('sort_order') + 1;
    }


}

function p($data){
    echo "<pre>";
    print_r ($data);
    echo "</pre>";
}

function pe($data){
    echo "<pre>";
    print_r ($data);
    echo "</pre>";
    exit();
}

function str_slug($data,$seperator=null){
    $seperator = ($seperator == null)?'-':$seperator;
    $text = Str::slug($data, $seperator);
    return $text;
}

function chunkfullurl($fullurl){
    if ($fullurl != '') {
        $imagepath = parse_url($fullurl);
        if (!empty($imagepath['path'])) {
            $urls = array_values(array_filter(explode('/', $imagepath['path'])));
            if($urls[0] != 'public'){
                array_shift($urls);
            }
            $chunkurl = implode('/', $urls);
            return $chunkurl;
        } else{
            return $fullurl;
        }
    }else{
        return null;
    }
}


function getStatus($id){
    return ($id == 1)?ACTIVE_STATUS:INACTIVE_STATUS;
}

function getImage($image){
    return ($image != '')?asset($image): DEFAULT_IMG;
}

function getYesNoStatus($id){
    return ($id==1)?YES_STATUS:NO_STATUS;
}

function getLastWordBold($word){
    $array = explode(' ', $word);
    $array[count($array) - 1] = '<span>'.$array[count($array) - 1].'</span>';
    return implode(' ', $array);
}