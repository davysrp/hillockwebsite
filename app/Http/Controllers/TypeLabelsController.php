<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Label;
use App\Models\Type;
use App\Models\TypeLabel;
use Illuminate\Http\Request;
use Exception;

class TypeLabelsController extends Controller
{

    /**
     * Display a listing of the type labels.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $typeLabels = TypeLabel::with('type','label')->paginate(25);

        return view('type_labels.index', compact('typeLabels'));
    }

    /**
     * Show the form for creating a new type label.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $types = Type::pluck('name','id')->all();
$labels = Label::pluck('name','id')->all();
        
        return view('type_labels.create', compact('types','labels'));
    }

    /**
     * Store a new type label in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            TypeLabel::create($data);

            return redirect()->route('type_labels.type_label.index')
                ->with('success_message', 'Type Label was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified type label.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $typeLabel = TypeLabel::with('type','label')->findOrFail($id);

        return view('type_labels.show', compact('typeLabel'));
    }

    /**
     * Show the form for editing the specified type label.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $typeLabel = TypeLabel::findOrFail($id);
        $types = Type::pluck('name','id')->all();
$labels = Label::pluck('name','id')->all();

        return view('type_labels.edit', compact('typeLabel','types','labels'));
    }

    /**
     * Update the specified type label in the storage.
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
            
            $typeLabel = TypeLabel::findOrFail($id);
            $typeLabel->update($data);

            return redirect()->route('type_labels.type_label.index')
                ->with('success_message', 'Type Label was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified type label from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $typeLabel = TypeLabel::findOrFail($id);
            $typeLabel->delete();

            return redirect()->route('type_labels.type_label.index')
                ->with('success_message', 'Type Label was successfully deleted.');
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
                'type_id' => 'nullable',
            'label_id' => 'nullable', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
