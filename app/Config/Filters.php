<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
// export/(use) path file LoginFilter-nya dulu
use App\Filters\LoginFilter;

class Filters extends BaseConfig
{
	/**
	 * Configures aliases for Filter classes to
	 * make reading things nicer and simpler.
	 *
	 * @var array
	 */
	public $aliases = [
		'csrf'     => CSRF::class,
		'toolbar'  => DebugToolbar::class,
		'honeypot' => Honeypot::class,
		// mendaftarkan aliases untuk 'LoginFilter.php'
		'isLoggedIn' => LoginFilter::class,
	];

	/**
	 * List of filter aliases that are always
	 * applied before and after every request.
	 *
	 * @var array
	 */
	public $globals = [
		'before' => [
			// 'honeypot',
			'csrf',
		],
		'after'  => [
			'toolbar',
			// 'honeypot',
		],
	];

	/**
	 * List of filter aliases that works on a
	 * particular HTTP method (GET, POST, etc.).
	 *
	 * Example:
	 * 'post' => ['csrf', 'throttle']
	 *
	 * @var array
	 */
	public $methods = [];

	/**
	 * List of filter aliases that should run on any
	 * before or after URI patterns.
	 *
	 * Example:
	 * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
	 *
	 * @var array
	 */
	// ini adalah bagian filter-nya
	// 'before' adalah function didalam LoginFilter.php(alias isLoggedIn)
	 public $filters = [
		// cara baca aturan filter ini adalah:
		// jika user belum login kembalikan ke halaman login, dan batasi url hone, gawe, dan gawe/*
		// jadi nanti pasti ketika akses http://localhost:8080/, jika belum login akan diarahkan ke halaman login
		'isLoggedIn' => ['before' => [
			// dibawah ini adalah letak url (didalam routes)
			'home',
			'gawe',
			'gawe/*',
		]]
	];
}