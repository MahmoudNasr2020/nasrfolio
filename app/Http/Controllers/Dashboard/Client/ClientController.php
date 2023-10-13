<?php

namespace App\Http\Controllers\Dashboard\Client;

use App\DataTables\ClientDataTable;
use App\Http\Controllers\Controller;
use App\Http\Interfaces\Dashboard\ClientRepositoryInterface;
use App\Http\Requests\Dashboard\Client\AddClientRequest;
use App\Http\Requests\Dashboard\Client\UpdateClientRequest;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    private $repository;
    public function __construct(ClientRepositoryInterface $clientRepository)
    {
        $this->repository = $clientRepository;
        $this->middleware('permission:عرض-عميل,admin',['only'=>['index','status']]);
        $this->middleware('permission:اضافة-عميل,admin',['only'=>['store']]);
        $this->middleware('permission:تعديل-عميل,admin',['only'=>['edit','update']]);
        $this->middleware('permission:حذف-عميل,admin',['only'=>['delete','multi_delete']]);
    }
    public function index(ClientDataTable $clientDataTable)
    {
        return $this->repository->index($clientDataTable);
    }

    public function store(AddClientRequest $request)
    {
        return $this->repository->store($request);
    }

    public function edit($id)
    {
        return $this->repository->edit($id);
    }

    public function update(UpdateClientRequest $request,$id)
    {
        return $this->repository->update($request,$id);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }

    public function multi_delete(Request $request)
    {
        return $this->repository->multi_delete($request->data);
    }

    public function status(Request $request)
    {
        return $this->repository->status($request);
    }
}
