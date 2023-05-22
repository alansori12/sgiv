<?php

namespace App\Http\Controllers\E_Jurnal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\E_Jurnal\MahasiswaRepository1;
use App\Models\Jurnal;
use Exception;
use Auth;
use Hash;

class MahasiswaController1 extends Controller
{
    protected $repository;
  
    public function __construct(MahasiswaRepository1 $repository)
    {
        $this->repository = $repository;
    }
  
    public function index(Request $request)
    {
        $items = $this->repository->paginate($request);
        return view('e_jurnal.admin.mahasiswa.index',compact('items'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|numeric|digits:9|unique:mahasiswa,nim',
            'nm_mhs' => 'required',
            'jk' => 'required',
            'email' => 'required|email|unique:mahasiswa,email',
            'status' => 'required',
        ],[
            'nim.required' => 'Kolom NIM wajib diisi.',
            'nim.numeric' => 'NIM harus berupa angka.',
            'nim.digits' => 'NIM harus :digits digit.',
            'nim.unique' => 'NIM sudah digunakan.',
            'nm_mhs.required' => 'Kolom nama wajib diisi.',
            'nm_mhs.max' => 'Nama tidak boleh lebih dari :max karakter.',
            'email.required' => 'Kolom email wajib diisi.',
            'email.email' => 'Email harus alamat email yang valid.',
            'email.unique' => 'Email sudah digunakan.',
        ]);

        try {
            $item = $this->repository->store($request);
            return redirect()->route('admin1.mahasiswa')->with('success','Data telah disimpan.');
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }
    
    public function edit($id)
    {
        return $id;
        $item = $this->repository->show($id);
        return view('e_jurnal.admin.mahasiswa.edit',compact('item'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'nim' => 'required|numeric|digits:9',
            'nm_mhs' => 'required|max:50',
            'email' => 'required|email',
        ],[
            'nim.required' => 'Kolom NIM wajib diisi.',
            'nim.numeric' => 'NIM harus berupa angka.',
            'nim.digits' => 'NIM harus :digits digit.',
            'nm_mhs.required' => 'Kolom nama wajib diisi.',
            'nm_mhs.max' => 'Nama tidak boleh lebih dari :max karakter.',
            'email.required' => 'Kolom email wajib diisi.',
            'email.email' => 'Email harus alamat email yang valid.',
        ]);

        try {
            $item = $this->repository->update($id, $request);
            return redirect()->route('admin1.mahasiswa')->with('success','Data telah diupdate.');
        } catch (Exception $e) {
           return response()->json(['message' => $e->getMessage()], $e->getStatus());
        }
    }
  
    public function delete($id)
    {
        try {
            $this->repository->delete($id);
            return redirect()->route('admin1.mahasiswa')->with('success','Data telah dihapus.');
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getStatus());
        }
    }

    public function postlogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:mahasiswa,email',
            'password' => 'required|min:6',
        ],[
            'email.required' => 'Silahkan masukan email.',
            'email.email' => 'Email harus alamat email yang valid.',
            'email.exists' => 'Email tidak terdaftar pada sistem.',
            'password.required' => 'Silahkan masukan password.',
            'password.min' => 'Masukan password minimal :min karakter.',
        ]);
        if(Auth::guard('mahasiswa')->attempt($request->only('email','password'))){
            return redirect()->route('mahasiswa1.home');
        }else{
            return redirect()->route('mahasiswa1.login')->with('error','Login Gagal !');
        }
    }

    public function home()
    {
        $items = Auth::guard('mahasiswa')->user()->id;
        $file=Jurnal::orderBy('tanggal','desc')->paginate(5)->where('status', 'posted');
        return view('e_jurnal.mahasiswa.home',compact('file'));
    }

    public function tentang(){
        return view('e_jurnal.mahasiswa.about');
    }


    public function logout()
    {
        Auth::guard('mahasiswa')->logout();
        return redirect('/index');
    }

    public function updateps(Request $request)
    {
        $request->validate([
            'pslama' => 'required|min:6',
            'psbaru' => 'required|min:6',
            'konps' => 'required|same:psbaru',
        ],[
            'pslama.required' => 'Kolom password lama wajib diisi.',
            'pslama.min' => 'Kolom password lama minimal 6 karakter.',
            'psbaru.required' => 'Kolom password baru wajib diisi.',
            'psbaru.min' => 'Kolom password baru minimal 6 karakter.',
            'konps.required' => 'Kolom konfirmasi password baru wajib diisi.',
            'konps.same' => 'Konfirmasi password dan password lama harus sama.',
        ]);
        try {
            $current_user = auth()->user();
            if(Hash::check($request->pslama,$current_user->password)){
                $current_user->update([
                    'password' => bcrypt($request->psbaru)
                ]);
                return redirect()->back()->with('success','Password Berhasil Diupdate');
            }else{
                return redirect()->back()->with('error','Password lama tidak cocok');;
            }
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getStatus());
        }
    }
}
