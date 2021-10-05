<?php

if (! function_exists('provinces_list')) {
    function provinces_list() {
        return Modules\Core\Entities\Province::get(['name', 'city', 'district']);
    }
}
