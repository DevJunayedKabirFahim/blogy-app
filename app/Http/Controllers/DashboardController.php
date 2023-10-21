<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private $blogs, $categories, $publishedCount, $unPublishedCount;
    public function index()
    {
        $this->blogs = Blog::countBlog();
        $this->categories = Category::countCategory();
        $this->publishedCount = Blog::countPublishedBlogs();
        $this->unPublishedCount = Blog::countUnpublishedBlogs();
        return view('admin.home.index', [
            'categoriesNumber' => $this->categories,
            'blogsNumber' => $this->blogs,
            'publishedNumber' => $this->publishedCount,
            'unPublishedNumber' => $this->unPublishedCount
        ]);
    }
}
