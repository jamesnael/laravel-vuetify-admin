<?php

namespace Modules\Core\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
	/**
     * UserController constructor.
     *
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('core::dashboard')->with([
            'total_perusahaan' => '300',
            'total_unit' => '50',
            'total_pegawai' => '30',
            'total_proyek' => '5',
        ]);
    }
}
