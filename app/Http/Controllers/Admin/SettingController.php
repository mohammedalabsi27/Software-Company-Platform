<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateSettingRequest;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::findOrFail(1);
        return view('admin.settings.index', get_defined_vars());
    }

    public function update(UpdateSettingRequest $request, Setting $setting)
    {
        $data = $request->validated();
        if($request->hasFile('site_logo')){

            Storage::delete("public/settings/$setting->site_logo");

            $siteLogo = $request->site_logo;
            $newSiteLogoName = time() . '-' . $siteLogo->getClientOriginalName();
    
            $siteLogo->storeAs('settings', $newSiteLogoName, 'public');

            $data['site_logo'] = $newSiteLogoName; 
        }
        if($request->hasFile('site_favicon')){

            Storage::delete("public/settings/$setting->site_favicon");

            $siteFavicon = $request->site_favicon;
            $newSiteFaviconName = time() . '-' . $siteFavicon->getClientOriginalName();
    
            $siteFavicon->storeAs('settings', $newSiteFaviconName, 'public');

            $data['site_favicon'] = $newSiteFaviconName; 
        }
        
        $setting->update($data);
        return to_route('admin.settings.index')->with('success', __('keywords.updated_successfully'));
    }
}
