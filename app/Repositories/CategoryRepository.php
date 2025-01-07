<?php

namespace App\Repositories;
use App\Interfaces\RepositoriesInterface;
use App\Models\Category;


class CategoryRepository implements RepositoriesInterface
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
        return Category::with(['children','parent'])->paginate(10);
    }

    public function getById($id) : Category
    {
        return Category::findOrFail($id);
    }

    public function store(array $data) : Category
    {
        return Category::create($data);
    }

    public function update(array $data,$id) : Category
    {
        $Category = $this->getById($id);
        $Category->update($data);
        return $Category;
    }

    public function delete($id) : bool
    {
        $Category = $this->getById($id);
        return $Category->delete() > 0;
    }

    public function getParents(){
        return Category::whereNull('parent_id')->get();
    }

    public function getChildren($id)
    {
        return Category::where('parent_id', $id)->get();
    }
}
