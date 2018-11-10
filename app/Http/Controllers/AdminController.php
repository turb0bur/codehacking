<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Post;

class AdminController extends Controller
{
    public function index()
    {
        $posts_count      = Post::count();
        $categories_count = Category::count();
        $comments_count   = Comment::count();

        return view('admin.index', compact('posts_count', 'categories_count', 'comments_count'));
    }
}
