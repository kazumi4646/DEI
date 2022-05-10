<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$page = [
			'title' => 'Desa Ekspor Indonesia',
		];

		return view('home/index', ['page' => $page]);
	}

	public function activity()
	{
		$page = [
			'title' => 'Activity | Desa Ekspor Indonesia',
			'section' => 'Activity',
		];

		return view('home/activity', ['page' => $page]);
	}

	public function release()
	{
		$page = [
			'title' => 'Press Release | Desa Ekspor Indonesia',
			'section' => 'Press Release',
		];

		return view('home/press_release', ['page' => $page]);
	}

	public function history()
	{
		$page = [
			'title' => 'History | Desa Ekspor Indonesia',
			'section' => 'History',
		];

		return view('home/history', ['page' => $page]);
	}

	public function terms()
	{
		$page = [
			'title' => 'Terms of Services | Desa Ekspor Indonesia',
			'section' => 'Terms of Services',
		];

		return view('home/terms', ['page' => $page]);
	}

	public function policy()
	{
		$page = [
			'title' => 'Privacy Policy | Desa Ekspor Indonesia',
			'section' => 'Privacy Policy',
		];

		return view('home/privacy_policy', ['page' => $page]);
	}

	public function vision()
	{
		$page = [
			'title' => 'Vision and Mission | Desa Ekspor Indonesia',
			'section' => 'Vision and Mission',
		];

		return view('home/vision_mission', ['page' => $page]);
	}
}
