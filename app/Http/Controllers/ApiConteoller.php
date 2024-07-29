<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\CustomerView;
use Illuminate\Support\Facades\Hash;


class ApiConteoller extends Controller
{
    /**
     * Authenticate the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'eme_number' => 'required|string',  // Add validation for EME number
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Credentials do not match our records.',
            ], 403);
        }

        if ($user->status != '1') {
            return response()->json([
                'status' => 'failed',
                'message' => 'User account is inactive.',
            ], 403);
        }        
        // Check if the EME number is null or if it matches the provided one
        if (is_null($user->eme_number)) {
            // Update the EME number
            $user->eme_number = $request->eme_number;
            $user->save();
        } else {
            // Check if the EME number matches
            if ($user->eme_number != $request->eme_number) {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'User already logged in with a different EME number.',
                ], 403);
            }
        }

        $superAdmin = config('constants.roles.users');
        if ($user->role == $superAdmin) {
            $data['token'] = $user->createToken($request->email)->plainTextToken;
            $data['user'] = $user;

            return response()->json([
                'status' => 'success',
                'message' => 'User is logged in successfully.',
                'data' => $data,
            ], 200);
        }

        return response()->json([
            'status' => 'failed',
            'message' => 'User does not have the necessary role.',
        ], 403);
    } 

    /**
     * Log out the user from application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'User is logged out successfully'
            ], 200);
    }


    // Vehicle Search and view
    
    /**
     * searchVehicle
     *
     * @param  mixed $request
     * @return void
     */
    public function searchVehicle(Request $request)
    {
        $request->validate([
            'number' => 'nullable|string',
        ]);
        $number = $request->input('number');
        
        $query = Vehicle::query();

        if (!empty($number)) {
            $query->where('engine_no', 'like', '%' . $number . '%')
                  ->orWhere('chassis_no', 'like', '%' . $number . '%')
                  ->orWhere('reg_number', 'like', '%' . $number . '%');
        }

        $vehicles = $query->get();

        if ($vehicles->isEmpty()) {
            return response()->json([
                'status' => 'failed',
                'message' => 'No vehicles found matching the provided criteria.',
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Vehicles retrieved successfully.',
            'data' => $vehicles,
        ], 200);
    }
    
    /**
     * viewVehicle
     *
     * @return void
     */
    public function viewVehicle(vehicle $vehicle)
    {
        $customer = Vehicle::findOrFail($vehicle->id);
        // Record the view
         CustomerView::create([
            'user_id' => Auth::id(),
            'customer_id' => $customer->id,
        ]);
        return response()->json([
            'status' => 'success',
            'message' => 'Vehicles retrieved successfully.',
            'data' => $vehicle,
        ], 200);
    }
}
