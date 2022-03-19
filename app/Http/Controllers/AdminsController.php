<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Exception;

class AdminsController extends Controller
{

    /**
     * Display a listing of the admins.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $admins = Admin::paginate(25);

        return view('admins.index', compact('admins'));
    }

    /**
     * Show the form for creating a new admin.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('admins.create');
    }

    /**
     * Store a new admin in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Admin::create($data);

            return redirect()->route('admins.admin.index')
                ->with('success_message', 'Admin was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified admin.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $admin = Admin::findOrFail($id);

        return view('admins.show', compact('admin'));
    }

    /**
     * Show the form for editing the specified admin.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        

        return view('admins.edit', compact('admin'));
    }

    /**
     * Update the specified admin in the storage.
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
            
            $admin = Admin::findOrFail($id);
            $admin->update($data);

            return redirect()->route('admins.admin.index')
                ->with('success_message', 'Admin was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified admin from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $admin = Admin::findOrFail($id);
            $admin->delete();

            return redirect()->route('admins.admin.index')
                ->with('success_message', 'Admin was successfully deleted.');
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
                'name' => 'required|string|min:1|max:255',
            'email' => 'required|string|min:1|max:255',
            'email_verified_at' => 'nullable|date_format:j/n/Y g:i A',
            'password' => 'required|string|min:1|max:255',
            'remember_token' => 'nullable|string|min:0|max:100',
            'type' => 'nullable|string|min:0|max:255',
            'phonenumber' => 'nullable|numeric|string|min:0|max:255', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
