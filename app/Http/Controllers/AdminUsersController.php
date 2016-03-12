<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;
use CodeCommerce\User;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class AdminUsersController extends Controller
{
    private $userModel;

    public function __construct(User $user)
    {
        $this->userModel = $user;
    }
    
    public function index()
    {
        $users = $this->userModel->all();
        return view('users', compact('users'));
    }

    public function destroy($id)
    {
        $this->userModel->find($id)->delete();
        return redirect()->route('admin.users.index');
    }

}
