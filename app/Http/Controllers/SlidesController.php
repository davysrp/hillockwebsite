<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Slide;
use Illuminate\Http\Request;
use Exception;

class SlidesController extends Controller
{

    /**
     * Display a listing of the slides.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $slides = Slide::paginate(25);

        return view('slides.index', compact('slides'));
    }

    /**
     * Show the form for creating a new slide.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {


        return view('slides.create');
    }

    /**
     * Store a new slide in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

           /* $data = $this->getData($request);

            Slide::create($data);*/

            $destinationPath = 'image/gallery/';

            $images = $request->file('photos');
            if ($request->hasFile('photos')) :
                foreach ($images as $file):
                    $profileImage = rand(100000, 999999).date('YmdHis') . "." . $file->getClientOriginalExtension();
                    $file->move($destinationPath,$profileImage);
                    $data['photo'] = "$profileImage";
                    Slide::create([
                        'photo' => $profileImage,
                    ]);
                endforeach;
            endif;

            return redirect()->route('slides.slide.index')
                ->with('success_message', 'Slide was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified slide.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $slide = Slide::findOrFail($id);

        return view('slides.show', compact('slide'));
    }

    /**
     * Show the form for editing the specified slide.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $slide = Slide::findOrFail($id);


        return view('slides.edit', compact('slide'));
    }

    /**
     * Update the specified slide in the storage.
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

            $slide = Slide::findOrFail($id);
            $slide->update($data);

            return redirect()->route('slides.slide.index')
                ->with('success_message', 'Slide was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified slide from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $slide = Slide::findOrFail($id);
            $slide->delete();

            return redirect()->route('slides.slide.index')
                ->with('success_message', 'Slide was successfully deleted.');
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
                'photo' => 'nullable|file|string|min:0|max:255',
        ];


        $data = $request->validate($rules);




        return $data;
    }

}
