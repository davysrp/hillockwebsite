<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Exception;

class PromotionsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the promotions.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $promotions = Promotion::paginate(25);

        return view('promotions.index', compact('promotions'));
    }

    /**
     * Show the form for creating a new promotion.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {


        return view('promotions.create');
    }

    /**
     * Store a new promotion in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {


            $data = $this->getData($request);
            Promotion::create($data);

            return redirect()->route('promotions.promotion.index')
                ->with('success_message', 'Promotion was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified promotion.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $promotion = Promotion::findOrFail($id);

        return view('promotions.show', compact('promotion'));
    }

    /**
     * Show the form for editing the specified promotion.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $promotion = Promotion::findOrFail($id);


        return view('promotions.edit', compact('promotion'));
    }

    /**
     * Update the specified promotion in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {

            var_dump($request->photo);
            $promotion = Promotion::findOrFail($id);
            if ($request->photo != '') {
                $path = public_path()."/image/promotion/".$promotion->photo;
                unlink($path);
            }

            $data = $this->getData($request);
            $promotion->update($data);

            return redirect()->route('promotions.promotion.index')
                ->with('success_message', 'Promotion was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }

    }

    /**
     * Remove the specified promotion from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $promotion = Promotion::findOrFail($id);

            $path = public_path()."/image/promotion/".$promotion->photo;
            if(file_exists($path)){
                unlink($path);
            }
            $promotion->delete();


            return redirect()->route('promotions.promotion.index')
                ->with('success_message', 'Promotion was successfully deleted.');
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
            'status' => 'nullable|string|min:0|max:255',
            'description' => 'nullable',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
        $data = $request->validate($rules);

        if ($image = $request->file('photo')) {
            $destinationPath = 'image/promotion/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['photo'] = "$profileImage";
        }else{
            unset($data['photo']);
        }

        return $data;
    }


}
