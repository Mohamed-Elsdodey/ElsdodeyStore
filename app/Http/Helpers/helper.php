<?php


if (!function_exists('admin')) {
    function admin()
    {
        return auth()->guard('admin');
    }
}


if (!function_exists('get_file')) {
    function get_file($file)
    {
        // Storage::exists( $file )
        if (filter_var($file, FILTER_VALIDATE_URL)) {
            $file_path = $file;
        } elseif ($file) {
            $file_path = asset('storage/uploads') . '/' . $file;
        } else {
            $file_path = asset('dashboard/assets/images/companies/img-1.png');
        }
        return $file_path;
    }//end
}
