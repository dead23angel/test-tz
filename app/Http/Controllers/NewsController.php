<?php

namespace App\Http\Controllers;

use App\Category;
use App\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::with(['category', 'user'])
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('news.list', ['news' => $news]);
    }

    public function category(Category $category)
    {
        $news = News::ofCategory($category->id)
            ->with(['category', 'user'])
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('news.list', ['news' => $news, 'category' => $category]);
    }

    public function show(News $news)
    {
        return view('news.show', ['new' => $news]);
    }
}
