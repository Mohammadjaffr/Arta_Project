<?php

namespace App\Repositories;
use App\Interfaces\RepositoriesInterface;
use App\Models\Currency;


class CurrencyRepository implements RepositoriesInterface
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
        return Currency::paginate(10);
    }
    
    public function getById($id) : Currency
    {
        return Currency::findOrFail($id);
    }

    public function store(array $data) : Currency
    {
        return Currency::create($data);
    }

    public function update(array $data,$id) : Currency
    {
        $Currency = $this->getById($id);
        $Currency->update($data);
        return $Currency;
    }

    public function delete($id) : bool
    {
        $Currency = $this->getById($id);
        return $Currency->delete() > 0;
    }
}
