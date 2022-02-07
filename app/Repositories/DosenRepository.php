<?php


namespace App\Repositories;

use App\Models\Dosen;
use App\AppRoot\Repo\AppRepository;
use Illuminate\Http\Request;

class DosenRepository extends AppRepository
{
    protected $model;
    
    public function __construct(Dosen $model)
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
            'nidn' => $request->input('nidn'),
            'nm_dsn' => $request->input('nm_dsn'),
            'jk' => $request->input('jk'),
            'tgl_lahir' => $request->input('tgl_lahir'),
            'email' => $request->input('email'),
            'no_wa' => $request->input('no_wa'),
            'alamat' => $request->input('alamat'),
        ];
    }
}