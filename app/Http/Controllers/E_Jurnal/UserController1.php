<?php

namespace App\Http\Controllers\E_Jurnal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\E_Jurnal\UserRepository;
use Exception;
use Auth;

class UserController1 extends Controller
{
    protected $repository;
  
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }
  
    public function index(Request $request)
    {
        $items = $this->repository->paginate($request);
        return view('e_jurnal.admin.users.index',compact('items'));
    }
  
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:15',
            'cpassword' => 'required|same:password',
        ],[
            'name.required' => 'Kolom nama wajib diisi.',
            'name.max' => 'Nama tidak boleh lebih dari :max karakter.',
            'email.required' => 'Kolom email wajib diisi.',
            'email.email' => 'Email harus alamat email yang valid.',
            'email.unique' => 'Email sudah digunakan.',
            'password.required' => 'Kolom password wajib diisi.',
            'password.min' => 'Password harus minimal :min karakter.',
            'password.max' => 'Password tidak boleh lebih dari :max karakter.',
            'cpassword.required' => 'Kolom konfirmasi password wajib diisi.',
            'cpassword.same' => 'Konfirmasi password dan password harus sama.',
        ]);

        try {
            $item = $this->repository->store($request);
            return redirect()->route('admin.user')->with('success','Data telah disimpan.');
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $item = $this->repository->show($id);
        return view('e_learning.admin.users.edit',compact('item'));
    }
  
    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email',
        ],[
            'name.required' => 'Kolom nama wajib diisi.',
            'name.max' => 'Nama tidak boleh lebih dari :max karakter.',
            'email.required' => 'Kolom email wajib diisi.',
            'email.email' => 'Email harus alamat email yang valid.',
        ]);

        try {
            $item = $this->repository->update($id, $request);
            return redirect()->route('admin.user')->with('success','Data telah diupdate.');
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
            return redirect()->route('admin.user')->with('success','Data telah dihapus.');
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getStatus());
        }
    }

    public function postlogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6',
        ],[
            'email.required' => 'Silahkan masukan email.',
            'email.email' => 'Email harus alamat email yang valid.',
            'email.exists' => 'Email tidak terdaftar pada sistem.',
            'password.required' => 'Silahkan masukan password.',
            'password.min' => 'Masukan password minimal :min karakter.',
        ]);
        if(Auth::guard('web')->attempt($request->only('email','password'))){
            return redirect()->route('admin1.home');
        }else{
            return redirect()->route('admin1.login')->with('error','Login Gagal !');
        }
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }
}
