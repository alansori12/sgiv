<?php

namespace App\Http\Controllers\E_Jurnal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\E_Jurnal\DosenRepository1;
use App\Models\Jurnal;
use Exception;
use Auth;
use Hash;
 
class DosenController1 extends Controller
{
    protected $repository;
  
    public function __construct(DosenRepository1 $repository)
    {
        $this->repository = $repository;
    }
  
    public function index(Request $request)
    {
        $items = $this->repository->paginate($request);
        return view('e_jurnal.admin.dosen.index',compact('items'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nidn' => 'required|numeric|digits:10|unique:dosen,nidn',
            'nm_dsn' => 'required|max:50',
            'jk' => 'required',
            'email' => 'required|email|unique:dosen,email',
            'jab_fungs' => 'max:30',
            'pend' => 'required',
        ],[
            'nidn.required' => 'Kolom NIDN wajib diisi.',
            'nidn.numeric' => 'NIDN harus berupa angka.',
            'nidn.digits' => 'NIDN harus :digits digit.',
            'nidn.unique' => 'NIDN sudah digunakan.',
            'nm_dsn.required' => 'Kolom nama wajib diisi.',
            'nm_dsn.max' => 'Nama tidak boleh lebih dari :max karakter.',
            'jk.required' => 'Kolom jenis kelamin wajib diisi.',
            'email.required' => 'Kolom email wajib diisi.',
            'email.email' => 'Email harus alamat email yang valid.',
            'email.unique' => 'Email sudah digunakan.',
            'jab_fungs.max' => 'Jabatan fungsional tidak boleh lebih dari :max karakter.',
            'pend.required' => 'Kolom pendidikan wajib diisi.',
        ]);

        try {
            $item = $this->repository->store($request);
            return redirect()->route('admin1.dosen')->with('success','Data telah disimpan.');
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }
    
    public function edit($id)
    {
        $item = $this->repository->show($id);
        return view('e_jurnal.admin.dosen.edit',compact('item'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'nidn' => 'required|numeric|digits:10',
            'nm_dsn' => 'required|max:50',
            'email' => 'required|email',
            'jab_fungs' => 'max:30',
        ],[
            'nidn.required' => 'Kolom NIDN wajib diisi.',
            'nidn.numeric' => 'NIDN harus berupa angka.',
            'nidn.digits' => 'NIDN harus :digits digit.',
            'nm_dsn.required' => 'Kolom nama wajib diisi.',
            'nm_dsn.max' => 'Nama tidak boleh lebih dari :max karakter.',
            'email.required' => 'Kolom email wajib diisi.',
            'email.email' => 'Email harus alamat email yang valid.',
            'jab_fungs.max' => 'Jabatan fungsional tidak boleh lebih dari :max karakter.',
        ]);

        try {
            $item = $this->repository->update($id, $request);
            return redirect()->route('admin1.dosen')->with('success','Data telah diupdate.');
        } catch (Exception $e) {
           return response()->json(['message' => $e->getMessage()], $e->getStatus());
        }
    }

    public function delete($id)
    {
        try {
            $this->repository->delete($id);
            return redirect()->route('admin1.dosen')->with('success','Data telah dihapus.');
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getStatus());
        }
    }

    public function postlogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:dosen,email',
            'password' => 'required|min:6',
        ],[
            'email.required' => 'Silahkan masukan email.',
            'email.email' => 'Email harus alamat email yang valid.',
            'email.exists' => 'Email tidak terdaftar pada sistem.',
            'password.required' => 'Silahkan masukan password.',
            'password.min' => 'Masukan password minimal :min karakter.',
        ]);
        if(Auth::guard('dosen')->attempt($request->only('email','password'))){
            return redirect()->route('dosen1.home');
        }else{
            return redirect()->route('dosen1.login')->with('error','Login Gagal !');
        }
    }

    public function home()
    {
        $items = Auth::guard('dosen')->user()->id;
        $file=Jurnal::orderBy('tanggal','desc')->paginate(5)->where('status', 'posted');
        return view('e_jurnal.dosen.home',compact('items','file'));
    }

    public function tentang(){
        return view('e_jurnal.dosen.about');
    }


    public function logout()
    {
        Auth::guard('dosen')->logout();
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
