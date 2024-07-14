<?php
function uploadFile($nameFolder,$file) {
    //lấy tên file ảnh ghép với thời gian (timestamp)
    $fileName = time().'_'.$file->getClientOriginalName();
    return $file->storeAs($nameFolder,$fileName,'public');
}
