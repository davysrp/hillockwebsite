<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use Illuminate\Http\Request;
use Exception;

class FacilitiesController extends Controller
{

    /**
     * Display a listing of the facilities.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $facilities = Facility::paginate(25);

        return view('facilities.index', compact('facilities'));
    }

    /**
     * Show the form for creating a new facility.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {


        return view('facilities.create');
    }

    /**
     * Store a new facility in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            Facility::create($data);

            return redirect()->route('facilities.facility.index')
                ->with('success_message', 'Facility was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified facility.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $facility = Facility::findOrFail($id);

        return view('facilities.show', compact('facility'));
    }

    /**
     * Show the form for editing the specified facility.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $facility = Facility::findOrFail($id);


        return view('facilities.edit', compact('facility'));
    }

    /**
     * Update the specified facility in the storage.
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

            $facility = Facility::findOrFail($id);
            $facility->update($data);

            return redirect()->route('facilities.facility.index')
                ->with('success_message', 'Facility was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified facility from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $facility = Facility::findOrFail($id);
            $facility->delete();

            return redirect()->route('facilities.facility.index')
                ->with('success_message', 'Facility was successfully deleted.');
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
                'name' => 'nullable|string|min:0|max:255',
            'short_desc' => 'nullable',
            'description' => 'nullable',
            'meta_keyword' => 'nullable|string|min:0|max:255',
            'photo' => 'nullable|file',
            'meta_description' => 'nullable',
        ];


        $data = $request->validate($rules);
        if ($image = $request->file('photo')) {
            $destinationPath = 'image/facility/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['photo'] = "$profileImage";
        } else {
            unset($data['photo']);
        }



        return $data;
    }

}
