<?php

namespace App\czaspracy\Repositories;

use App\czaspracy\Interfaces\FrontendRepositoryInterface;
use Illuminate\Support\Facades\DB;

//komunikacja z BD

class FrontendRepository implements FrontendRepositoryInterface
{

    public function getUsersWorkList()
    {
        $res = DB::statement('SELECT * FROM users');

        //dd($res);

        return $res;
    }
}
