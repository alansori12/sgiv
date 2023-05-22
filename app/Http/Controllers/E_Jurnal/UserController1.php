<?php

namespace App\Http\Controllers\E_Jurnal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\E_Jurnal\UserRepository1;
use App\Models\logArtikel;
use App\Models\logSkripsi;
use App\Models\Jurnal;
use App\Models\Skripsi;
use Illuminate\Support\Facades\DB;
use Exception;
use Auth;
use Hash;

class UserController1 extends Controller
{
    protected $repository;
  
    public function __construct(UserRepository1 $repository)
    {
        $this->repository = $repository;
    }
  
    public function index(Request $request)
    {
        $items = $this->repository->paginate($request);
        return view('e_jurnal.admin.users.index',compact('items'));
    }

    public function dashboard()
    {
        $jmla = Jurnal::count();
        $jmls = Skripsi::count();
        $jmlm = DB::table('mahasiswa')->count();
        $jmld = DB::table('dosen')->count();
        $logj = logArtikel::select('*')->orderBy('waktu','desc')->get();
        $logs = logSkripsi::select('*')->orderBy('waktu','desc')->get();
        return view('e_jurnal.admin.home',compact('logj','logs','jmla','jmls','jmlm','jmld'));
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
            return redirect()->route('admin1.user')->with('success','Data telah disimpan.');
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $item = $this->repository->show($id);
        return view('e_jurnal.admin.users.edit',compact('item'));
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
            return redirect()->route('admin1.user')->with('success','Data telah diupdate.');
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
            return redirect()->route('admin1.user')->with('success','Data telah dihapus.');
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
            return redirect()->route('admin1.dashboard');
        }else{
            return redirect()->route('admin1.login')->with('error','Login Gagal !');
        }
    }

    public function logout()
    {
        Auth::guard('web')->logout();
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
