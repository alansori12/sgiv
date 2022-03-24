<?php

namespace App\Http\Controllers\E_learning;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\E_learning\MahasiswaRepository;
use Exception;
use Auth;

class MahasiswaController extends Controller
{
    protected $repository;
  
    public function __construct(MahasiswaRepository $repository)
    {
        $this->repository = $repository;
    }
  
    public function index(Request $request)
    {
        $items = $this->repository->paginate($request)->where('kd_login', 1);
        return view('e_learning.admin.mahasiswa.index',compact('items'));
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
    
    public function edit($id)
    {
        $item = $this->repository->show($id);
        return view('e_learning.admin.mahasiswa.edit',compact('item'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'nim' => 'required|numeric|digits:9',
            'nm_mhs' => 'required|max:50',
            'jk' => 'required',
            'email' => 'required|email',
        ],[
            'nm_mhs.required' => 'The name field is required.',
            'jk.required' => 'The gender field is required.',
        ]);

        try {
            $item = $this->repository->update($id, $request);
            return redirect()->route('admin.mahasiswa')->with('success','Data berhasil diupdate.');
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
            return redirect()->route('admin.mahasiswa')->with('success','Data berhasil dihapus.');
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getStatus());
        }
    }

    public function postlogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:mahasiswa,email',
            'password' => 'required|min:6|max:15',
        ],[
            'email.exists' => 'This email is not registered into our system.'
        ]);
        if(Auth::guard('mahasiswa')->attempt($request->only('email','password'))){
            return redirect()->route('mahasiswa.home');
        }else{
            return redirect()->route('mahasiswa.login')->with('error','Login Gagal !');
        }
    }

    public function logout()
    {
        Auth::guard('mahasiswa')->logout();
        return redirect('/');
    }
}
