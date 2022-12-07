<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = Menu::all(); //mengambil data dari tabel menu

        return view('admin.index_menu', compact('menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all(); //mengambil data dari tabel kategori untuk ditampilkan pada dropdown

        return view('admin.create_menu', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('foto')->store('menu/foto');
        $validate = $request->validate([
            'nama' => 'required|string',
            'foto' => 'required',
            'kategori_id' => 'required',
            'harga' => 'required|int',
            'keterangan' => 'required|string',
        ]);
        $validate['foto'] = $file;

        Menu::create($validate);

        return redirect('menu');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = Menu::find($id);
        $kategori = Kategori::all(); //mengambil data dari tabel kategori untuk ditampilkan pada dropdown

        return view('admin.edit_menu', compact('menu', 'kategori'));

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
        $menu = Menu::find($id);
        $m = $request->all();

        try{
            $file = $request->file('foto')->store('menu/foto');
            $m['foto'] = $file; // mengupdate field foto dengan data dari $file
            $menu->update($m);
        }
        catch(\Throwable $th) {
            $m['foto'] = $menu->foto; // mengupdate field foto dengan data yang sudah ada pada database
            $menu->update($m);
        }

        return redirect('menu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Menu::find($id);
        $menu->delete();

        return redirect('menu');
    }
}
