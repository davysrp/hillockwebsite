<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;

class BlogsController extends Controller
{

    /**
     * Display a listing of the blogs.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $blogs = Blog::with('blogcategory')->get();

        return view('blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new blog.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $blogCategories = BlogCategory::pluck('name','id')->all();

        return view('blogs.create', compact('blogCategories'));
    }

    /**
     * Store a new blog in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        /*try {

            $data = $this->getData($request);

            $blog=Blog::create($data);

            $request->validate([
                'addmore.*.name' => 'nullable|string',
                'addmore.*.vdoid' => 'nullable|string',
            ]);


            foreach ($request->addmore as $key => $value) {
                \DB::table('blog_videos')->insert([
                    'blog_id'=>$blog->id,
                    'name'=>$value['name'],
                    'video'=>$value['vdoid']
                ]);
            }


            return redirect()->route('blogs.blog.index')
                ->with('success_message', 'Blog was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }*/


        $data = $this->getData($request);

        $blog=Blog::create($data);

        $request->validate([
            'addmore.*.name' => 'nullable|string',
            'addmore.*.vdoid' => 'nullable|string',
        ]);


        foreach ($request->addmore as $key => $value) {
            \DB::table('blog_videos')->insert([
                'blog_id'=>$blog->id,
                'name'=>$value['name'],
                'video'=>$value['vdoid']
            ]);
        }


        return redirect()->route('blogs.blog.index')
            ->with('success_message', 'Blog was successfully added.');
    }

    /**
     * Display the specified blog.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $blog = Blog::with('blogcategory')->findOrFail($id);

        return view('blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified blog.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $blogCategories = BlogCategory::pluck('name','id')->all();

        return view('blogs.edit', compact('blog','blogCategories'));
    }

    /**
     * Update the specified blog in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        /*try {

            $data = $this->getData($request);

            $blog = Blog::findOrFail($id);
            $blog->update($data);

            return redirect()->route('blogs.blog.index')
                ->with('success_message', 'Blog was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }*/
        $data = $this->getData($request);

        $blog = Blog::findOrFail($id);
        $blog->update($data);


        DB::table('blog_videos')->where('blog_id',$id)->delete();

        $request->validate([
            'addmore.*.name' => 'nullable|string',
            'addmore.*.vdoid' => 'nullable|string',
        ]);


        foreach ($request->addmore as $key => $value) {
            if ($value['name'] != '' or $value['vdoid'] != '') {
                \DB::table('blog_videos')->insert([
                    'blog_id'=>$blog->id,
                    'name'=>$value['name'],
                    'video'=>$value['vdoid']
                ]);
            }

        }


        return redirect()->route('blogs.blog.index')
            ->with('success_message', 'Blog was successfully updated.');

    }

    /**
     * Remove the specified blog from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $blog = Blog::findOrFail($id);
            $blog->delete();

            return redirect()->route('blogs.blog.index')
                ->with('success_message', 'Blog was successfully deleted.');
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
            'photo2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'photo3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string',
            'onclick' => 'nullable|string',
            'header' => 'nullable|string',
            'coin' => 'nullable|string',
            'links' => 'nullable|string',
            'label' => 'nullable|string',
            'blog_category_id' => 'required|nullable',
        ];


        $data = $request->validate($rules);

        if ($image = $request->file('photo')) {
            $destinationPath = 'image/blog/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['photo'] = "$profileImage";
        } else {
            unset($data['photo']);
        }


        if ($image = $request->file('photo2')) {
            $destinationPath = 'image/blog/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['photo2'] = "$profileImage";
        } else {
            unset($data['photo2']);
        }
        if ($image = $request->file('photo3')) {
            $destinationPath = 'image/blog/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['photo3'] = "$profileImage";
        } else {
            unset($data['photo3']);
        }


        return $data;
    }

}
