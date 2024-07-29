<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Http\Requests\UserRequest;
use App\Models\User;
use App\Services\UserService;
use DB;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public $userService;
    function __construct()
    {
        $this->userService = new UserService;
    }
    /**
     * index
     * show all record and create
     * @return void
     */
    public function index()
    {
        $user = User::get();
        return view('user.index', compact('user'));
    }
    
    /**
     *  @create Show form
     *
     * @return void
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * @store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(UserRequest $request)
    {
        $this->userService->userCreateUpdate($request);
        return redirect()->route('users.index')->with('success', 'User Created Successfull');
    }

    /**
     * @edit
     *
     * @param  mixed $id
     * @return void
     */
    function edit(user $user)
    {
        $userEdit = User::where('id', $user->id)->first();
        return view('user.edit', compact('user', 'userEdit'));
    }

    /**
     * @update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function update(UserRequest $request, $user)
    {
        $this->userService->userCreateUpdate($request, $user);
        return redirect()->route('users.index')->with('success', 'User update successfull');
    }

    public function updateStatus(Request $request)
    {
        $user = User::find($request->id);
        if ($user) {
            $user->status = $request->status;
            if ($user->save()) {
                return response()->json(['success' => true]);
            } else {
                return response()->json(['success' => false]);
            }
        } else {
            return response()->json(['success' => false]);
        }
    }


    /**
     * @view
     *
     * @param  mixed $id
     * @return void
     */
    function view(user $user)
    {
        return view('user.view', compact('user'));
    }

    /**
     * delete
     *
     * @param  mixed $id
     * @return void
     */
    public function delete($user)
    {
        try {
            DB::beginTransaction();
            User::where('id', $user)->Delete();
            DB::commit();
            return redirect()->back()->with('success', 'User Deleted successfull');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('unsuccess', 'Opps Something wrong!');
        }
    }
}
