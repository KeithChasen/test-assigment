<?php

namespace App\Services;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerService
{

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getUserWithRole()
    {
        return  User::with('role')->get();
    }

    /**
     * @param CreateUserRequest $request
     * @return mixed
     */
    public function create(Request $request)
    {
        return User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
            'role_id' => Role::where('role', Role::CUSTOMER_ROLE)->first()->id
        ]);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return User::findOrFail($id);
    }

    /**
     * @param UpdateUserRequest $request
     * @param $id
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        if ($request->get('password')) {
            $user->password = bcrypt($request->get('password'));
        }
        $user->update();
        return $user;
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
    }
}
