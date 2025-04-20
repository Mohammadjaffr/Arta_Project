<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Interfaces\RepositoriesInterface;


class UserRepository implements RepositoriesInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function index() : \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return User::filter()->paginate(10);
    }

    public function getById($id) : User
    {
        return User::with(['listings'])->findOrFail($id);
    }

    public function store(array $data) : User
    {
        $data['username'] = $this->generateUniqueUsername($data['email']);
        if (!isset($data['image'])) {
            $data['image'] = 'storage/user_images/user.jpg';
        }
        return  User::query()->create($data)->addRole('user');
    }

    public function update(array $data,$id) : User
    {
        $User = $this->getById($id);

        if(!empty($data['image'])){
            if (\File::exists($User->image)) {
                \File::delete($User->image);
            }
            $extions=$data['image']->getclientoriginalextension();
            $filename = uniqid('',true).'.'.$extions;
            $File_path = Storage::putFileAs('Users_images',$data['image'],$filename);
            $File_path ='storage/'.$File_path;
            $data['image']=$File_path;
        }
        $User->update($data);
        return $User;

    }

    public function delete($id) : bool
    {
        $User = $this->getById($id);
        return $User->delete() > 0;
    }

    public function findByEmail($email)
    {
        return User::where('email', $email)->first();
    }

    public function generateUniqueUsername($email)
    {
        $baseUsername = explode('@', $email)[0];
        $uniqueUsername = $baseUsername;

        $count = 1;
        while (User::where('username', $uniqueUsername)->exists()) {
            $uniqueUsername = $baseUsername . '-' . $count;
            $count++;
        }

        return $uniqueUsername;
    }

    public function changePassword(array $data,$user) {
        if(!Hash::check($data['old_password'], $user->password)){
            return false;
        }
        $user->update([
            'password'=>$data['password'],
        ]);
        return true;
    }

    public function assignRole($user_id,$role){
        $user = $this->getById($user_id);
        if(!$user->hasRole($role)){
            $user->addRole($role);
            return $user->getRoles();
        }
        return $user->getRoles();
    }

    public function revokeRole($user_id,$role){
        $user = $this->getById($user_id);
        if($user->hasRole($role)){
            $user->removeRole($role);
            return $user->getRoles();
        }
        return $user->getRoles();
    }
}
