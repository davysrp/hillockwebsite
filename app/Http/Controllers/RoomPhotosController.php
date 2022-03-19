<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\RoomPhoto;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Exception;

class RoomPhotosController extends Controller
{

    /**
     * Display a listing of the room photos.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $roomPhotos = RoomPhoto::with('room')->paginate(25);

        return view('room_photos.index', compact('roomPhotos'));
    }

    /**
     * Show the form for creating a new room photo.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $rooms = Room::pluck('name','id')->all();

        return view('room_photos.create', compact('rooms'));
    }

    /**
     * Store a new room photo in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            RoomPhoto::create($data);

            return redirect()->route('room_photos.room_photo.index')
                ->with('success_message', 'Room Photo was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified room photo.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $roomPhoto = RoomPhoto::with('room')->findOrFail($id);

        return view('room_photos.show', compact('roomPhoto'));
    }

    /**
     * Show the form for editing the specified room photo.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $roomPhoto = RoomPhoto::findOrFail($id);
        $rooms = Room::pluck('name','id')->all();

        return view('room_photos.edit', compact('roomPhoto','rooms'));
    }

    /**
     * Update the specified room photo in the storage.
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

            $roomPhoto = RoomPhoto::findOrFail($id);
            $roomPhoto->update($data);

            return redirect()->route('room_photos.room_photo.index')
                ->with('success_message', 'Room Photo was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified room photo from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $roomPhoto = RoomPhoto::findOrFail($id);

            $destinationPath = 'image/room/';
            if(\File::exists(public_path($destinationPath.$roomPhoto->photo))){
                \File::delete(public_path($destinationPath.$roomPhoto->photo));
            }else{
                dd('File does not exists.');
            }

            $roomPhoto->delete();

            return redirect()->back()
                ->with('success_message', 'Room Photo was successfully deleted.');

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
            'room_id' => 'nullable',
        ];


        $data = $request->validate($rules);




        return $data;
    }

}
