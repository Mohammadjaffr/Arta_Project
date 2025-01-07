<?php

namespace App\Repositories;
use App\Interfaces\RepositoriesInterface;
use App\Models\Complaint;


class ComplaintRepository implements RepositoriesInterface
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
        return Complaint::filter()->paginate(10);
    }
    
    public function getById($id) : Complaint
    {
        return Complaint::findOrFail($id);
    }

    public function store(array $data) : Complaint
    {
        return Complaint::create($data);
    }

    public function update(array $data,$id) : Complaint
    {
        $Complaint = $this->getById($id);
        $Complaint->update($data);
        return $Complaint;
    }

    public function delete($id) : bool
    {
        $Complaint = $this->getById($id);
        return $Complaint->delete() > 0;
    }
}
