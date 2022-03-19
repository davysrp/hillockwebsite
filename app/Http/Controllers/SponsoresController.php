<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Sponsore;
use Illuminate\Http\Request;
use Exception;

class SponsoresController extends Controller
{

    /**
     * Display a listing of the sponsores.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $sponsores = Sponsore::paginate(25);

        return view('sponsores.index', compact('sponsores'));
    }

    /**
     * Show the form for creating a new sponsore.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {


        return view('sponsores.create');
    }

    /**
     * Store a new sponsore in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            Sponsore::create($data);

            return redirect()->route('sponsores.sponsore.index')
                ->with('success_message', 'Sponsore was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
        $data = $this->getData($request);

        Sponsore::create($data);
    }

    /**
     * Display the specified sponsore.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $sponsore = Sponsore::findOrFail($id);

        return view('sponsores.show', compact('sponsore'));
    }

    /**
     * Show the form for editing the specified sponsore.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $sponsore = Sponsore::findOrFail($id);


        return view('sponsores.edit', compact('sponsore'));
    }

    /**
     * Update the specified sponsore in the storage.
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

            $sponsore = Sponsore::findOrFail($id);
            $sponsore->update($data);

            return redirect()->route('sponsores.sponsore.index')
                ->with('success_message', 'Sponsore was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }

    }

    /**
     * Remove the specified sponsore from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $sponsore = Sponsore::findOrFail($id);
            $path = public_path() . "/image/sponsor/" . $sponsore->photo;
            if (file_exists($path)) {
                unlink($path);
            }
            $sponsore->delete();

            return redirect()->route('sponsores.sponsore.index')
                ->with('success_message', 'Sponsore was successfully deleted.');
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
            'name_kh' => 'nullable|string|min:0|max:255',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'postion' => 'nullable|string|min:0|max:255',
            'ordered' => 'nullable|string|min:0|max:255',
            'status' => 'nullable|string|min:0|max:255',
            'link' => 'nullable|string|min:0|max:255',
        ];


        $data = $request->validate($rules);


        if ($image = $request->file('photo')) {
            $destinationPath = 'image/sponsor/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['photo'] = "$profileImage";
        } else {
            unset($data['photo']);
        }


        return $data;
    }

}
