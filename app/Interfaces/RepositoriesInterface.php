<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface RepositoriesInterface
{
    // public function index(): LengthAwarePaginator;
    public function getById($id ) : ?Model;
    public function store(array $data):Model;
    public function update(array $data,$id):?Model;
    public function delete($id): bool;
}
