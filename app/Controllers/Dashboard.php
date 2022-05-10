<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
	public function index()
	{
		if (in_groups('admin')) {
			$data = [
				'title' => 'Admin Dashboard | Desa Ekspor Indonesia',
				'requests' => $this->productModel->where('request', 'Requested')->countAllResults(),
				'orders' => 0,
			];

			return view('admin/dashboard', ['data' => $data]);
		}

		if (in_groups('mitra')) {
			$data = [
				'title' => 'Mitra Dashboard | Desa Ekspor Indonesia',
				'status' => $this->mitraModel->select('pembayaran_koperasi')->where('username', user()->username)->get()->getResultArray(),
				'requests' => $this->productModel->where('seller_id', user()->id)->where('request', 'Approved')->findAll(),
			];

			return view('mitra/dashboard', ['data' => $data]);
		}

		if (in_groups('user')) {
			return redirect()->to(base_url('/cart'));
		}
	}

	public function requests()
	{
		if (in_groups('admin')) {
			$data = [
				'title' => 'Product Request | Desa Ekspor Indonesia',
				'requests' => $this->productModel->getProductRequest()->getResultArray(),
			];

			return view('admin/requests', ['data' => $data]);
		}

		if (in_groups('mitra')) {
			$data = [
				'title' => 'Request Product | Desa Ekspor Indonesia',
				'requests' => $this->productModel->where('seller_id', user()->id)->findAll(),
			];

			return view('mitra/requests', ['data' => $data]);
		}
	}

	public function profile()
	{
		if (in_groups('mitra')) {
			$data = [
				'title' => 'Edit Profile | Desa Ekspor Indonesia',
				'mitra' => $this->mitraModel->where('username', user()->username)->find(),
				'province' => $this->provinceModel->findAll(),
			];

			return view('mitra/profile', ['data' => $data]);
		}

		if (in_groups('user')) {
			$page = [
				'title' => 'Edit Profile | Desa Ekspor Indonesia',
				'user' => $this->userModel->where('username', user()->username)->find(),
				'province' => $this->provinceModel->findAll(),
			];

			return view('user/profile', ['page' => $page]);
		}
	}

	public function update_profile($id)
	{
		if (in_groups('mitra')) {
			$rules = [
				'name'    => [
					'rules' => 'required|min_length[3]',
					'errors' => [
						'required' => 'This field is required.',
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
				'address' => [
					'rules' => 'required',
					'errors' => [
						'required' => 'This field is required.',
					]
				],
			];

			if (!$this->validate($rules)) {
				return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
			}

			$data = $this->request->getPost();

			$this->userModel->where('id', $id)->set([
				'fullname' => $data['name'],
				'birth' => $data['birth'],
				'address' => $data['address'],
			])->update();

			$this->mitraModel->where('username', $data['username'])->set([
				'name' => $data['name'],
				'no_ktp' => $data['no_ktp'],
				'no_kk' => $data['no_kk'],
				'province' => $data['province'],
				'city' => $data['city'],
				'district' => $data['districts'],
				'village' => $data['village'],
			])->update();
		}

		if (in_groups('user')) {
			$rules = [
				'fullname'    => [
					'rules' => 'required|min_length[3]',
					'errors' => [
						'required' => 'This field is required.',
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
				'telp' => [
					'rules' => 'required|numeric',
					'errors' => [
						'required' => 'This field is required.',
						'numeric' => 'Phone number is not valid.',
					]
				],
				'address' => [
					'rules' => 'required',
					'errors' => [
						'required' => 'This field is required.',
					]
				],
			];

			$data = $this->request->getPost();

			$this->userModel->where('id', $id)->set([
				'fullname' => $data['fullname'],
				'birth' => $data['birth'],
				'address' => $data['address'],
				'telp' => $data['telp'],
			])->update();
		}

		return redirect()->to(base_url('/profile'))->with('success', 'Profile changes saved successfully!');
	}
}
