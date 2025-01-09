<?php

namespace App\Repositories;
use App\Interfaces\RepositoriesInterface;
use App\Models\Permission;


class PermissionRepository implements RepositoriesInterface
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
        return Permission::paginate(10);
    }
    
    public function getById($id) : ?Permission
    {
        return Permission::findOrFail($id);
    }

    public function store(array $data) : Permission
    {
        return Permission::create($data);
    }

    public function update(array $data,$id) : ?Permission
    {
        $Permission = $this->getById($id);
        $Permission->update($data);
        return $Permission;
    }

    public function delete($id) : bool
    {
        $Permission = $this->getById($id);
        return $Permission->delete() > 0;
    }
}
