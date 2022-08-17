<?php

namespace App\czaspracy\Gateways;

use App\czaspracy\Interfaces\BackendRepositoryInterface;
use Illuminate\Foundation\Validation\ValidatesRequests;

class BackendGateway
{

    use ValidatesRequests; //import z Controller.php - potrzebny do zastos. tu metody validate()

    /**
     * BackendGateway constructor.
     */
    public function __construct(BackendRepositoryInterface $bR)
    {
        $this->bR = $bR;
    }

    public function saveWorkData($request)
    {

        //walidacja
        $rules = array(
            'work_day_in' => array('required', 'date_format:Y-m-d'),
            'work_day_out' => array('required', 'date_format:Y-m-d', 'after_or_equal:work_day_in'),
            'work_time_in' => array('required', 'date_format:H:i'),
            'work_time_out' => array('required', 'date_format:H:i', 'after:work_time_in'),
            'enterUser' => array('required'),
        );

        $error_messages = array(
            'work_day_in.required' => 'Data START jest wymagane',
            'work_day_out.required' => 'Data END jest wymagane',
            'work_time_in.required' => 'Godzina START jest wymagane',
            'work_time_out.required' => 'Godzina START jest wymagane',

            'enterUser.required' => 'Używkownik jest wymagany',

            'work_day_in.date_format' => 'Data START wymaga poprawnego formatu: Rok-miesiąc-dzień',
            'work_day_out.date_format' => 'Data END wymaga poprawnego formatu: Rok-miesiąc-dzień',
            'work_day_out.after_or_equal' => 'Nie możesz podać DATY wstecz!',

            'work_time_in.date_format' => 'Godzina START musi być formatu: HH:mm',
            'work_time_out.date_format' => 'Godzina END musi być formatu: HH:mm',
            'work_time_out.after' => 'Nie możesz podać GODZINY wstecz!',

        );

        //dd($request);

        //jesli validate() nie przejdzie to kod ponizej nie zostanie wykonany.
        $this->validate($request, $rules, $error_messages);

        //pobierz czas pracy dla wprowadzanego user-a (id usera z formularza)
        $userWorks = $this->bR->getUserWorksById($request->enterUser);

        //dd($userWork);

        //flaga pomocnicza
        $flag = true;

        foreach ($userWorks as $userWork)
        {
            //jesli data STARTU PRACY wejde w przedzial istniejącej pracy - nie moge jej dodać
            if($request->input('work_day_in') >= $userWork->work_day_in && $request->input('work_day_out') <= $userWork->work_day_out)
            {
                $flag = false;
                break;
            }
            //jesli data KONCA PRACY wejde w przedzial istniejącej pracy - nie moge jej dodać
            elseif ($request->input('work_day_out') >= $userWork->work_day_in
                && $request->input('work_day_out') <= $userWork->work_day_out)
            {
                $flag = false;
                break;
            }
            //jesli mamy work_day_in = 1 pazdziernik a work_day_out = 15 a w BD 5-10 pazdziernik -obejme przedzial - nie moge go zarezerwowac
            elseif ($request->input('work_day_in') <= $userWork->work_day_in
                && $request->input('work_day_out') >= $userWork->work_day_out)
            {
                $flag = false;
                break;
            }

        }

        if(!$flag)
        {
            return $flag;
        }

        //walidacja przeszla = zapisz usera w bd
        return $this->bR->saveWorkData($request);

    }
}
