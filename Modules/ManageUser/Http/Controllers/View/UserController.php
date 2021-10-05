<?php

namespace Modules\ManageUser\Http\Controllers\View;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\ManageUser\Entities\User;
use Modules\ManageUser\Entities\Jabatan;
use Modules\Core\Entities\Province;

class UserController extends Controller
{
    /**
     * UserController constructor.
     *
     */
    public function __construct()
    {
        $this->middleware(['auth']);
        $this->breadcrumbs = [
            ['href' => url('/'), 'text' => 'mdi-home'],
            ['href' => route('user.index'), 'text' => 'Master Data'],
            ['href' => route('user.index'), 'text' => 'Karyawan'],
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
                "text" => 'Username',
                "align" => 'center',
                "sortable" => false,
                "value" => 'username',
            ],
            [
                "text" => 'Nama Lengkap',
                "align" => 'center',
                "sortable" => false,
                "value" => 'nama_lengkap',
            ],
            [
                "text" => 'Jabatan',
                "align" => 'center',
                "sortable" => false,
                "value" => 'jabatan.nama_jabatan',
            ],
            [
                "text" => 'Status',
                "align" => 'center',
                "sortable" => false,
                "value" => 'status',
            ],
        ];
        return view('manageuser::user.index')
             ->with('page_title', 'Master Karyawan / Mitra')
             ->with('breadcrumbs', $this->breadcrumbs)
             ->with('table_headers', $table_headers);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $this->breadcrumbs[] = ['href' => route('user.create'), 'text' => 'Tambah Karyawan'];

        return view('manageuser::user.create')
             ->with('page_title', 'Tambah Master Karyawan / Mitra')
             ->with('breadcrumbs', $this->breadcrumbs)
             ->with('jabatan', Jabatan::select('id AS value', 'nama_jabatan AS text')->get())
             ->with('city', Province::select('name AS value', 'name AS text')->get()->unique('text')->values()->all());
    }

    /**
     * Show the form for editing the specified resource.
     * @param User $user
     * @return Renderable
     */
    public function edit(User $user)
    {
        $this->breadcrumbs[] = ['href' => route('user.edit', [ $user->slug ]), 'text' => 'Ubah Karyawan ' . $user->name];

        return view('manageuser::user.edit')
             ->with('data', $user)
             ->with('page_title', 'Ubah User ' . $user->name)
             ->with('breadcrumbs', $this->breadcrumbs)
             ->with('jabatan', Jabatan::select('id AS value', 'nama_jabatan AS text')->get())
             ->with('city', Province::select('name AS value', 'name AS text')->get()->unique('text')->values()->all());
    }

    /**
     * Show the form for editing the specified resource.
     * @param User $user
     * @return Renderable
     */
    public function view(User $user)
    {
        $this->breadcrumbs[] = ['href' => route('user.view', [ $user->slug ]), 'text' => 'View Karyawan ' . $user->name];

        return view('manageuser::user.view')
             ->with('data', $user)
             ->with('page_title', 'View User ' . $user->name)
             ->with('breadcrumbs', $this->breadcrumbs)
             ->with('jabatan', Jabatan::select('id AS value', 'nama_jabatan AS text')->get())
             ->with('city', Province::select('name AS value', 'name AS text')->get()->unique('text')->values()->all());
    }

    /**
     * Show the form for editing the specified resource.
     * @param User $user
     * @return Renderable
     */
    public function changePasswordForm()
    {
        $this->breadcrumbs[] = ['href' => route('change-password.form'), 'text' => 'Change Password'];
        return view('manageuser::user.change_password')
             ->with('page_title', 'Change Password ' . \Auth::user()->nama_lengkap)
             ->with('breadcrumbs', $this->breadcrumbs);
    }
}
