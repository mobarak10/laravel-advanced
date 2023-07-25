<?php

namespace App\Repositories;

interface CustomerRepositoryInterface
{
    public function all();

    public function findById(string $id);

    public function update(string $id);

    public function delete(string $id);
}
