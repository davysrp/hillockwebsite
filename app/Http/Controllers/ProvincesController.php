<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Province;
use Illuminate\Http\Request;
use Exception;

class ProvincesController extends Controller
{

    /**
     * Display a listing of the provinces.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $provinces = Province::paginate(25);

        return view('provinces.index', compact('provinces'));
    }

    /**
     * Show the form for creating a new province.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {


        return view('provinces.create');
    }

    /**
     * Store a new province in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            Province::create($data);

            return redirect()->route('provinces.province.index')
                ->with('success_message', 'Province was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified province.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $province = Province::findOrFail($id);

        return view('provinces.show', compact('province'));
    }

    /**
     * Show the form for editing the specified province.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $province = Province::findOrFail($id);


        return view('provinces.edit', compact('province'));
    }

    /**
     * Update the specified province in the storage.
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

            $province = Province::findOrFail($id);
           /* if ($request->photo != '') {
                $path = public_path()."/image/province/".$province->photo;
                unlink($path);
            }*/

            $province->update($data);

            return redirect()->route('provinces.province.index')
                ->with('success_message', 'Province was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }

    }

    /**
     * Remove the specified province from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $province = Province::findOrFail($id);
            $path = public_path() . "/image/province/" . $province->photo;
            if (file_exists($path)) {
                unlink($path);
            }
            $province->delete();

            return redirect()->route('provinces.province.index')
                ->with('success_message', 'Province was successfully deleted.');
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
            'name_kh' => 'nullable|string|min:0|max:255',
            'name' => 'nullable|string|min:0|max:255',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];


        $data = $request->validate($rules);

        if ($image = $request->file('photo')) {
            $destinationPath = 'image/province/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['photo'] = $profileImage;
        } else {
            unset($data['photo']);
        }


        return $data;
    }

}
