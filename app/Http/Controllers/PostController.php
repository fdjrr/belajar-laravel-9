<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
  public function index()
  {
    $title = 'All Posts';

    if (request('category')) {
      $category = Category::firstWhere('slug', request('category'));
      $title = $title . ' in ' . $category->name;
    }

    if (request('author')) {
      $author = User::firstWhere('username', request('author'));
      $title = $title . ' by ' . $author->name;
    }

    return view('posts.posts', [
      'title' => $title,
      'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString(),
    ]);
  }

  public function show(Post $post)
  {
    return view('posts.post', [
      'title' => 'Post by Author : ' . $post->title,
      'post' => $post,
    ]);
  }
}
