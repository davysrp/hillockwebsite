<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Exception;

class BlogCategoriesController extends Controller
{

    /**
     * Display a listing of the blog categories.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $blogCategories = BlogCategory::paginate(25);

        return view('blog_categories.index', compact('blogCategories'));
    }

    /**
     * Show the form for creating a new blog category.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {


        return view('blog_categories.create');
    }

    /**
     * Store a new blog category in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            BlogCategory::create($data);

            return redirect()->route('blog_categories.blog_category.index')
                ->with('success_message', 'Blog Category was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified blog category.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $blogCategory = BlogCategory::findOrFail($id);

        return view('blog_categories.show', compact('blogCategory'));
    }

    /**
     * Show the form for editing the specified blog category.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $blogCategory = BlogCategory::findOrFail($id);


        return view('blog_categories.edit', compact('blogCategory'));
    }

    /**
     * Update the specified blog category in the storage.
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

            $blogCategory = BlogCategory::findOrFail($id);
            $blogCategory->update($data);

            return redirect()->route('blog_categories.blog_category.index')
                ->with('success_message', 'Blog Category was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified blog category from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $blogCategory = BlogCategory::findOrFail($id);
            $blogCategory->delete();

            return redirect()->route('blog_categories.blog_category.index')
                ->with('success_message', 'Blog Category was successfully deleted.');
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
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable',
        ];


        $data = $request->validate($rules);

        if ($image = $request->file('photo')) {
            $destinationPath = 'image/blogcategory/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['photo'] = "$profileImage";
        } else {
            unset($data['photo']);
        }


        return $data;
    }

}
