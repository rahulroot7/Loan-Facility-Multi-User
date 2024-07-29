<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserService
{
    /**
     * @userCreateUpdate
     *  manipulateInput
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    function userCreateUpdate($request, $id = null)
    {
        try {
            DB::beginTransaction();
            $user = User::updateOrCreate(
                [
                    'id'   => $id
                ],
                [
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone'   => $request->phone,
                    'password' => Hash::make($request->password),
                    'full_name' => $request->full_name,
                    'father_name' => $request->father_name,
                    'aadhar_number'   => $request->aadhar_number,
                    'address'   => $request->address,
                    'area'   => $request->area,
                    'role' => 3,
                ]
            );
            DB::commit();
            return '200';
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }
}
