<?php

namespace App\Http\Controllers\E_Jurnal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jurnal;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\logArtikel;
use Illuminate\Support\Facades\File;


class ArtikelController extends Controller
{

    //umum
    public function halamanawal(){
        $file=Jurnal::orderBy('tanggal','desc')->paginate(5)->where('status', 'posted');
        return view('e_jurnal.umum.index',compact('file'));
    }

    public function tentang(){
        return view('e_jurnal.umum.about');
    }

    public function jurnal(){
        $file=Jurnal::where('status', 'posted')->paginate(10);
        return view('e_jurnal.umum.jurnal',compact('file'));
    }

    public function jurnalcari(Request $request)
    {
        $cari = $request->cari;
        $file = Jurnal::select('*')->where('judul','like',"%".$cari."%")->paginate(5);
        return view('e_jurnal.umum.jurnal',compact('file'));
    }

    //admin
    public function index()
    {
        $file=Jurnal::select('*')->orderBy('tanggal','desc')->where('status', 'posted')->get();
        return view('e_jurnal.admin.jurnal.index',compact('file'));
    }

    public function indexmasuk()
    {
        $file=Jurnal::select('*')->orderBy('tanggal','desc')->where('status','!=','posted')->get();
        return view('e_jurnal.admin.jurnal.masuk',compact('file'));
    }

    public function showabstrak($id)
    {
        $file=Jurnal::find($id);
        return view('e_jurnal.admin.jurnal.detailabstrak',compact('file'));
    }

    public function showartikel($id)
    {
        $file=Jurnal::find($id);
        return view('e_jurnal.admin.jurnal.detailartikel',compact('file'));
    }

    public function edit($id){
        $file = Jurnal::find($id);
        $mhs = Mahasiswa::all();
        $dsn = Dosen::all();
        return view('e_jurnal.admin.jurnal.edit',compact('file','mhs','dsn'));
    }

    public function update($id, Request $request)
    {
        $messages = [
            'judul.required' => 'Judul Wajib Diisi',
            'volume.required' => 'volume Wajib Diisi',
            'volume.numeric' => 'Volume Tidak Boleh Mengandung Alfabhet',
            'mimes' => 'Hanya Diperbolehkan Menambahkan File PDF',
            'max' => 'Ukuran File Terlalu Besar',
        ];

        $this->validate($request,[
            'judul' => 'required',
            'volume' => 'required|numeric',
            'abstrak' => 'mimes:pdf|max:5000',
            'artikel' => 'mimes:pdf|max:5000'
        ],$messages);

        try {
            $file = Jurnal::find($id);
            $file->tanggal = $request->tanggal;
            $file->judul = ucwords($request->judul);
            $file->penyusun = $request->penyusun;
            $file->volume = $request->volume;
            $file->tanggal = $request->tanggal;
            if ($request->hasFile('abstrak')){
                $abstrak = $request->abstrak;
                $abstraknameWithExt = $abstrak->getClientOriginalName();
                $abstrakname = pathinfo($abstraknameWithExt, PATHINFO_FILENAME);
                $extension = $abstrak->getClientOriginalExtension();
                $abstraknamesave = str_replace(" ", "_", $abstrakname).'_'.time().'.'.$extension;
                $abstrak->move('storage/abstrak', $abstraknamesave);

                File::delete('storage/abstrak/'.$file->abstrak);
                $file->abstrak = $abstraknamesave;
            }if ($request->hasFile('artikel')){
                $artikel = $request->artikel;
                $artikelnameWithExt = $artikel->getClientOriginalName();
                $artikelname = pathinfo($artikelnameWithExt, PATHINFO_FILENAME);
                $extension = $artikel->getClientOriginalExtension();
                $artikelnamesave = str_replace(" ", "_", $artikelname).'_'.time().'.'.$extension;
                $artikel->move('storage/artikel', $artikelnamesave);

                File::delete('storage/artikel/'.$file->artikel);
                $file->artikel = $artikelnamesave;
            }
            $file->status = $request->status;
            
            $file->save();
            return redirect()->route('admin1.artikel.masuk')->with('success','Data telah disimpan.');
        } catch (Exception $e) {
           return response()->json(['message' => $e->getMessage()], $e->getStatus());
        }
    }

    public function destroy($id)
    {
        $file = Jurnal::find($id);
        $file -> delete();
        return redirect()->route('admin1.artikel')->with('success','Data telah dihapus.');
    }

    //mahasiswa
    public function indexmahasiswa()
    {
        $file=Jurnal::where('status', 'posted')->paginate(10);
        return view('e_jurnal.mahasiswa.jurnal.index',compact('file'));
    }

    public function indexmahasiswacari(Request $request)
    {
        $cari = $request->cari;
        $file = Jurnal::select('*')->where('judul','like',"%".$cari."%",'and','status','posted')->paginate();
        return view('e_jurnal.mahasiswa.jurnal.index',compact('file'));
    }

    public function artikelsaya()
    {   
        $file=Jurnal::orderBy('tanggal','desc')->paginate(5)->where('status', 'posted');
        $logj=logArtikel::select('*')->orderBy('waktu','desc')->get();
        return view('e_jurnal.mahasiswa.jurnal.artikel',compact('file','logj'));
    }

    public function penulismhs()
    {
        return view('e_jurnal.mahasiswa.jurnal.create');
    }

    public function tambahartikel(Request $request)
    {
        $messages = [
            'judul.required' => 'Judul Wajib Diisi',
            'volume.required' => 'volume Wajib Diisi',
            'volume.numeric' => 'Volume Tidak Boleh Mengandung Alfabhet',
            'abstrak.required' => 'Silahkan Sisipkan File Abstrak',
            'artikel.required' => 'Silahkan Sisipkan File Artikel',
            'mimes' => 'Hanya Diperbolehkan Menambahkan File Doc dan PDF',
            'max' => 'Ukuran File Terlalu Besar',
        ];

        $this->validate($request,[
            'judul' => 'required',
            'volume' => 'required|numeric',
            'abstrak' => 'required|mimes:docx,doc,pdf|max:5000',
            'artikel' => 'required|mimes:docx,doc,pdf|max:5000'
        ],$messages);

        try{
            if ($request->hasFile('abstrak')){
                $abstrak = $request->abstrak;
                $abstraknameWithExt = $abstrak->getClientOriginalName();
                $abstrakname = pathinfo($abstraknameWithExt, PATHINFO_FILENAME);
                $extension = $abstrak->getClientOriginalExtension();
                $abstraknamesave = str_replace(" ", "_", $abstrakname).'_'.time().'.'.$extension;
                $abstrak->move('storage/abstrak', $abstraknamesave);
            }if ($request->hasFile('artikel')){
                $artikel = $request->artikel;
                $artikelnameWithExt = $artikel->getClientOriginalName();
                $artikelname = pathinfo($artikelnameWithExt, PATHINFO_FILENAME);
                $extension = $artikel->getClientOriginalExtension();
                $artikelnamesave = str_replace(" ", "_", $artikelname).'_'.time().'.'.$extension;
                $artikel->move('storage/artikel', $artikelnamesave);
            }
            $item = new Jurnal;
            $item->tanggal = $request->input('tanggal');
            $item->judul = ucwords($request->input('judul'));
            $item->penyusun = ucwords($request->input('penyusun'));
            $item->volume = $request->input('volume');
            $item->abstrak = $abstraknamesave;
            $item->artikel = $artikelnamesave;
            $item->status = 'submited';
            $item->save();
            return redirect('/mahasiswa1/jurnalsaya')->with('success','Materi telah terkirim.');
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    //dosen
    public function indexdosen()
    {
        $file=Jurnal::where('status', 'posted')->paginate(10);
        return view('e_jurnal.dosen.jurnal.index',compact('file'));
    }

    public function indexdosencari(Request $request)
    {
        $cari = $request->cari;
        $file = Jurnal::select('*')->where('judul','like',"%".$cari."%",'and','status','posted')->paginate();
        return view('e_jurnal.dosen.jurnal.index',compact('file'));
    }

    public function artikeldosen()
    {   
        $file=Jurnal::orderBy('tanggal','desc')->paginate(5)->where('status', 'posted');
        $logj=logArtikel::select('*')->orderBy('waktu','desc')->get();
        return view('e_jurnal.dosen.jurnal.artikel',compact('file','logj'));
    }

    public function penulisdsn()
    {
        return view('e_jurnal.dosen.jurnal.create');
    }

    public function tambahartikeldsn(Request $request)
    {
        $messages = [
            'judul.required' => 'Judul Wajib Diisi',
            'volume.required' => 'volume Wajib Diisi',
            'volume.numeric' => 'Volume Tidak Boleh Mengandung Alfabhet',
            'abstrak.required' => 'Silahkan Sisipkan File Abstrak',
            'artikel.required' => 'Silahkan Sisipkan File Artikel',
            'mimes' => 'Hanya Diperbolehkan Menambahkan File Doc dan PDF',
            'max' => 'Ukuran File Terlalu Besar',
        ];

        $this->validate($request,[
            'judul' => 'required',
            'volume' => 'required|numeric',
            'abstrak' => 'required|mimes:doc,pdf|max:5000',
            'artikel' => 'required|mimes:doc,pdf|max:5000'
        ],$messages);

        try{
            if ($request->hasFile('abstrak')){
                $abstrak = $request->abstrak;
                $abstraknameWithExt = $abstrak->getClientOriginalName();
                $abstrakname = pathinfo($abstraknameWithExt, PATHINFO_FILENAME);
                $extension = $abstrak->getClientOriginalExtension();
                $abstraknamesave = str_replace(" ", "_", $abstrakname).'_'.time().'.'.$extension;
                $abstrak->move('storage/abstrak', $abstraknamesave);
            }if ($request->hasFile('artikel')){
                $artikel = $request->artikel;
                $artikelnameWithExt = $artikel->getClientOriginalName();
                $artikelname = pathinfo($artikelnameWithExt, PATHINFO_FILENAME);
                $extension = $artikel->getClientOriginalExtension();
                $artikelnamesave = str_replace(" ", "_", $artikelname).'_'.time().'.'.$extension;
                $artikel->move('storage/artikel', $artikelnamesave);
            }
            $item = new Jurnal;
            $item->tanggal = $request->input('tanggal');
            $item->judul = ucwords($request->input('judul'));
            $item->penyusun = ucwords($request->input('penyusun'));
            $item->volume = $request->input('volume');
            $item->abstrak = $abstraknamesave;
            $item->artikel = $artikelnamesave;
            $item->status = 'submited';
            $item->save();
            return redirect('/dosen1/jurnalsaya')->with('success','Materi telah terkirim.');
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }

}
