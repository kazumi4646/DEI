<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Myth\Auth\Password;

class Admin extends BaseController
{
	public function mitra()
	{
		$data = [
			'title' => 'Mitra | Desa Ekspor Indonesia',
			'mitra' => $this->mitraModel->findAll(),
		];

		return view('admin/mitra', ['data' => $data]);
	}

	public function pembayaran_koperasi($id)
	{
		$data = [
			'pembayaran_koperasi' => 'Lunas',
		];

		$this->mitraModel->where('id', $id)->set($data)->update();

		return redirect()->to(base_url('/mitra'))->with('success', 'User payment confirmed!');
	}

	public function accounts()
	{
		$data = [
			'title' => 'User Accounts | Desa Ekspor Indonesia',
			'accounts' => $this->userModel->getAllAccounts()->getResultArray(),
		];

		return view('admin/accounts', ['data' => $data]);
	}

	public function account_status($id)
	{
		$data = [
			'active' => $this->request->getPost('status'),
		];

		$this->userModel->where('id', $id)->set($data)->update();

		if ($data['active'] != 1) {
			return redirect()->to(base_url('/accounts'))->with('success', 'Account deactivated!');
		} else {
			return redirect()->to(base_url('/accounts'))->with('success', 'Account activated!');
		}
	}

	public function delete_account($id)
	{
		$password = $this->request->getPost('confirm');
		$user = $this->userModel->where('username', user()->username)->first();

		if (!Password::verify($password, $user->password_hash)) {
			return redirect()->to(base_url('/accounts'))->with('error', 'Your password is not valid!');
		}

		$this->userModel->delete($id);

		return redirect()->to(base_url('/accounts'))->with('success', 'User account deleted!');
	}

	public function approve_request($id)
	{
		$data = [
			'request' => 'Approved',
			'shop' => 'Showed',
			'reason' => NULL,
		];

		$this->productModel->where('id', $id)->set($data)->update();

		return redirect()->to(base_url('/requests'))->with('success', 'Request approved! Product displayed on shop!');
	}

	public function reject_request()
	{
		$id = $this->request->getPost('id');
		$data = [
			'request' => 'Rejected',
			'reason' => $this->request->getPost('reason'),
		];

		$this->productModel->where('id', $id)->set($data)->update();

		return redirect()->to(base_url('/requests'))->with('success', 'Product Request rejected!');
	}

	public function shop()
	{
		$data = [
			'title' => 'Product Shop | Desa Ekspor Indonesia',
			'shop' => $this->productModel->getShopProduct()->getResultArray(),
		];

		return view('admin/shop', ['data' => $data]);
	}

	public function show($id)
	{
		$data = [
			'shop' => 'Showed',
		];

		$this->productModel->where('id', $id)->set($data)->update();

		return redirect()->to(base_url('/dashboard/shop'))->with('success', 'Product showed to shop!');
	}

	public function remove($id)
	{
		$data = [
			'shop' => 'Not Shown',
		];

		$this->productModel->where('id', $id)->set($data)->update();
		$this->cartModel->where('product_id', $id)->delete();

		return redirect()->to(base_url('/dashboard/shop'))->with('success', 'Product removed from shop!');
	}

	public function delete($id)
	{
		$data = [
			'request' => 'Not Requested',
			'shop' => 'Not Shown',
		];

		$this->productModel->where('id', $id)->set($data)->update();
		$this->cartModel->where('product_id', $id)->delete();

		return redirect()->to(base_url('/dashboard/shop'))->with('success', 'Product removed from list!');
	}
}
