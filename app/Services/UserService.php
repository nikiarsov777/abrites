<?php

namespace App\Services;

use App\Models\Group;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserService extends BaseService
{
    public function index(Request $request, string $order = 'id'): Paginator
    {
        return User::where('id', '>', 0)->orderBy($order)->simplePaginate(10);
    }

    public function show(Request $request, int $id): User
    {
        return User::findOrFail($id);
    }

    public function create(Request $request, bool $verified=false): User
    {
        $this->validator($request->all())->validate();
        $dateTime = Carbon::now();

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        if($verified) {
            $user->email_verified_at = $dateTime;
        }

        $user->save();

        if(!$verified) {
            $user->sendVerificationMail();
        }

        return $user;
    }

    public function update(Request $request, int $id): User
    {
        $excludes = [];
        if ($request->password == '') {
            $excludes[] = 'password';
            $excludes[] = 'password_confirmation';
        }
        $this->validator($request->all(), $excludes)->validate();

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        
        $user->save();

        return $user;
    }


    public function delete(Request $request, int $id)
    {
        User::findOrFail($id)->delete();
    }

    protected function validator(array $data, array $excludes = [])
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'min:8', 'confirmed', 'required_with:password_confirmed'],
            'password_confirmation' => ['required', 'same:password'],
        ];

        foreach ($excludes as $exclude) {
            if (array_key_exists($exclude, $rules)) {
                unset($rules[$exclude]);
            }
        }
        return Validator::make($data, $rules);
    }
}
