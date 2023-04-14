<?php

namespace App\Repositories;

use App\Models\Kampus;

class KampusRepository
{
    protected $kampus;

    public function __construct(Kampus $kampus)
    {
        $this->kampus = $kampus;
    }

    public function getAll()
    {
        return $this->kampus->all();
    }

    public function getById($id)
    {
        return $this->kampus->find($id);
    }

    public function create($data)
    {
        return $this->kampus->create($data);
    }

    public function update($id, $data)
    {
        $record = $this->kampus->find($id);
        $record->update($data);
        return $record;
    }

    public function delete($id)
    {
        return $this->kampus->destroy($id);
    }
}
