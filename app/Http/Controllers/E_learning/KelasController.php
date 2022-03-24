<?php

namespace App\Http\Controllers\E_learning;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\E_learning\KelasRepository;
use Exception;

class KelasController extends Controller
{
    protected $repository;
  
    public function __construct(KelasRepository $repository)
    {
        $this->repository = $repository;
    }
  
    public function index(Request $request)
    {
        $items = $this->repository->paginate($request);
        return view('e_learning.admin.kelas.index',compact('items'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|numeric|digits:9|unique:mahasiswa,nim',
            'nm_mhs' => 'required|max:50',
            'jk' => 'required',
            'email' => 'required|email|unique:mahasiswa,email',
        ],[
            'nm_mhs.required' => 'The name field is required.',
            'jk.required' => 'The gender field is required.',
        ]);

        try {
            $item = $this->repository->store($request);
            return redirect()->route('admin.mahasiswa')->with('success','Data berhasil disimpan.');
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }
}
