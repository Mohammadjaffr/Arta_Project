<?php

namespace App\Repositories;
use App\Interfaces\RepositoriesInterface;
use App\Models\Comment;


class CommentRepository implements RepositoriesInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    
    public function index() : \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return Comment::with(['user','listing'])->filter()->paginate(10);
    }
    
    public function getById($id) : Comment
    {
        return Comment::findOrFail($id);
    }

    public function store(array $data) : Comment
    {
        return Comment::create($data);
    }

    public function update(array $data,$id) : Comment
    {
        $Comment = $this->getById($id);
        $Comment->update($data);
        return $Comment;
    }

    public function delete($id) : bool
    {
        $Comment = $this->getById($id);
        return $Comment->delete() > 0;
    }
}
