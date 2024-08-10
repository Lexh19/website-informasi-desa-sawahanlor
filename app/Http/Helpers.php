<?php

use App\Models\home;

function get_homes_value($id){
    $data = home::where('id',$id)->first();
    if (isset($data-> value)) {
        return $data->value;

    } else {
        return 'empty';
    }
}
