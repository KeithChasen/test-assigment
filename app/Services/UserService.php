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
    public function getCustomers()
    {
        return  User::customers()->get();
    }

    /**
     * @param CreateUserRequest $request
     * @return mixed
     */
    public function create(Request $request)
    {
        $createData = [
            'name' => $request->get('name'),
            'role_id' => Role::where('role', Role::CUSTOMER_ROLE)->first()->id
        ];

        if ($request->get('street'))
            $createData['street'] = $request->get('street');

        if ($request->get('street2'))
            $createData['street2'] = $request->get('street2');

        if ($request->get('city'))
            $createData['city'] = $request->get('city');

        if ($request->get('state'))
            $createData['state'] = $request->get('state');

        if ($request->get('zipcode'))
            $createData['zipcode'] = $request->get('zipcode');

        if ($request->get('country'))
            $createData['country'] = $request->get('country');

        if ($request->get('business_id'))
            $createData['business_id'] = $request->get('business_id');

        if ($request->get('service_team'))
            $createData['service_team'] = $request->get('service_team');

        if ($request->get('type'))
            $createData['type'] = $request->get('type');

        return factory(User::class)->create($createData);
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
