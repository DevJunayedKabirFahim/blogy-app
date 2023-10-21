<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    private $categories, $blogs, $blog;
    public function index()
    {
        $this->categories = Category::all();
        return view('admin.blog.index', ['categories' => $this->categories]);
    }

    public function store(Request $request)
    {
        Blog::newBlog($request);
        return back()->with('message', 'Blog Created successfully.');
    }

    public function manage()
    {
        $this->blogs = Blog::all();
        return view('admin.blog.manage', ['blogs' => $this->blogs]);
    }

    public function edit($id)
    {
        $this->categories = Category::all();
        $this->blog = Blog::find($id);
        return view('admin.blog.edit', ['categories' => $this->categories,'blog' => $this->blog]);
    }

    public function update(Request $request, $id)
    {
        Blog::updateBlog($request, $id);
        return redirect('/blog/manage')->with('message', 'Blog info updated successfully');
    }

    public function destroy($id)
    {
        Blog::deleteBlog($id);
        return back()->with('message', 'Blog info deleted successfully');
    }
}
