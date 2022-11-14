<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
  public function show(User $author)
  {
    return view('posts.posts', [
      'title' => 'Post by Author : ' . $author->name,
      'author' => $author,
      'posts' => $author->posts->load('category', 'author'),
    ]);
  }
}
