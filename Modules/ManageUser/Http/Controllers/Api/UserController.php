<?php

namespace Modules\ManageUser\Http\Controllers\Api;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Modules\Core\Rules\SignedPhoneNumber;
use Modules\ManageUser\Entities\User;
use Modules\ManageUser\Entities\Jabatan;
use Modules\MasterData\Entities\Unit;
use Modules\MasterData\Entities\OperatorProyek;

class UserController extends Controller
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

            $data = User::create($request->all());
            $data->save();

            log_activity(
                'Tambah user ' . $data->nama_lengkap,
                $data
            );
            DB::commit();
            return response_json(true, null, 'User berhasil disimpan.', $data);
        } catch (\Exception $e) {
            DB::rollback();
            return response_json(false, $e->getMessage() . ' on file ' . $e->getFile() . ' on line number ' . $e->getLine(), 'Terdapat kesalahan saat menyimpan data, silahkan dicoba kembali beberapa saat lagi.');
        }
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param User $user
     * @return Renderable
     */
    public function update(Request $request, User $user)
    {
        $validator = $this->validateFormRequest($request, $user->id);

        if ($validator->fails()) {
            return response_json(false, $validator->errors(), $validator->errors()->first());
        }

        DB::beginTransaction();
        try {
            $old = collect([
                'old' => $user->getOriginal()
            ]);

            if (empty($request->password)) {
                $user->update($request->except('password'));
            } else {
                $user->update($request->all());
            }

            $user->save();

            log_activity(
                'Update user ' . $user->nama_lengkap,
                $user,
                $old
            );

            DB::commit();
            return response_json(true, null, 'User berhasil disimpan.', $user);
        } catch (\Exception $e) {
            DB::rollback();
            return response_json(false, $e->getMessage() . ' on file ' . $e->getFile() . ' on line number ' . $e->getLine(), 'Terdapat kesalahan saat menyimpan data, silahkan dicoba kembali beberapa saat lagi.');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param User $user
     * @return Renderable
     */
    public function destroy(User $user)
    {
        DB::beginTransaction();
        try {
            log_activity(
                'Hapus user ' . $user->nama_lengkap,
                $user
            );
            $user->delete();
            DB::commit();
            return response_json(true, null, 'User berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollback();
            return response_json(false, $e->getMessage() . ' on file ' . $e->getFile() . ' on line number ' . $e->getLine(), 'Terdapat kesalahan saat menghapus data, silahkan dicoba kembali beberapa saat lagi.');
        }
    }

    /**
     * Get the specified resource from storage.
     * @param User $user
     * @return Renderable
     */
    public function data(User $user)
    {
        return response_json(true, null, 'Data retrieved', $user);
    }

    /**
     *
     * Validation Rules for Store/Update Data
     *
     */
    public function validateFormRequest($request, $id = null)
    {
        return Validator::make($request->all(), [
            'nama_lengkap' => 'bail|required',
            'email' => [
                'bail', 
                'required', 
                'email',
            ],
            'no_hp' => [
                'bail', 
                'required', 
                new SignedPhoneNumber, 
                Rule::unique('\Modules\ManageUser\Entities\User', 'no_hp')
                    ->ignore($id)
            ],
            'alamat_lengkap' => 'bail|required',
            'status' => 'bail|required',
            'username' => [
                'bail', 
                'required', 
                Rule::unique('\Modules\ManageUser\Entities\User', 'username')
                    ->ignore($id)
            ],
            'password' => 'bail|nullable|sometimes',
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

        $query = User::with('jabatan');
        $query->orderBy('created_at', 'DESC');
        
        if ($request->has('search') && $request->input('search')) {
            if ($request->input('search') === '-') {
                $query->whereDoesntHave('latest_operator_proyek.unit');
                $query->orWhereDoesntHave('latest_operator_proyek.proyek');
            } else {
                $query->where(function($subquery) use ($request) {
                    $subquery->where('nama_lengkap', 'LIKE', '%' . $request->input('search') . '%');
                    $subquery->orWhereHas('jabatan', function($subsubquery) use ($request) {
                        $subsubquery->where('nama_jabatan', 'LIKE', '%' . $request->input('search') . '%');
                    });
                });
            }
        }
        
        $data = $query->orderBy('created_at', 'desc')->paginate($request->input('paginate') ?? 10);

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

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param User $user
     * @return Renderable
     */
    public function changePassword(Request $request, User $user)
    {
        DB::beginTransaction();
        try {
            log_activity(
                'Change password user ' . $user->nama_lengkap,
                $user
            );
            $user->update($request->all());
            DB::commit();
            return response_json(true, null, 'Perubahan Password telah berhasil dilakukan.', $user);
        } catch (\Exception $e) {
            DB::rollback();
            return response_json(false, $e->getMessage() . ' on file ' . $e->getFile() . ' on line number ' . $e->getLine(), 'Terdapat kesalahan saat menyimpan data, silahkan dicoba kembali beberapa saat lagi.');
        }
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param User $user
     * @return Renderable
     */
    public function logoutUser(Request $request, User $user)
    {
        DB::beginTransaction();
        try {
            log_activity(
                'Force logout user ' . $user->nama_lengkap,
                $user
            );

            $user->update([
                'api_token' => null,
                'token_lifetime' => null
            ]);
            DB::commit();
            return response_json(true, null, 'User telah berhasil di logout.', $user);
        } catch (\Exception $e) {
            DB::rollback();
            return response_json(false, $e->getMessage() . ' on file ' . $e->getFile() . ' on line number ' . $e->getLine(), 'Terdapat kesalahan saat menyimpan data, silahkan dicoba kembali beberapa saat lagi.');
        }
    }
}
