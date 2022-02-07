<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\DosenRepository;
use Exception;

class DosenController extends Controller
{
    protected $repository;
  
    public function __construct(DosenRepository $repository)
    {
        $this->repository = $repository;
    }
  
    public function index(Request $request)
    {
        $items = $this->repository->paginate($request);
        return view('data_master.dosen.index',compact('items'));
    }
  
    public function create()
    {
        return view('data_master.dosen.create');
    }
    
    public function store(Request $request)
    {
        $message = [
            'required' => 'Silahkan isi bidang ini.',
            'numeric' => 'Silahkan masukan angka.',
            'email' => 'Silahkan masukan alamat email.',
        ];

        $request->validate([
            'nidn' => 'required',
            'nm_dsn' => 'required',
            'jk' => 'required',
            'tgl_lahir' => 'required',
            'email' => 'required | email',
            'no_wa' => 'required | numeric',
            'alamat' => 'required',
        ],$message);

        try {
            $item = $this->repository->store($request);
            return redirect(('dosen'));
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }
    
    public function edit($id)
    {
        $item = $this->repository->show($id);
        return view('data_master.dosen.edit',compact('item'));
    }

    public function update($id, Request $request)
    {
        try {
            $item = $this->repository->update($id, $request);
            return redirect('dosen');
        } catch (Exception $e) {
           return response()->json(['message' => $e->getMessage()], $e->getStatus());
        }
    }
  
    public function show($id)
    {
        try {
            $item = $this->repository->show($id);
            return response()->json(['item' => $item]);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getStatus());
        }
    }

    public function delete($id)
    {
        try {
            $this->repository->delete($id);
            return redirect('dosen');
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getStatus());
        }
    }
}
