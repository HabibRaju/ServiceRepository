<?php

namespace App\Contracts;

interface BaseRepositoryInterface
{
    public function findOrFail($ids);

    public function getAll();

    public function save(array $data);

    public function update($id, $data = []);

    public function delete($id);

    public function getModel();
}
