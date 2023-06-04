<?php

use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

if (!function_exists('flash_message')) {
    function flash_message($msg = "", $status = 'success')
    {
        request()->flash('message', [
            'message' => $msg,
            'status' => $status,
        ]);
    }
}
if (!function_exists('get_setting')) {
    function get_setting($type)
    {
        $value = Cache::remember($type, 8400000, function () use ($type) {
            return \App\Models\BusinessSetting::where('type', $type)->first();
        });
        return $value ? $value->value : "";
    }
}
if (!function_exists('getUserByToken')) {
    function getUserByToken()
    {
        $bToken = request()->bearerToken();
        if (!$bToken) {
            return false;
        }
        [$id, $token] = explode('|', $bToken, 2);

        $userTokenInfo = DB::table('personal_access_tokens')->where('id', $id)->where('token', hash('sha256', $token))->first();
        if ($userTokenInfo) {
            return User::find($userTokenInfo->tokenable_id);
        }
        return null;
    }
}