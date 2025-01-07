<?php

namespace App\Repositories;
use App\Interfaces\RepositoriesInterface;
use App\Models\region;


class RegionRepository implements RepositoriesInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    
    public function index(): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return region::with(['children','parent'])->paginate(10);
    }
    
    public function getById($id): region{
        return region::findOrFail($id);
    }

    public function store(array $data): region
    {
        return region::create($data);
    }

    public function update(array $data,$id): region{
        $region = $this->getById($id);
        $region->update($data);
        return $region;
    }

    public function delete($id) : bool
    {
        $region = $this->getById($id);
        return $region->delete() > 0;
    }

    public function getParents(){
        return Region::whereNull('parent_id')->get();
    }

    public function getChildren($id)
    {
        return Region::where('parent_id', $id)->get();
    }
}
