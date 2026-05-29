<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();

        if (!$setting) {
            Setting::create([]);
            return redirect()->route('admin.setting.edit');
        }

        return redirect()->route('admin.setting.edit');
    }

    public function edit()
    {
        $setting = Setting::first();

        if (!$setting) {
            $setting = Setting::create([]);
        }

        return view('admin.setting.edit', ['setting' => $setting]);
    }

    public function update(Request $request)
    {
        $setting = Setting::find($request->id);

        $setting->title       = $request->title;
        $setting->keywords    = $request->keywords;
        $setting->description = $request->description;
        $setting->company     = $request->company;
        $setting->address     = $request->address;
        $setting->phone       = $request->phone;
        $setting->email       = $request->email;
        $setting->fax         = $request->fax;
        $setting->aboutus     = $request->aboutus;
        $setting->references  = $request->references;

        if ($request->hasFile('icon')) {
            if ($setting->icon) {
                Storage::disk('public')->delete($setting->icon);
            }
            $path = $request->file('icon')->store('settings', 'public');
            $setting->icon = $path;
        }

        $setting->save();

        return redirect()->route('admin.setting.edit')->with('success', 'Settings updated successfully.');
    }
}
