<?php


namespace App\Repositories;

use App\Models\Mahasiswa;
use App\AppRoot\Repo\AppRepository;
use Illuminate\Http\Request;

class MahasiswaRepository extends AppRepository
{
    protected $model;
    
    public function __construct(Mahasiswa $model)
    {
        $this->model = $model;
    }
    
    /**
     * set payload data for posts table.
     * 
     * @param Request $request [description]
     * @return array of data for saving.
     */
    protected function setDataPayload(Request $request)
    {
        return [
            'nim' => $request->input('nim'),
            'nm_mhs' => $request->input('nm_mhs'),
            'jk' => $request->input('jk'),
            'thn_masuk' => $request->input('thn_masuk'),
            'semester' => $request->input('semester'),
            'tmp_lahir' => $request->input('tmp_lahir'),
            'tgl_lahir' => $request->input('tgl_lahir'),
            'agama' => $request->input('agama'),
            'alamat' => $request->input('alamat'),
        ];
    }
}