<?php


namespace App\Repositories\E_learning;

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
            'nm_mhs' => ucwords($request->input('nm_mhs')),
            'jk' => $request->input('jk'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('nim')),
            'kd_login' => '1',
        ];
    }
}