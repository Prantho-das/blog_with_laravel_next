<?php
if (!function_exists('flash_message')) {
function flash_message($msg="",$status='success'){
        request()->flash('message', [
            'message' => $msg,
            'status' => $status
        ]);
}
}
