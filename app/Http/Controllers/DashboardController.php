<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard');
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
        $nama = $request->nama;
        $status = $request->status;

        if($request->order != null) {
            $order = $request->order;
            $jumlahorder = count($order);
        }

        $total = 0;

        foreach($order as $o) {
            $total += $o;
        }

        $bayar = new TotalBayar($status, $total);
        $diskon =  $bayar->diskon($status, $total);
        $totalpembayaran = $bayar->pembayaran();

        $data = [
            'nama' => $nama,
            'jumlahorder' => $jumlahorder,
            'totalpesanan' => $total,
            'status' => $status,
            'diskon' => $diskon,
            'totalpembayaran' => $totalpembayaran,
        ];

        return view('admin.dashboard', compact('data'));
        

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}


interface Order {
    public function diskon();
}

class Pesanan implements Order {
    public $status;
    public $total;

    public function __construct($status, $total) {
        $this->status = $status;
        $this->total = $total;
    }

    public function diskon() {

      if($this->status == 'member' && $this->total >= 100000 ) {
            return $this->total * 0.20;
      }else if ($this->status == 'member' && $this->total <= 100000) {
            return $this->total * 0.10;
      }else {
        return "Anda tidak mendapatkan diskon";
      }

    }
}

class TotalBayar extends Pesanan {
    public function pembayaran() {
        return (int)$this->total - (int)$this->diskon($this->status, $this->total);
    }
}