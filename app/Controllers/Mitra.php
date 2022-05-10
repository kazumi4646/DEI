<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Mitra extends BaseController
{
	public function index()
	{
		if (logged_in()) {
			return redirect()->back();
		}

		$data = [
			'province' => $this->provinceModel->findAll(),
		];

		return view('auth/register_mitra', ['data' => $data]);
	}

	public function ajax_city($province)
	{
		$data = "<option value=''>Kabupaten/Kota</option>";
		$cities = $this->regencyModel->getCity($province)->getResult();

		foreach ($cities as $city) {
			$data .= "<option value='". $city->name ."'>". $city->name ."</option>";
		}

		echo $data;
	}

	public function ajax_district($city)
	{
		$data = "<option value=''>Kecamatan</option>";
		$districts = $this->districtModel->getDistrict($city)->getResult();

		foreach ($districts as $district) {
			$data .= "<option value='". $district->name ."'>". $district->name ."</option>";
		}

		echo $data;
	}

	public function ajax_village($district)
	{
		$data = "<option value=''>Kelurahan/Desa</option>";
		$villages = $this->villageModel->getVillage($district)->getResult();

		foreach ($villages as $village) {
			$data .= "<option value='". $village->name ."'>". $village->name ."</option>";
		}

		echo $data;
	}

	public function register()
	{
		// Validate basics first since some password rules rely on these fields
		$rules = [
			'username' => [
				'rules' => 'required|alpha_numeric|min_length[5]|max_length[30]|is_unique[users.username]',
				'errors' => [
					'required' => 'This field is required.',
					'alpha_numeric' => 'Username should only contain alphanumeric characters.',
					'min_length' => 'Username must be at least 5 characters in length.',
					'max_length' => 'Username cannot exceed 30 characters in length.',
					'is_unique' => 'This username is already taken.',
				]
			],
			'email'    => [
				'rules' => 'required|valid_email|is_unique[users.email]',
				'errors' => [
					'required' => 'This field is required.',
					'valid_email' => 'Email is not valid.',
					'is_unique' => 'This email is already registered.',
				]
			],
			'name'    => [
				'rules' => 'required|alpha_space|min_length[3]',
				'errors' => [
					'required' => 'This field is required.',
					'alpha_space' => 'Name should only contain alphabetic characters or spaces.',
					'min_length' => 'Name should be at least 3 characters in length.',
				]
			],
			'birth'    => [
				'rules' => 'required|valid_date',
				'errors' => [
					'required' => 'This field is required.',
					'valid_date' => 'Birth of Date is not valid.',
				]
			],
			'no_ktp'    => [
				'rules' => 'required|numeric|min_length[16]|max_length[16]',
				'errors' => [
					'required' => 'This field is required.',
					'numeric' => 'NIK should only contain numeric.',
					'min_length' => 'NIK should contain 16 digit numeric.',
					'max_length' => 'NIK should contain 16 digit numeric.',
				]
			],
			'no_kk'    => [
				'rules' => 'required|numeric|min_length[16]|max_length[16]',
				'errors' => [
					'required' => 'This field is required.',
					'numeric' => 'No. KK should only contain numeric.',
					'min_length' => 'NIK should contain 16 digit numeric.',
					'max_length' => 'NIK should contain 16 digit numeric.',
				]
			],
			'province'    => [
				'rules' => 'required',
				'errors' => [
					'required' => 'This field is required.',
				]
			],
			'city'    => [
				'rules' => 'required',
				'errors' => [
					'required' => 'This field is required.',
				]
			],
			'districts'    => [
				'rules' => 'required',
				'errors' => [
					'required' => 'This field is required.',
				]
			],
			'village'    => [
				'rules' => 'required',
				'errors' => [
					'required' => 'This field is required.',
				]
			],
			'komoditas'    => [
				'rules' => 'required|numeric',
				'errors' => [
					'required' => 'This field is required.',
					'numeric' => 'Komoditas should only contain numeric.',
				]
			],
			'populasi'    => [
				'rules' => 'required|numeric',
				'errors' => [
					'required' => 'This field is required.',
					'numeric' => 'Populasi should only contain numeric.',
				]
			],
			'tahun_tanam'    => [
				'rules' => 'required|numeric',
				'errors' => [
					'required' => 'This field is required.',
					'numeric' => 'Tahun Tanam should only contain numeric.',
				]
			],
			'luas_lahan'    => [
				'rules' => 'required|numeric',
				'errors' => [
					'required' => 'This field is required.',
					'numeric' => 'Luas Lahan should only contain numeric.',
				]
			],
			'jumlah_panen'    => [
				'rules' => 'required|numeric',
				'errors' => [
					'required' => 'This field is required.',
					'numeric' => 'Jumlah Panen should only contain numeric.',
				]
			],
		];

		if (! $this->validate($rules))
		{
			return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
		}

		// Validate passwords since they can only be validated properly here
		$rules = [
			'password'     => [
				'rules' => 'required|strong_password',
				'errors' => [
					'required' => 'Password cannot be empty.',
				]
			],
			'pass_confirm' => [
				'rules' => 'required|matches[password]',
				'errors' => [
					'required' => ' ',
					'matches' => "Those passwords didn't match. Try again.",
				]
			],
		];

		if (! $this->validate($rules))
		{
			return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
		}

		$data = $this->request->getPost();

		$this->userModel->withGroup('mitra')->insert([
			'email' => $data['email'],
			'username' => $data['username'],
			'fullname' => $data['name'],
			'birth' => $data['birth'],
			'password_hash' => password_hash(base64_encode(hash('sha384', $data['password'], true)), PASSWORD_DEFAULT, [10]),
			'active' => 1,
			'created_at' => date('Y-m-d H:i:s'),
		]);

		$this->mitraModel->insert([
			'username' => $data['username'],
			'name' => $data['name'],
			'no_ktp' => $data['no_ktp'],
			'no_kk' => $data['no_kk'],
			'province' => $data['province'],
			'city' => $data['city'],
			'district' => $data['districts'],
			'village' => $data['village'],
			'komoditas' => $data['komoditas'],
			'populasi' => $data['populasi'],
			'tahun_tanam' => $data['tahun_tanam'],
			'luas_lahan' => $data['luas_lahan'],
			'jumlah_panen' => $data['jumlah_panen'],
		]);

		return redirect()->route('login')->with('success', 'Welcome aboard! Please login with your new credentials.');
	}

	public function request_product($id)
	{
		$data = [
			'request' => 'Requested',
		];

		$this->productModel->where('id', $id)->set($data)->update();

		return redirect()->to(base_url('/requests'))->with('success', 'Product requested!');
	}

	public function cancel_request($id)
	{
		$data = [
			'request' => 'Not Requested',
		];

		$this->productModel->where('id', $id)->set($data)->update();

		return redirect()->to(base_url('/requests'))->with('success', 'Product Request removed!');
	}
}
