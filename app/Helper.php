<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;


function assets_path($path)
{
    return config('app.url') . '/resources/' . $path;
}


function YMD($time = null)
{
    if ($time != null)
        return date('Y-m-d H:i:s', $time);
    else
        return date('Y-m-d H:i:s');
}

function error($data = [])
{
    $data['success'] = false;
    $response['data'] = $data;
    response()->json($data)->send();
    die;
}

function success($data = [])
{
    $response['success'] = true;
    $response['data'] = $data;
    return response()->json($response);
}

function map_maker($data, $key, $value = null)
{
    $map = [];

    if ($value == null) {
        foreach ($data  as $row) {

            if (is_array($row)) {
                if (array_key_exists($key, $row))
                    $map[] = $row[$key];
            } else {
                $map[] = $row->{$key};
            }
        }
    } else {

        foreach ($data  as $row) {

            if (is_array($row)) {
                if (array_key_exists($key, $row))
                    $map[$row[$key]] = $row[$value];
            } else {
                $map[$row->{$key}] = $row->{$value};
            }
        }
    }
    return $map;
}


function date_range($first, $last, $step = '+1 day', $output_format = 'Y-m-d')
{

    $dates = array();
    $current = strtotime($first);
    $last = strtotime($last);

    while ($current <= $last) {

        $dates[] = date($output_format, $current);
        $current = strtotime($step, $current);
    }

    return $dates;
}

function date_range_count($first, $last)
{
    return count(date_range($first, $last));
}

function facebook_campaign_to_platform($campaign_name)
{
    if (strpos($campaign_name, '_android') !== false) return 'android';
    if (strpos($campaign_name, '_ios') !== false) return 'ios';

    return 'other';
}

function facebook_action($campaign_name)
{
    if (strpos($campaign_name, '_android') !== false) return 'android';
    if (strpos($campaign_name, '_ios') !== false) return 'ios';

    return 'other';
}



function input($key, $required = true)
{
    $value = '';
    if ($required) {
        if (!Input::has($key) || empty(Input::get($key))) {
            error(['text' => __('all.api.required_input', ['input' => $key])]);
        } else
            $value = Input::get($key);
    } else {
        $value = Input::get($key);
    }


    return $value;
    // return trim(filter_var($value, FILTER_SANITIZE_STRING));
}


function date_tr($ymd)
{

    if (empty($ymd)) return '';

    $date_time = strtotime($ymd);

    $days = array('Pzt', 'Sal', 'Çar', 'Per', 'Cum', 'Cmt', 'Paz');

    $months = array('Oca', 'Şub', 'Mrt', 'Nis', 'May', 'Haz', 'Tem', 'Ağu', 'Eyl', 'Eki', 'Kas', 'Ara');

    $month = $months[date('m', $date_time) - 1];
    $day = $days[date('N', $date_time) - 1];

    if (date('YMD', $date_time) == date('YMD'))
        return date('H:i:s', $date_time);
    else {

        if (date('Y', $date_time) == date('Y'))
            return date('j ', $date_time) . $month  . ' - ' . date(' H:i:s', $date_time);
        else
            return date('j ', $date_time) . $month . date(' Y ', $date_time) . ' - ' . date(' H:i:s', $date_time);
    }
}


function get_ip()
{
    foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key) {
        if (array_key_exists($key, $_SERVER) === true) {

            foreach (array_map('trim', explode(',', $_SERVER[$key])) as $ip) {
                if (filter_var($ip, FILTER_VALIDATE_IP) !== false) {
                    return $ip;
                }
            }
        }
    }

    return '0.0.0.0';
}



function settings($key, $value = null)
{

    if ($value == null) {
        return DB::table('settings')->where('key', $key)->value('value', '');
    } else {
        if (DB::table('settings')->where('key', $key)->exists()) {
            DB::table('settings')->where('key', $key)->update(['value' => $value]);
        } else {
            DB::table('settings')->insert(['key' => $key, 'value' => $value]);
        }
    }
}


function data($name)
{

    if ($name == 'country') {
        return  DB::table('countries')->get();
    } else if ($name == 'apps') {
        // return  DB::table('apps')->where('account_id',Auth::id())->get();
    }
}


function check_balance($type, $count)
{

    $amount = ceil($count * 1.2);

    if (Auth::user()->balance <= $amount)
        return error(['text' => 'Yetersiz bakiye', 'code' => 'balance']);


    DB::table('users')->where('id', Auth::user()->id)->decrement('balance', $amount);

    return $amount;
}

function get_id($token)
{


    $token = explode('.', $token);
    $user = DB::table('users')->where('id', $token[0])->where('token', $token[1])->first();

    if (!$user)
        return error(['data' => 'Hatalı token']);


    return $user->id;
}
