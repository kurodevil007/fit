<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use Illuminate\Http\Request;
use App\Http\Requests\KonsultasiRequest;
use App\Models\Konsultasi;
use App\Models\Riwayat;
use App\Services\KonsultasiService;
use Ramsey\Uuid\Uuid;

class KonsultasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gejala = Gejala::all();
        return view('konsultasi.index', compact('gejala'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('konsultasi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Requests\KonsultasiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KonsultasiRequest $request, KonsultasiService $konsultasi)
    {
        $kode = Uuid::uuid6()->toString();
        $keluhan = $request->validated();

        $yang_dialami = [];
        $list_id = [];
        foreach ($keluhan['keluhan'] as $gejala => $param) {
            list($str, $id) = explode('|', $gejala);
            if ($param == 1) {
                $list_id[] = $id;
                $yang_dialami[$str] = 1;
            } else {
                $yang_dialami[$str] = 0;
            }
        }

        $diagnosa = $konsultasi->kalkulasi($list_id);
        Konsultasi::create([
            'kode' => $kode,
            'gejala' => json_encode($yang_dialami),
            'hasil' => json_encode($diagnosa->toArray())
        ]);

        Riwayat::create([
            'user_id' => auth()->id(),
            'konsultasi_kode' => $kode
        ]);

        return back();
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
