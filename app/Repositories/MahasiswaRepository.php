<?php
namespace App\Repositories;

use App\Models\Mahasiswa;

class MahasiswaRepository
{
    protected $mahasiswa;

    public function __construct(Mahasiswa $mahasiswa)
    {
        $this->mahasiswa = $mahasiswa;
    }

    public function getAll()
    {
        return $this->mahasiswa->all();
    }

    public function getById($id)
    {
        return $this->mahasiswa->find($id);
    }

    public function create($data)
    {
        return $this->mahasiswa->create($data);
    }

    public function update($id, $data)
    {
        $record = $this->mahasiswa->find($id);
        $record->update($data);
        return $record;
    }

    public function delete($id)
    {
        return $this->mahasiswa->destroy($id);
    }
}
