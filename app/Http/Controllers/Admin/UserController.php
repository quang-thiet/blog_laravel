<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\updateUserRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function index()
    {
        $users = User::paginate(10);
        return view('screen.admin.user-list', compact('users'));
    }
    public function add()
    {
        return view('screen.admin.user-add');
    }
    public function store(UserRequest $request)
    {

        $data = $request->all();
        $fileExtension = $request->file('thumbnail')->getClientOriginalExtension();
        $fileName = 'user-' . time() . '.' . $fileExtension;
        $request->file('thumbnail')->move('images/users', $fileName);
        $data['avatar'] = $fileName;
        $data['password'] = Hash::make($request->password);
        $data['created_at'] = now();
        $data['updated_at'] = now();
        User::create($data);

        return redirect()
            ->route('user.list')
            ->with('success', 'Thêm user thành công');
    }

    public function user_profile(){
        view('screen.admin.user-profile');
    }

    public function edit($id)
    {
        $user = User::all()->where('id', $id)->first();
        return view('screen.admin.user-edit', compact('user'));
    }

    public function update(updateUserRequest $request,$id )
    {

        $data = $request->all();

        if (isset($data['thumbnail'])) {
            $fileExtension = $request->file('thumbnail')->getClientOriginalExtension();
        $fileName = 'user-' . time() . '.' . $fileExtension;
        $request->file('thumbnail')->move('images/users', $fileName);
        $data['avatar'] = $fileName;
        $data['password'] = Hash::make($request->password);
        $data['created_at'] = now();
        $data['updated_at'] = now();
        }
        User::find($id)->update($data);

        return redirect()
            ->route('user.list')
            ->with('success', ' cập nhật thành công thành công');
    }

    public function destroy($id)
    {
        $cat = User::find($id);
        $cat->delete();
        return redirect()->back()->with('success', 'Xóa danh user thành công !');
    }
}
