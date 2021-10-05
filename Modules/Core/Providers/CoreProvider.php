<?php 

namespace Modules\Core\Providers;
use Illuminate\Support\Facades\Auth;

class CoreProvider
{
	public function main_menu()
	{
	    return [
	        [
	            'icon' => 'mdi-desktop-mac-dashboard',
	            'icon-alt' => 'mdi-chevron-down',
	            'text' => 'Dashboard',
	            'uri' => 'dashboard.index',
	            'model' => false,
	            'show' => in_array('dashboard.index', Auth::user()->jabatan ? Auth::user()->jabatan->hak_akses : []),
	            'children' => null
	        ],
	        [
	            'icon' => 'mdi-database',
	            'icon-alt' => 'mdi-chevron-down',
	            'text' => 'Master Data',
	            'model' => false,
	            'show' => true,
	            'children' => [
	                [
	                    'icon' => 'mdi-adjust',
	                    'text' => 'Jabatan',
	                    'uri' => 'jabatan.index',
	                    'model' => false,
	                    'show' => in_array('jabatan.index', Auth::user()->jabatan ? Auth::user()->jabatan->hak_akses : [])
	                ],
	                [
	                    'icon' => 'mdi-adjust',
	                    'text' => 'Karyawan / Mitra',
	                    'uri' => 'user.index',
	                    'model' => false,
	                    'show' => in_array('user.index', Auth::user()->jabatan ? Auth::user()->jabatan->hak_akses : [])
	                ],
	            ]
	        ],
	        [  
	            'icon' => 'mdi-history',
	            'icon-alt' => 'mdi-chevron-down',
	            'text' => 'Log Aktivitas',
	            'uri' => 'riwayat.index',
	            'model' => false,
	            'show' => in_array('riwayat.index', Auth::user()->jabatan ? Auth::user()->jabatan->hak_akses : []),
	            'children' => null
	        ],
	    ];
	}
}