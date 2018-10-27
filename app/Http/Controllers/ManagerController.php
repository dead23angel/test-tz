<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use App\News;
use Illuminate\Support\Facades\Auth;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::ofUser(Auth::user()->id)
            ->with('category')
            ->orderBy('id')
            ->get();

        return view('manager.list', ['news' => $news]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manager.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  NewsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        if (News::create($request->all())) {
            session()->flash('message', 'Successfully created news');
            return redirect()->route('manager.index');
        }

        session()->flash('message', 'Error created news');
        return redirect()->route('manager.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::find($id);

        if (!$news) {
            session()->flash('message', 'News not found');
            return redirect()->route('manager.index');
        }

        return view('manager.edit', ['new' => $news]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  NewsRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsRequest $request, $id)
    {
        $news = News::find($id);

        if (!$news) {
            session()->flash('message', 'News not found');
            return redirect()->back()->withInput();
        }

        if ($news->update($request->all())) {
            session()->flash('message', 'Successfully updated news');
            return redirect()->route('manager.index');
        }

        session()->flash('message', 'Error updated news');
        return redirect()->back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::find($id);

        if (!$news) {
            session()->flash('message', 'News not found');
            return redirect()->route('manager.index');
        }

        if ($news->delete()) {
            session()->flash('message', 'Successfully deleted news');
            return redirect()->route('manager.index');
        }

        session()->flash('message', 'Error deleted news');
        return redirect()->route('manager.index');
    }
}
