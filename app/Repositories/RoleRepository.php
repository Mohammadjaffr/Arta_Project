<?php

namespace App\Repositories;
use App\Interfaces\RepositoriesInterface;
use App\Models\Role;


class RoleRepository implements RepositoriesInterface
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
        return Role::with('Permissions')->paginate(10);
    }
    
    public function getById($id) : ?Role
    {
        return Role::with('Permissions')->findOrFail($id);
    }

    public function store(array $data) : Role
    {
        $Role=Role::create($data);
        return $Role;
    }

    public function update(array $data,$id) : ?Role
    {
        $Role = $this->getById($id);
        $Role->update($data);
        return $Role;
    }

    public function delete($id) : bool
    {
        $Role = $this->getById($id);
        return $Role->delete() > 0;
    }
}
