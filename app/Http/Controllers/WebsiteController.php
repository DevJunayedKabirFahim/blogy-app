<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    private $blogs, $blog, $categories;
    public function index()
    {
        $this->blogs = Blog::where('status', 1)->orderBy('id', 'desc')->take(6)->get(['id', 'image', 'title']);
        return view('website.home.index', ['blogs' => $this->blogs]);
    }

    public function category($id)
    {
        $this->blogs = Blog::where(['category_id' => $id, 'status' => 1])->orderBy('id', 'desc')->get();
        return view('website.category.index', ['blogs' => $this->blogs]);
    }

    public function detail($id)
    {
        $this->blog = Blog::find($id);
        return view('website.detail.index', ['blog' => $this->blog]);
    }
}
