<?php

namespace Modules\ManageUser\Http\Controllers\Api;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\ManageUser\Entities\Jabatan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Modules\Core\Rules\SignedPhoneNumber;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class JabatanController extends Controller
{
    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $validator = $this->validateFormRequest($request);

        if ($validator->fails()) {
            return response_json(false, $validator->errors(), $validator->errors()->first());
        }

        DB::beginTransaction();
        try {
            $data = Jabatan::create($request->all());
            log_activity(
                'Tambah jabatan ' . $data->nama_jabatan,
                $data
            );
            DB::commit();
            return response_json(true, null, 'Jabatan berhasil disimpan.', $data);
        } catch (\Exception $e) {
            DB::rollback();
            return response_json(false, $e->getMessage() . ' on file ' . $e->getFile() . ' on line number ' . $e->getLine(), 'Terdapat kesalahan saat menyimpan data, silahkan dicoba kembali beberapa saat lagi.');
        }
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Jabatan $jabatan
     * @return Renderable
     */
    public function update(Request $request, Jabatan $jabatan)
    {
        $validator = $this->validateFormRequest($request, $jabatan->id);

        if ($validator->fails()) {
            return response_json(false, $validator->errors(), $validator->errors()->first());
        }

        DB::beginTransaction();
        try {
            $old = collect([
                'old' => $jabatan->getOriginal()
            ]);

            $jabatan->update($request->all());

            log_activity(
                'Update jabatan ' . $jabatan->nama_jabatan,
                $jabatan,
                $old
            );
            DB::commit();
            return response_json(true, null, 'Jabatan berhasil disimpan.', $jabatan);
        } catch (\Exception $e) {
            DB::rollback();
            return response_json(false, $e->getMessage() . ' on file ' . $e->getFile() . ' on line number ' . $e->getLine(), 'Terdapat kesalahan saat menyimpan data, silahkan dicoba kembali beberapa saat lagi.');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param Jabatan $jabatan
     * @return Renderable
     */
    public function destroy(Jabatan $jabatan)
    {
        DB::beginTransaction();
        try {
            log_activity(
                'Hapus jabatan ' . $jabatan->nama_jabatan,
                $jabatan
            );
            $jabatan->delete();
            DB::commit();
            return response_json(true, null, 'Jabatan berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollback();
            return response_json(false, $e->getMessage() . ' on file ' . $e->getFile() . ' on line number ' . $e->getLine(), 'Terdapat kesalahan saat menghapus data, silahkan dicoba kembali beberapa saat lagi.');
        }
    }

    /**
     * Get the specified resource from storage.
     * @param Jabatan $jabatan
     * @return Renderable
     */
    public function data(Jabatan $jabatan)
    {
        return response_json(true, null, 'Data retrieved', $jabatan);
    }

    /**
     *
     * Validation Rules for Store/Update Data
     *
     */
    public function validateFormRequest($request, $id = null)
    {
        return Validator::make($request->all(), [
            'nama_jabatan' => 'bail|required',
            'keterangan' => 'bail|required',
            'hak_akses' => 'bail|nullable',
        ]);
    }

    /**
     *
     * Get the resources from storage.
     * @return Renderable
     *
     */
    public function table(Request $request)
    {
        $validator = $this->validateTableRequest($request);

        if ($validator->fails()) {
            return response_json(false, 'Isian form salah', $validator->errors()->first());
        }

        $query = Jabatan::query();
        $query->orderBy('created_at', 'DESC');
        
        if ($request->has('search') && $request->input('search')) {
            $query->where(function($subquery) use ($request) {
                $subquery->where('nama_jabatan', 'LIKE', '%' . $request->input('search') . '%');
            });
        }
        
        $data = $query->orderBy('created_at', 'desc')
                    ->paginate($request->input('paginate') ?? 10);

        $data->getCollection()->transform(function($item) {
            $item->last_update = $item->updated_at ? $item->updated_at->timezone(config('core.app_timezone', 'UTC'))->locale('id')->translatedFormat('d F Y H:i') : '';
            return $item;
        });

        return response_json(true, null, 'Data retrieved.', $data);
    }

    /**
     *
     * Validation Rules for Get Table Data
     *
     */
    public function validateTableRequest($request)
    {
        return Validator::make($request->all(), [
            "page" => "bail|sometimes|required|numeric|min:1",
            "search" => "bail|present|nullable",
            "paginate" => "bail|required|numeric|in:10,20,50,100",
        ]);
    }
}
