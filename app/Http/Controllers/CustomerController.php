<?php

namespace App\Http\Controllers;

use App\Services\CustomerService;
use Gate;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('admin')) {
            return response()->json(
                [
                    'customers' => $this->customerService->getCustomers()
                ],
                200
            );
        }

        return response()->json(['error' => 'Forbidden'], 403);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * @param CreateUserRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        if (Gate::allows('admin')) {
            try {
                return response()->json(
                    [
                        'user' => $this->customerService->create($request)
                    ],
                    200
                );
            } catch (\Exception $e) {
                //todo: log stuff
                return response()->json(['error' => 'Something went wrong'], 500);
            }
        }

        return response()->json(['error' => 'Forbidden'], 403);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Gate::allows('admin')) {
            return response()->json(
                [
                    'user' => $this->customerService->find($id)
                ],
                200
            );
        }

        return response()->json(['error' => 'Forbidden'], 403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * @param UpdateUserRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        if (Gate::allows('admin')) {
            try {
                return response()->json(
                    [
                        'user' => $this->customerService->update($request, $id)
                    ],
                    200
                );
            } catch (\Exception $e) {
                //todo: log stuff
                return response()->json(['error' => 'Something went wrong'], 500);
            }
        }

        return response()->json(['error' => 'Forbidden'], 403);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::allows('admin')) {
            try {
                $this->customerService->delete($id);
                return response()->json([], 200);
            } catch (\Exception $e) {
                //todo: log stuff
                return response()->json(['error' => 'Something went wrong'], 500);
            }
        }

        return response()->json(['error' => 'Forbidden'], 403);
    }
}
