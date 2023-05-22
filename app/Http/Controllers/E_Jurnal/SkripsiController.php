<?php

namespace App\Http\Controllers\E_Jurnal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skripsi;
use App\Models\Mahasiswa;
use App\Models\logSkripsi;
use Illuminate\Support\Facades\File;

class SkripsiController extends Controller
{
    //admin
    public function index()
    {
        $file=Skripsi::select('*')->orderBy('tanggal','desc')->where('status', 'posted')->get();
        return view('e_jurnal.admin.skripsi.index',compact('file'));
    }

    public function indexmasuk()
    {
        $file=Skripsi::select('*')->orderBy('tanggal','desc')->where('status','!=','posted')->get();
        return view('e_jurnal.admin.skripsi.masuk',compact('file'));
    }

    public function showpendahuluan($id)
    {
        $file=Skripsi::find($id);
        return view('e_jurnal.admin.skripsi.detailpendahuluan',compact('file'));
    }

    public function showskripsi($id)
    {
        $file=Skripsi::find($id);
        return view('e_jurnal.admin.skripsi.detailskripsi',compact('file'));
    }

    public function edit($id){
        $file = Skripsi::find($id);
        $mhs = Mahasiswa::all();
        return view('e_jurnal.admin.skripsi.edit',compact('file','mhs'));
    }

    public function update($id, Request $request)
    {
        $messages = [
            'judul.required' => 'Judul Wajib Diisi',
            'tahun.required' => 'Tahun Wajib Diisi',
            'tahun.numeric' => 'Tahun Tidak Boleh Mengandung Alfabhet',
            'pendahuluan.required' => 'Silahkan Sisipkan File Pendahuluan',
            'mimes' => 'Hanya Diperbolehkan Menambahkan File PDF',
            'max' => 'Ukuran File Terlalu Besar',
        ];

        $this->validate($request,[
            'judul' => 'required',
            'tahun' => 'required|numeric',
            'pendahuluan' => 'mimes:pdf|max:5000',
            'file' => 'mimes:pdf|max:5000'
        ],$messages);

        try {
            $file = Skripsi::find($id);
            $file->tanggal = $request->tanggal;
            $file->tahun = $request->tahun;
            $file->judul = ucwords($request->judul);
            $file->penulis = $request->penulis;
            if ($request->hasFile('pendahuluan')){
                $pendahuluan = $request->pendahuluan;
                $pendahuluannameWithExt = $pendahuluan->getClientOriginalName();
                $pendahuluanname = pathinfo($pendahuluannameWithExt, PATHINFO_FILENAME);
                $extension = $pendahuluan->getClientOriginalExtension();
                $pendahuluannamesave = str_replace(" ", "_", $pendahuluanname).'_'.time().'.'.$extension;
                $pendahuluan->move('storage/pendahuluan', $pendahuluannamesave);

                File::delete('storage/pendahuluan/'.$file->pendahuluan);
                $file->pendahuluan = $pendahuluannamesave;
            }if ($request->hasFile('skripsi')){
                $skripsi = $request->skripsi;
                $skripsinameWithExt = $skripsi->getClientOriginalName();
                $skripsiname = pathinfo($skripsinameWithExt, PATHINFO_FILENAME);
                $extension = $skripsi->getClientOriginalExtension();
                $skripsinamesave = str_replace(" ", "_", $skripsiname).'_'.time().'.'.$extension;
                $skripsi->move('storage/skripsi', $skripsinamesave);

                File::delete('storage/skripsi/'.$file->file);
                $file->file = $skripsinamesave;
            }
            $file->status = $request->status;
            
            $file->save();
            return redirect()->route('admin1.skripsi.masuk')->with('success','Data telah diubah.');
        } catch (Exception $e) {
           return response()->json(['message' => $e->getMessage()], $e->getStatus());
        }
    }

    public function destroy($id)
    {
        $file = Skripsi::find($id);
        $file -> delete();
        return redirect()->route('admin1.skripsi')->with('success','Data telah dihapus.');
    }

    //umum
    public function skripsi(){
        $file=Skripsi::where('status', 'posted')->paginate(10);
        return view('e_jurnal.umum.skripsi',compact('file'));
    }

    public function skripsicari(Request $request)
    {
        $cari = $request->cari;
        $file = Skripsi::select('*')->where('judul','like',"%".$cari."%")->paginate(5);
        return view('e_jurnal.umum.skripsi',compact('file'));
    }

    //mahasiswa
    public function indexskripsi()
    {
        $file=Skripsi::where('status', 'posted')->paginate(10);
        return view('e_jurnal.mahasiswa.skripsi.index',compact('file'));
    }

    public function indexskripsicari(Request $request)
    {
        $cari = $request->cari;
        $file = Skripsi::select('*')->where('judul','like',"%".$cari."%")->paginate(10);
        return view('e_jurnal.mahasiswa.skripsi.index',compact('file'));
    }

    public function skripsiku()
    {
        $file=Skripsi::orderBy('tanggal','desc')->paginate(5)->where('status', 'posted');
        $logs=logSkripsi::select('*')->orderBy('waktu','desc')->get();
        return view('e_jurnal.mahasiswa.skripsi.skripsiku',compact('file','logs'));
    }

    public function tambahskripsi()
    {
        $mhs=Mahasiswa::all();
        return view('e_jurnal.mahasiswa.skripsi.create',compact('mhs'));
    }

    public function uploadskripsi(Request $request)
    {
        $messages = [
            'judul.required' => 'Judul Wajib Diisi',
            'tahun.required' => 'Tahun Wajib Diisi',
            'tahun.numeric' => 'Tahun Tidak Boleh Mengandung Alfabhet',
            'pendahuluan.required' => 'Silahkan Sisipkan File Pendahuluan',
            'file.required' => 'Silahkan Sisipkan File Lengkap Skripsi',
            'mimes' => 'Hanya Diperbolehkan Menambahkan File Doc dan PDF',
            'max' => 'Ukuran File Terlalu Besar',
        ];

        $this->validate($request,[
            'judul' => 'required',
            'tahun' => 'required|numeric',
            'pendahuluan' => 'required|mimes:doc,pdf|max:5000',
            'file' => 'required|mimes:doc,pdf|max:5000'
        ],$messages);

        try{
            if ($request->hasFile('pendahuluan')){
                $pendahuluan = $request->pendahuluan;
                $pendahuluannameWithExt = $pendahuluan->getClientOriginalName();
                $pendahuluanname = pathinfo($pendahuluannameWithExt, PATHINFO_FILENAME);
                $extension = $pendahuluan->getClientOriginalExtension();
                $pendahuluannamesave = str_replace(" ", "_", $pendahuluanname).'_'.time().'.'.$extension;
                $pendahuluan->move('storage/pendahuluan', $pendahuluannamesave);
            }if ($request->hasFile('skripsi')){
                $skripsi = $request->skripsi;
                $skripsinameWithExt = $skripsi->getClientOriginalName();
                $skripsiname = pathinfo($skripsinameWithExt, PATHINFO_FILENAME);
                $extension = $skripsi->getClientOriginalExtension();
                $skripsinamesave = str_replace(" ", "_", $skripsiname).'_'.time().'.'.$extension;
                $skripsi->move('storage/skripsi', $skripsinamesave);
            }
            $item = new Skripsi;
            $item->tanggal = $request->input('tanggal');
            $item->tahun = $request->input('tahun');
            $item->judul = ucwords($request->input('judul'));
            $item->penulis = ucwords($request->input('penulis'));
            $item->pendahuluan = $pendahuluannamesave;
            $item->file = $skripsinamesave;
            $item->status = 'submited';
            $item->save();
            return redirect('/mahasiswa1/skripsiku')->with('success','Skripsi telah terkirim.');
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    //dosen
    public function indexskripsidsn()
    {
        $file=Skripsi::where('status', 'posted')->paginate(10);
        return view('e_jurnal.dosen.skripsi.index',compact('file'));
    }

    public function skripsicaridsn(Request $request)
    {
        $cari = $request->cari;
        $file = Skripsi::select('*')->where('judul','like',"%".$cari."%")->paginate(10);
        return view('e_jurnal.dosen.skripsi.index',compact('file'));
    }

}
