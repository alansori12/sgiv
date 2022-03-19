<?php

namespace App\Http\Controllers\E_learning;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\E_learning\DosenRepository;
use Exception;
use Auth;

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
        return view('e_learning.admin.dosen.index',compact('items'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nidn' => 'required|numeric|digits:10|unique:dosen,nidn',
            'nm_dsn' => 'required|max:50',
            'jk' => 'required',
            'email' => 'required|email|unique:dosen,email',
            'jab_fungs' => 'max:30',
            'pend' => 'required|max:30',
        ],[
            'nm_dsn.required' => 'The name field is required.',
            'jk.required' => 'The gender field is required.',
            'pend.required' => 'The education field is required.',
        ]);

        try {
            $item = $this->repository->store($request);
            return redirect()->route('admin.dosen')->with('success','Data berhasil disimpan.');
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }
    
    public function edit($id)
    {
        $item = $this->repository->show($id);
        return view('e_learning.admin.dosen.edit',compact('item'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'nidn' => 'required|numeric|digits:10',
            'nm_dsn' => 'required|max:50',
            'jk' => 'required',
            'email' => 'required|email',
            'jab_fungs' => 'max:30',
            'pend' => 'required',
        ],[
            'nm_dsn.required' => 'The name field is required.',
            'jk.required' => 'The gender field is required.',
            'pend.required' => 'The education field is required.',
        ]);

        try {
            $item = $this->repository->update($id, $request);
            return redirect()->route('admin.dosen')->with('success','Data berhasil diupdate.');
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
            return redirect()->route('admin.dosen')->with('success','Data berhasil dihapus.');
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getStatus());
        }
    }

    public function postlogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:dosen,email',
            'password' => 'required|min:6|max:15',
        ],[
            'email.exists' => 'This email is not registered into our system.'
        ]);
        if(Auth::guard('dosen')->attempt($request->only('email','password'))){
            return redirect()->route('dosen.home');
        }else{
            return redirect()->route('dosen.login')->with('error','Email atau Password salah.');
        }
    }

    public function logout()
    {
        Auth::guard('dosen')->logout();
        return redirect('/');
    }
}
