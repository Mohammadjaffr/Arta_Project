<?php

namespace App\Repositories;
use App\Models\image;
use App\Models\Region;
use App\Models\listing;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Interfaces\RepositoriesInterface;

use function PHPUnit\Framework\isNull;

class ListingRepository implements RepositoriesInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    
    public function index($region_id = null, $category_id = null)
    {
        $query = Listing::query();
        
        if ($region_id) {
            $region = Region::with('children')->find($region_id);
            if ($region) {
                $regionIds = $region->children()->pluck('id')->push($region->id);
                $allRegionIds = Region::whereIn('parent_id', $regionIds)->pluck('id');
                $regionIds = $regionIds->merge($allRegionIds);
                $query->whereIn('region_id', $regionIds);
            }
        }

        if ($category_id) {
            $category = Category::with('children')->find($category_id);
            if ($category) {
                $categoryIds = $category->children()->pluck('id')->push($category->id);
                $allCategoryIds = Category::whereIn('parent_id', $categoryIds)->pluck('id');
                $categoryIds = $categoryIds->merge($allCategoryIds);
                $query->whereIn('category_id', $categoryIds);
            }
        }

        return $query->with(['user:id,name,username,email,contact_number,whatsapp_number','category:id,name','region:id,name','images','comments.user'])->filter()->paginate(10);
    }
    
    public function getById($id) : listing
    {
        return listing::with(['user','category','region','images','comments'])->findOrFail($id);
    }

    public function store(array $data) : listing
    {
        $extions=$data['primary_image']->getclientoriginalextension();
        $filename = uniqid('',true).'.'.$extions;
        $File_path = Storage::putFileAs('Primary_images',$data['primary_image'],$filename);
        $File_path ='storage/'.$File_path;
        $data['primary_image']=$File_path;
        return listing::create($data);
    }

    public function update(array $data,$id) : listing
    {
        $listing = $this->getById($id);
        if(isset($data['primary_image']) && !empty($data['primary_image'])){
            if (\File::exists($listing->primary_image)) {
                \File::delete($listing->primary_image);
            }
            $extions=$data['primary_image']->getclientoriginalextension();
            $filename = uniqid('',true).'.'.$extions;
            $File_path = Storage::putFileAs('Primary_images',$data['primary_image'],$filename);
            $File_path ='storage/'.$File_path;
            $data['primary_image']=$File_path;
        }
        else {
            unset($data['primary_image']);
        }
        $listing->update($data);
        return $listing;
    }

    public function delete($id) : bool
    {
     return DB::transaction(function () use ($id){
        $listing = $this->getById($id);
        if (\File::exists($listing->primary_image)) {
            \File::delete($listing->primary_image);
        }
        foreach ($listing->images as $image) {
            if (\File::exists($image->path)) {
                \File::delete($image->path);
            }
            $image->delete();
        }
        return $listing->delete() > 0;
     });
       
    }

    public function saveImages($images,$listing_id){
        foreach($images as $image) {
            $extions = $image->getclientoriginalextension();
            $filename = uniqid('',true).'.'.$extions;
            $File_path = Storage::putFileAs('images',$image,$filename);
            $File_path ='storage/'.$File_path;
            image::create([
                'listing_id' => $listing_id,
                'path'=>$File_path
            ]);
        }
    }
}
