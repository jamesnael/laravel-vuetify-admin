<?php

namespace Modules\Core\Http\Controllers\Province;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Core\Entities\Province;

class ProvinceController extends Controller
{
    /**
     * Return a listing of the resource.
     * @return Response
     */
    public function provinceList()
    {
        return response_json(true, null, 'Data Retrieved', Province::get(['name', 'city', 'district']));
    }
}
