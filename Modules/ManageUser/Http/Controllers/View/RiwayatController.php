<?php

namespace Modules\ManageUser\Http\Controllers\View;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\ManageUser\Entities\Riwayat;

class RiwayatController extends Controller
{
    /**
     * RiwayatController constructor.
     *
     */
    public function __construct()
    {
        $this->middleware(['auth']);
        $this->breadcrumbs = [
            ['href' => url('/'), 'text' => 'mdi-home'],
            ['href' => route('riwayat.index'), 'text' => 'Riwayat Aktivitas'],
        ];
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $table_headers = [
            [
                "text" => 'Nama',
                "align" => 'center',
                "sortable" => false,
                "value" => 'users.nama_lengkap',
            ],
            [
                "text" => 'Jabatan',
                "align" => 'center',
                "sortable" => false,
                "value" => 'users.jabatan.nama_jabatan',
            ],
            [
                "text" => 'Aktivitas',
                "align" => 'center',
                "sortable" => false,
                "value" => 'description',
            ],
            [
                "text" => 'Tanggal',
                "align" => 'center',
                "sortable" => false,
                "value" => 'created_date',
            ],
           
        ];
        return view('manageuser::riwayat.index')
             ->with('page_title', 'Riwayat Aktivitas')
             ->with('breadcrumbs', $this->breadcrumbs)
             ->with('table_headers', $table_headers);
    }

    /**
     * Show the form for detailing the specified resource.
     * @param Riwayat $riwayat
     * @return Renderable
     */
    public function detail($id)
    {
        $riwayat = Riwayat::findOrFail($id);
        $this->breadcrumbs[] = ['href' => route('riwayat.detail', [ $riwayat->id ]), 'text' => 'Detail Riwayat Aktivitas ' . $riwayat->description];

        return view('manageuser::riwayat.detail')
             ->with('data', $riwayat)
             ->with('page_title', 'Detail Riwayat ' . $riwayat->description)
             ->with('breadcrumbs', $this->breadcrumbs);
    }
}
