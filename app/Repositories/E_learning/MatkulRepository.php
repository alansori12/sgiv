<?php


namespace App\Repositories\E_learning;

use App\Models\Matkul;
use App\AppRoot\Repo\AppRepository;
use Illuminate\Http\Request;

class MatkulRepository extends AppRepository
{
    protected $model;
    
    public function __construct(Matkul $model)
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
            'kode' => strtoupper($request->input('kode')),
            'matkul' => ucwords($request->input('matkul')),
            'sks' => $request->input('sks'),
            'semester' => $request->input('semester'),
        ];
    }
}