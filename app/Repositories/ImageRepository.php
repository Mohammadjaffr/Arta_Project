<?php

namespace App\Repositories;
use Faker\Core\File;
use App\Models\image;
use Illuminate\Support\Facades\Storage;
use App\Interfaces\RepositoriesInterface;

class ImageRepository implements RepositoriesInterface
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
        return image::paginate(10);
    }

    public function getById($id) : image
    {
        return image::findOrFail($id);
    }

    public function store(array $data) : image
    {
        $extions = $data['image']->getclientoriginalextension();
        $filename = uniqid('',true).'.'.$extions;
        $File_path = Storage::putFileAs('images',$data['image'],$filename);
        $File_path ='storage/'.$File_path;
        $data['path']=$File_path;
        return image::create($data);
    }

    public function update(array $data,$id) : image
    {
        $image = $this->getById($id);
        if (\File::exists($image->path)) {
            \File::delete($image->path);
        }
        $extions = $data['image']->getclientoriginalextension();
        $filename = uniqid('',true).'.'.$extions;
        $File_path = Storage::putFileAs('images',$data['image'],$filename);
        $File_path ='storage/'.$File_path;
        $image->update([
            'path'=>$File_path
        ]);
        return $image;
    }

    public function delete($id) : bool
    {
        $image = $this->getById($id);
        if (\File::exists($image->path)) {
            \File::delete($image->path);
        }
        return $image->delete() > 0;
    }
}
