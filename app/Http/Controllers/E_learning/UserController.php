<?php

namespace App\Http\Controllers\E_learning;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\E_learning\UserRepository;
use Exception;
use Auth;

class UserController extends Controller
{
    protected $repository;
  
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }
  
    public function index(Request $request)
    {
        $items = $this->repository->paginate($request);
        return view('e_learning.admin.users.index',compact('items'));
    }
  
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|alpha|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:15',
            'cpassword' => 'required|same:password',
        ],[
            'cpassword.required' => 'The confirm password field is required.',
            'cpassword.same' => 'The confirm password and password must match.',
        ]);

        try {
            $item = $this->repository->store($request);
            return redirect()->route('admin.user')->with('success','Data berhasil disimpan.');
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }
  
    public function update($id, Request $request)
    {
        try {
            $item = $this->repository->update($id, $request);
            return redirect(route('userlist'));
        } catch (Exception $e) {
           return response()->json(['message' => $e->getMessage()], $e->getStatus());
        }
    }
  
    public function show($id)
    {
        try {
            $item = $this->repository->show($id);
            return response()->json(['item' => $item]);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getStatus());
        }
    }

    public function edit($id)
    {
        $item = $this->repository->show($id);
        return view('update_user',compact('item'));
    }

    public function delete($id)
    {
        try {
            $this->repository->delete($id);
            return redirect(route('userlist'));
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getStatus());
        }
    }

    public function postlogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6|max:15',
        ],[
            'email.exists' => 'This email is not registered into our system.'
        ]);
        if(Auth::guard('web')->attempt($request->only('email','password'))){
            return redirect()->route('admin.home');
        }else{
            return redirect()->route('admin.login')->with('error','Email atau Password salah.');
        }
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }
}