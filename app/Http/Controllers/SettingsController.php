<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Exception;

class SettingsController extends Controller
{

    /**
     * Display a listing of the settings.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $settings = Setting::paginate(25);

        return view('settings.index', compact('settings'));
    }

    /**
     * Show the form for creating a new setting.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {


        return view('settings.create');
    }

    /**
     * Store a new setting in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            Setting::create($data);

            return redirect()->route('settings.setting.index')
                ->with('success_message', 'Setting was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified setting.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $setting = Setting::findOrFail($id);

        return view('settings.show', compact('setting'));
    }

    /**
     * Show the form for editing the specified setting.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $setting = Setting::findOrFail($id);


        return view('settings.edit', compact('setting'));
    }

    /**
     * Update the specified setting in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {

            $data = $this->getData($request);

            $setting = Setting::findOrFail($id);
            $setting->update($data);

            return redirect()->route('settings.setting.index')
                ->with('success_message', 'Setting was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified setting from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $setting = Setting::findOrFail($id);
            $setting->delete();

            return redirect()->route('settings.setting.index')
                ->with('success_message', 'Setting was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }


    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
                'logo' => 'nullable|file',
            'favicon' => 'nullable|file',
            'seo_title' => 'nullable|string|min:0|max:191',
            'seo_keyword' => 'nullable',
            'seo_description' => 'nullable',
            'company_contact' => 'nullable|string|min:0|max:191',
            'company_address' => 'nullable',
            'from_name' => 'nullable|string|min:0|max:191',
            'from_email' => 'nullable|string|min:0|max:191',
            'facebook' => 'nullable|string|min:0|max:191',
            'telegam' => 'nullable|string|min:0|max:255',
            'linkedin' => 'nullable|string|min:0|max:191',
            'twitter' => 'nullable|string|min:0|max:191',
            'google' => 'nullable|string|min:0|max:191',
            'copyright_text' => 'nullable|string|min:0|max:191',
            'footer_text' => 'nullable|string|min:0|max:191',
            'terms' => 'nullable',
            'disclaimer' => 'nullable',
            'google_analytics' => 'nullable',
            'contact_2' => 'nullable',
        ];


        $data = $request->validate($rules);

        if ($image = $request->file('logo')) {
            $destinationPath = 'image/setting/';
            $profileImage = rand(100000, 999999). date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['logo'] = "$profileImage";
        } else {
            unset($data['logo']);
        }

        if ($image = $request->file('favicon')) {
            $destinationPath = 'image/setting/';
            $profileImage =  rand(100000, 999999).date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['favicon'] = "$profileImage";
        } else {
            unset($data['favicon']);
        }

        return $data;
    }

}
