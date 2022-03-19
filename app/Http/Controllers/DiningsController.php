<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Dining;
use Illuminate\Http\Request;
use Exception;

class DiningsController extends Controller
{

    /**
     * Display a listing of the dinings.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $dinings = Dining::paginate(25);

        return view('dinings.index', compact('dinings'));
    }

    /**
     * Show the form for creating a new dining.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {


        return view('dinings.create');
    }

    /**
     * Store a new dining in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            Dining::create($data);

            return redirect()->route('dinings.dining.index')
                ->with('success_message', 'Dining was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified dining.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $dining = Dining::findOrFail($id);

        return view('dinings.show', compact('dining'));
    }

    /**
     * Show the form for editing the specified dining.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $dining = Dining::findOrFail($id);


        return view('dinings.edit', compact('dining'));
    }

    /**
     * Update the specified dining in the storage.
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

            $dining = Dining::findOrFail($id);
            $dining->update($data);

            return redirect()->route('dinings.dining.index')
                ->with('success_message', 'Dining was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified dining from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $dining = Dining::findOrFail($id);
            $dining->delete();

            return redirect()->route('dinings.dining.index')
                ->with('success_message', 'Dining was successfully deleted.');
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
            'meta_description' => 'nullable',
            'photo' => 'nullable|file|string|min:0|max:255',
            'price' => 'nullable|string|min:0|max:255',
            'slug' => 'nullable|string|min:0|max:255',
            'short_description' => 'nullable',
        ];


        $data = $request->validate($rules);
        if ($image = $request->file('photo')) {
            $destinationPath = 'image/package/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['photo'] = "$profileImage";
        } else {
            unset($data['photo']);
        }



        return $data;
    }

}
