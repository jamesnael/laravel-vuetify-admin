<?php

namespace Modules\ManageUser\Http\Controllers\Api;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\ManageUser\Entities\Riwayat;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Modules\Core\Rules\SignedPhoneNumber;
use Illuminate\Validation\Rule;

class RiwayatController extends Controller
{
    /**
     * Remove the specified resource from storage.
     * @param Riwayat $riwayat
     * @return Renderable
     */
    public function destroy(Riwayat $riwayat)
    {
        DB::beginTransaction();
        try {
            log_activity(
                'Hapus riwayat ' . $riwayat->nama_riwayat,
                $riwayat
            );
            $riwayat->delete();
            DB::commit();
            return response_json(true, null, 'Riwayat berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollback();
            return response_json(false, $e->getMessage() . ' on file ' . $e->getFile() . ' on line number ' . $e->getLine(), 'Terdapat kesalahan saat menghapus data, silahkan dicoba kembali beberapa saat lagi.');
        }
    }

    /**
     * Get the specified resource from storage.
     * @param Riwayat $riwayat
     * @return Renderable
     */
    public function data($id)
    {
        $riwayat = Riwayat::with('users.jabatan')->findOrFail($id);
        $riwayat->nama_jabatan = $riwayat->users->jabatan->nama_jabatan;
        $riwayat->created_date = $riwayat->created_at ? $riwayat->created_at->timezone(config('core.app_timezone', 'UTC'))->locale('id')->translatedFormat('d F Y H:i') : '';

        return response_json(true, null, 'Data retrieved', $riwayat);
    }

    /**
     *
     * Validation Rules for Store/Update Data
     *
     */
    public function validateFormRequest($request, $id = null)
    {
        return Validator::make($request->all(), [
            'description' => 'bail|required',
            'properties' => 'bail|required',
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

        $query = Riwayat::with('users.jabatan');
        $query->orderBy('created_at', 'DESC');
        
        if ($request->has('search') && $request->input('search')) {
            $query->where(function($subquery) use ($request) {
                $subquery->where('description', 'LIKE', '%' . $request->input('search') . '%');
                $subquery->orWhereHas('users', function($subsubquery) use ($request){
                    $subsubquery->where('nama_lengkap', 'LIKE', '%' . $request->input('search') . '%');
                });
                $subquery->orWhereHas('users.jabatan', function($subsubquery) use ($request){
                    $subsubquery->where('nama_jabatan', 'LIKE', '%' . $request->input('search') . '%');
                });
            });
        }
        
        $data = $query->orderBy('created_at', 'desc')
                    ->paginate($request->input('paginate') ?? 10);

        $data->getCollection()->transform(function($item) {
            $item->created_date = $item->created_at ? $item->created_at->timezone(config('core.app_timezone', 'UTC'))->locale('id')->translatedFormat('d F Y H:i') : '';
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
