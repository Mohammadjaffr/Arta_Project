<?php

namespace App\Http\Controllers\web;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CommentRepository;

class CommentController extends Controller
{
     /**
     * Create a new class instance.
    */
    public function __construct(private CommentRepository $CommentRepository)
    {
        //
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Comment::query()->paginate(3);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
