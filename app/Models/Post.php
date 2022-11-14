<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
  use HasFactory, Sluggable;

  protected $guarded = ['id'];
  protected $with = ['author', 'category'];

  public function getRouteKeyName()
  {
    return 'slug';
  }

  public function scopeFilter($query, array $filters)
  {
    $query->when($filters['search'] ?? false, fn ($query, $search) =>
    $query->where('title', 'like', '%' . $search . '%')
      ->orWhere('body', 'like',  '%' . $search . '%'));

    $query->when($filters['category'] ?? false, fn ($query, $category) =>
    $query->whereHas('category', fn ($query) =>
    $query->where('slug', $category)));

    $query->when($filters['author'] ?? false, fn ($query, $author) =>
    $query->whereHas('author', fn ($query) =>
    $query->where('userName', $author)));
  }

  public function category()
  {
    return $this->belongsTo(Category::class);
  }

  public function author()
  {
    return $this->BelongsTo(User::class, 'user_id');
  }

  /**
   * Return the sluggable configuration array for this model.
   *
   * @return array
   */
  public function sluggable(): array
  {
    return [
      'slug' => [
        'source' => 'title'
      ]
    ];
  }
}
