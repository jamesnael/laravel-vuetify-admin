<?php

namespace Modules\ManageUser\Http\Controllers\View;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\ManageUser\Entities\Jabatan;

class JabatanController extends Controller
{
    /**
     * JabatanController constructor.
     *
     */
    public function __construct()
    {
        $this->middleware(['auth']);
        $this->breadcrumbs = [
            ['href' => url('/'), 'text' => 'mdi-home'],
            ['href' => route('jabatan.index'), 'text' => 'Master Data'],
            ['href' => route('jabatan.index'), 'text' => 'Jabatan'],
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
                "text" => 'Nama Jabatan',
                "align" => 'center',
                "sortable" => false,
                "value" => 'nama_jabatan',
            ],
            [
                "text" => 'Keterangan',
                "align" => 'center',
                "sortable" => false,
                "value" => 'keterangan',
            ],
           
        ];
        return view('manageuser::jabatan.index')
             ->with('page_title', 'Master Jabatan')
             ->with('breadcrumbs', $this->breadcrumbs)
             ->with('table_headers', $table_headers);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $this->breadcrumbs[] = ['href' => route('jabatan.create'), 'text' => 'Tambah Jabatan'];

        return view('manageuser::jabatan.create')
             ->with('page_title', 'Tambah Master Jabatan')
             ->with('menu', get_file_content('public', 'application_main_menu.json'))
             ->with('breadcrumbs', $this->breadcrumbs);
    }

    /**
     * Show the form for editing the specified resource.
     * @param Jabatan $jabatan
     * @return Renderable
     */
    public function edit(Jabatan $jabatan)
    {
        $this->breadcrumbs[] = ['href' => route('jabatan.edit', [ $jabatan->slug ]), 'text' => 'Ubah Karyawan ' . $jabatan->nama_jabatan];

        return view('manageuser::jabatan.edit')
             ->with('data', $jabatan)
             ->with('page_title', 'Ubah Jabatan ' . $jabatan->nama_jabatan)
             ->with('menu', get_file_content('public', 'application_main_menu.json'))
             ->with('breadcrumbs', $this->breadcrumbs);
    }
}
