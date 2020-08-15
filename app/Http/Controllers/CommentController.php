<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentStoreRequest;
use App\Models\Comment;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CommentController extends WebController
{


    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Publication $publication)
    {
        $data = [];
        $data['comments'] = $publication->comments()->with('user')->get();
        $data['publication'] = $publication;
        return view('comments.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentStoreRequest $request, Publication $publication)
    {

        if (Gate::denies('create-comment', $publication)) {
            // return abort(403, 'Unhautorized');
            alert('Oops!', 'Ya registraste un comentario en esta publicación', 'warning');
            return redirect()->route('publications.comments.index', $publication->id);
        }

        $title = null;
        $text = null;
        $type = null;
        $success = true;

        try {
            Comment::create([
                'publication_id' => $publication->id,
                'content' => $request->content,
                'user_id' => auth()->user()->id
            ]);
        } catch (\Exception $e) {
            $success = false;
            $title = 'Oops!';
            $text = $e->getMessage();
            $type = 'error';
        }

        if ($success) {
            $title = 'Bien Hecho!';
            $text = 'Tu comentario fue agregado correctamente';
            $type = 'success';
        }

        alert($title, $text, $type);
        return redirect()->route('publications.comments.index', $publication->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
