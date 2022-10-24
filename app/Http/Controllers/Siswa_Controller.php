<?php

namespace App\Http\Controllers;
use File;
use App\Models\siswa;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class Siswa_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = siswa::all();
        return view('MSiswa.MasterSiswa',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('MSiswa.tambahSiswa');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = [
            'required' => ':attribute harus di isi NGAB',
            'min' => ':attribute minimal :min karakter NGAB',
            'max' => ':attribute maksimal :max karakter NGAB',
            'numeric' => ':attribute harus di isi angka NGAB!!',
            'mimes' => ':attribute harus berupa jpg atau png'
        ];

        //validasi data
        $this->validate($request, [
            'nama' => 'required|min:7|max:30',
            'nisn' => 'required|numeric',
            'alamat' => 'required',
            'jk' => 'required',
            'foto' => 'required|mimes:jpg,png',
            'about' => 'required|min:10'
        ], $message);

        //ambil informasi file yang di upload 
        $file = $request->file('foto');
        //rename 
        $nama_file = time() . "_" . $file->getClientOriginalName();
        //proses upload 
        $tujuan_upload = './template/img';
        $file->move($tujuan_upload, $nama_file);

        //insert data
        siswa::create([
            'nama' => $request->nama,
            'nisn' => $request->nisn,
            'alamat' => $request->alamat,
            'jk' => $request->jk,
            'foto' => $nama_file,
            'about' => $request->about
        ]);
        Session::flash('sukses', "Data ditambahkan");
        return redirect('/mastersiswa')->with('success', 'Data berhasil ditambahkan !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa = siswa::find($id);
        $kontak = $siswa->kontak()->get();
        return view('MSiswa.showSiswa',compact('siswa', 'kontak'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswa=siswa::find($id);
        return view('MSiswa.editSiswa',compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $message = [
            'required' => ':attribute harus di isi NGAB',
            'min' => ':attribute minimal :min karakter NGAB',
            'max' => ':attribute maksimal :max karakter NGAB',
            'numeric' => ':attribute harus di isi angka NGAB!!',
            'mimes' => ':attribute harus berupa jpg atau png'
        ];
        $this->validate($request, [
            'nama' => 'required|min:7|max:30',
            'nisn' => 'required|numeric',
            'alamat' => 'required',
            'jk' => 'required',
            'foto' => 'required|mimes:jpg,png',
            'about' => 'required|min:10'
        ], $message);

        if ($request->foto != ''){
            //ganti foto
            
            //hapus foto lama
            $siswa=siswa::find($id);
            File::delete('./template/img/'.$siswa->foto);

            //ambil info file
            $file = $request->file('foto');

            //rename
            $nama_file = time()."_".$file->getClientOriginalName();

            //proses upload
            $tujuan_upload = './template/img';
            $file->move($tujuan_upload,$nama_file);

            //simpan ke database
            $siswa->nama = $request->nama;
            $siswa->nisn = $request->nisn;
            $siswa->alamat = $request->alamat;
            $siswa->jk = $request->jk;
            $siswa->foto = $nama_file;
            $siswa->about = $request->about;
            $siswa->save();
            Session::flash('berhasil', 'data berhasil diupdate');
            return redirect('mastersiswa');
        }else{
            $siswa=siswa::find($id);
            $siswa->nama = $request->nama;
            $siswa->nisn = $request->nisn;
            $siswa->alamat = $request->alamat;
            $siswa->jk = $request->jk;
            $siswa->about = $request->about;
            $siswa->save();
            Session::flash('berhasil', 'data berhasil diupdate');
            return redirect('mastersiswa');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
    public function hapus($id)
    {
        $siswa = siswa::find($id);
        $siswa->delete();
        Session::flash('hapus', "Data dihapus");
        return redirect('/mastersiswa');
    }
}
