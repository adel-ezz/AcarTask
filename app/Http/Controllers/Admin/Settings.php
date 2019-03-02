<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Setting;
use Illuminate\Http\Request;

class Settings extends Controller
{

    public function index()
    {
        return view('admin.settings', ['title' => trans('admin.settings')]);
    }

    public function MainValidate()
    {
        $rules = [
            'sitename_en' => 'required',
            'email' => 'required',
            'logo' => 'sometimes|nullable|' . it()->image(),
            'icon' => 'sometimes|nullable|' . it()->image(),
        ];
        $data = $this->validate(request(), $rules, [], [
            'sitename_en' => trans('admin.sitename_en'),
            'email' => trans('admin.email'),
            'logo' => trans('admin.logo'),
            'icon' => trans('admin.icon'),
        ]);
        return $data;
    }

    public function store(Request $request)
    {

        $data = $this->MainValidate();
        foreach ($data as $key => $value) {
            if (substr($key, 0, 1) == '_') continue;
            $setting = Setting::where('name', $key)->get()->first();

            if ($setting) {
                $this->IfSettings($setting, $key, $value);
            } else {
                $this->ifNotSetting($key, $value);
            }
        }
        session()->flash('success', trans('admin.updated'));
        return redirect(aurl('settings'));
    }
    function IfSettings($setting, $key, $value)
    {
        if (($key == 'logo') OR ($key == 'icon')) {
            if (request()->hasFile('logo')) {
                $setting->$key = it()->upload($value, 'setting');
            }
        } else {

            $setting->value = $value;
            $setting->save();
        }
    }
    function ifNotSetting($key, $value)
    {
        if (($key == 'logo') OR ($key == 'icon')) {
            if (request()->hasFile($key)) {
                $result = it()->upload($value, 'setting');
                Setting::create(['name' => $key, 'value' => $result]);
            }
        } else {
            Setting::create(['name' => $key, 'value' => $value]);
        }
    }

}
