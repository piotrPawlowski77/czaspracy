<?php

namespace App\czaspracy\Repositories;

use App\czaspracy\Interfaces\BackendRepositoryInterface;
use App\Models\User;
use App\Models\Work;

//komunikacja z BD

class BackendRepository implements BackendRepositoryInterface
{
    public function getAllUsers()
    {
        return User::all();
    }

    //zapis dni pracy
    public function saveWorkData($request)
    {
        //nowy czas pracy
        $workDays = new Work();

        $workDays->work_day_in = $request->input('work_day_in');
        $workDays->work_day_out = $request->input('work_day_out');
        $workDays->work_time_in = $request->input('work_time_in');
        $workDays->work_time_out = $request->input('work_time_out');
        $workDays->user_id = $request->input('enterUser');

        $workDays->save();

        return $workDays;
    }

    //pobierz czas pracy dla wprowadzanego user-a (id usera z formularza)
    public function getUserWorksById($enterUser)
    {
        return Work::where('user_id', $enterUser)->get();
    }

    public function getAllUsersHaveShifts()
    {
        //zwroc liste all userow co maja zmiany
        return User::with('works')->has('works')->get();
    }


}
