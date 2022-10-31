<?php

namespace App\Http\Controllers;
use File;
use App\Models\siswa;
use App\Models\project;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class Project_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = siswa::paginate(5);
        return view('MProject.MasterProject', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'max' => ':attribute maksimal :max karakter NGAB'
        ];

        //validasi data
        $this->validate($request, [
            'nama_project' => 'required|max:20',
            'deskripsi' => 'required|min:5',
            'tanggal' => 'required'
        ], $message);

        //insert data
        project::create([
            'id_siswa' => $request->id_siswa,
            'nama_project' => $request->nama_project,
            'deskripsi' => $request->deskripsi,
            'tanggal' => $request->tanggal
        ]);
        Session::flash('sukses', "Data ditambahkan");
        return redirect('/masterproject')->with('success', 'Data berhasil ditambahkan !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project=siswa::find($id)->project()->get();
        return view('MProject.ShowProject', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = project::find($id);
        $siswa = siswa::find($id);
        return view('MProject.editProject',compact('project', 'siswa'));
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
            'max' => ':attribute maksimal :max karakter NGAB'
        ];

        //validasi data
        $this->validate($request, [
            'nama_project' => 'required|max:20',
            'deskripsi' => 'required|min:5',
            'tanggal' => 'required'
        ], $message);

        //insert data
            $project = project::find($id);
            $project-> nama_project = $request->nama_project;
            $project-> deskripsi = $request->deskripsi;
            $project-> tanggal = $request->tanggal;

            $project->save();
        Session::flash('sukses', "Data diupdate");
        return redirect('/masterproject')->with('success', 'Data berhasil ditambahkan !!');
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
        $project = project::find($id)->delete();
        Session::flash('sukses', "Data dihapus");
        return redirect('/masterproject');
    }

    public function tambah($id)
    {
        $siswa = siswa::find($id);
        return view('MProject.tambahProject',compact('siswa'));
    }
}
