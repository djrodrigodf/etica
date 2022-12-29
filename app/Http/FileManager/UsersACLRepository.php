<?php

namespace App\Http\FileManager;

use Alexusmai\LaravelFileManager\Services\ACLService\ACLRepository;
use App\Models\BusinessPartner;
use Auth;
use Illuminate\Support\Str;

class UsersACLRepository implements ACLRepository
{

    public function __construct()
    {
        $pns = BusinessPartner::all();
        foreach ($pns as $pn) {
            if (empty(\Storage::directories('public/users/'.\Str::slug($pn->name)))) {
                \Storage::makeDirectory('public/users/'.\Str::slug($pn->name));
        }

        }
    }

    /**
     * Get user ID
     *
     * @return int|string|null
     */
    public function getUserID(): int|string|null
    {
        return Auth::id();
    }


    /**
     * Get ACL rules list for user
     *
     * @return array
     */
    public function getRules(): array
    {
        //if (Auth::id() === 1) {
        //    return [
        //        ['disk' => 'users', 'path' => '*', 'access' => 2],
        //    ];
        //}
        //['disk' => 'users', 'path' => Str::slug(\Request::get('leftPath')).'/*', 'access' => 2],  // read and write
        return [

            ['disk' => 'users', 'path' => '*', 'access' => 2],  // read and write



        ];
    }
}
