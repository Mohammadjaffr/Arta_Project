<?php

namespace App\Repositories;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use App\Interfaces\RepositoriesInterface;


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
        if(!empty($data['image'])){
            $extions=$data['image']->getclientoriginalextension();
            $filename = uniqid('',true).'.'.$extions;
            $File_path = Storage::putFileAs('Category_images',$data['image'],$filename);
            $File_path ='storage/'.$File_path;
            $data['image']=$File_path;
        }
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
