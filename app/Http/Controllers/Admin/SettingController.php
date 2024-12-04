<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function subscription(Request $request)
    {
        $settings = Setting::query()->first();
        return Response()->json($settings, 200);
    }
}
