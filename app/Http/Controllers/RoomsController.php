<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MenuBarGallery;
use App\Models\Room;
use App\Models\RoomPhoto;
use Illuminate\Http\Request;
use Exception;

class RoomsController extends Controller
{

    /**
     * Display a listing of the rooms.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $rooms = Room::paginate(25);

        return view('rooms.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new room.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {


        return view('rooms.create');
    }

    /**
     * Store a new room in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            $room=Room::create($data);
            $destinationPath = 'image/room/';

            $images = $request->file('photo_gallery');
            if ($request->hasFile('photo_gallery')) :
                foreach ($images as $file):
                    $profileImage = rand(100000, 999999).date('YmdHis') . "." . $file->getClientOriginalExtension();
                    $file->move($destinationPath,$profileImage);
                    RoomPhoto::create([
                        'room_id'=>$room->id,
                        'photo'=>$profileImage
                    ]);

                endforeach;
            endif;
            return redirect()->route('rooms.room.index')
                ->with('success_message', 'Room was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified room.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $roomPhotos = RoomPhoto::where('room_id',$id)->with('room')->paginate(25);
        return view('rooms.show', compact('roomPhotos'));
    }

    /**
     * Show the form for editing the specified room.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $room = Room::findOrFail($id);


        return view('rooms.edit', compact('room'));
    }

    /**
     * Update the specified room in the storage.
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

            $room = Room::findOrFail($id);
            $room->update($data);



            $destinationPath = 'image/room/';

            $images = $request->file('photo_gallery');
            if ($request->hasFile('photo_gallery')) :
                foreach ($images as $file):
                    $profileImage = rand(100000, 999999).date('YmdHis') . "." . $file->getClientOriginalExtension();
                    $file->move($destinationPath,$profileImage);
                    RoomPhoto::create([
                        'room_id'=>$id,
                        'photo'=>$profileImage
                    ]);

                endforeach;
            endif;


            return redirect()->route('rooms.room.index')
                ->with('success_message', 'Room was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified room from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $room = Room::findOrFail($id);
            $room->delete();

            return redirect()->route('rooms.room.index')
                ->with('success_message', 'Room was successfully deleted.');
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
            'photo' => 'nullable|file',
            'price' => 'nullable|string|min:0|max:255',
            'size' => 'nullable|string|min:0|max:255',
            'feature' => 'nullable|string|min:0|max:255',
            'amenities' => 'nullable|string',
            'complimentary' => 'nullable|string',
            'book_now' => 'nullable|string',
        ];


        $data = $request->validate($rules);

                if ($image = $request->file('photo')) {
                    $destinationPath = 'image/room/';
                    $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                    $image->move($destinationPath, $profileImage);
                    $data['photo'] = "$profileImage";
                } else {
                    unset($data['photo']);
                }


        return $data;
    }

}
