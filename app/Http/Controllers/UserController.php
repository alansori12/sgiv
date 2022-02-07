<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use Exception;

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
        return view('data_user',compact('items'));
    }
  
    public function create()
    {
            return view('insert_user');
    }
    
    public function store(Request $request)
    {
        try {
            $item = $this->repository->store($request);
            return redirect(route('userlist'));
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
}
