<?php


namespace App\Repositories\E_learning;

use App\Models\Kelas;
use App\AppRoot\Repo\AppRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KelasRepository extends AppRepository
{
    protected $model;
    
    public function __construct(Kelas $model)
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
            'kd_kls' => Str::random(7)->unique(),
            'nm_kls' => ucwords($request->input('nm_kls')),
            'nm_dsn' => $request->input('nm_dsn'),
        ];
    }
}