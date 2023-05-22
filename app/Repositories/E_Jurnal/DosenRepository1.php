<?php


namespace App\Repositories\E_Jurnal;

use App\Models\Dosen;
use App\AppRoot\Repo\AppRepository;
use Illuminate\Http\Request;

class DosenRepository1 extends AppRepository
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
            'nm_dsn' => ucwords($request->input('nm_dsn')),
            'jk' => $request->input('jk'),
            'email' => $request->input('email'),
            'jab_fungs' => ucwords($request->input('jab_fungs')),
            'pend' => $request->input('pend'),
            'password' => bcrypt($request->input('nidn')),
        ];
    }
}