<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\MahasiswaRepository;
use Exception;

class MahasiswaController extends Controller
{
    protected $repository;
  
    public function __construct(MahasiswaRepository $repository)
    {
        $this->repository = $repository;
    }
  
    public function index(Request $request)
    {
        $items = $this->repository->paginate($request);
        return view('data_master.mahasiswa.index',compact('items'));
    }
  
    public function create()
    {
        return view('data_master.mahasiswa.create');
    }
    
    public function store(Request $request)
    {
        try {
            $item = $this->repository->store($request);
            return redirect(('mahasiswa'));
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }
    
    public function edit($id)
    {
        $item = $this->repository->show($id);
        return view('data_master.mahasiswa.edit',compact('item'));
    }

    public function update($id, Request $request)
    {
        try {
            $item = $this->repository->update($id, $request);
            return redirect('mahasiswa');
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
            return redirect('mahasiswa');
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getStatus());
        }
    }
}
