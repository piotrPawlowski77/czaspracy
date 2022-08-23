<?php

namespace App\Http\Controllers;

use App\czaspracy\Gateways\BackendGateway;
use App\czaspracy\Interfaces\BackendRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BackendController extends Controller
{

    /**
     * BackendController constructor.
     */
    public function __construct(BackendRepositoryInterface $bR, BackendGateway $bG)
    {
        //$this->middleware('CheckAdmin')->only(['myCars', 'carPanel', 'confirmReservation']);

        //mamy widoczne repozytorium i gateway w all metodach tej klasy
        $this->bR = $bR;
        $this->bG = $bG;

    }

    public function index()
    {
        return view('backend.index');
    }

    //zakładka info o stronie
    public function setSchedule(Request $request)
    {
        //zalogowany uzytkownik
        $user = Auth::user();

        //zmienna zawiera liste użytkowników - do inputa
        $allUsers = $this->bR->getAllUsers();

        //jesli post - insert do bazy z formularza
        if($request->isMethod('post'))
        {
            //zapis danych - walidacja
            $workData = $this->bG->saveWorkData($request);

            //dd($workData);
            //dd($request);

            if(!$workData)
            {
                //wyswietl komunikat ze juz w te dni pracuje user!
                //$komunikat = 'Błąd. Użytkownik: '.$workData->user->name .' '.$workData->user->surname .' już pracuje w tych dniach!';
                $komunikat = 'Błąd. Użytkownik: już pracuje w tych dniach!';
            }
            else
            {
                //przekieruj zpowrotem z wiadomością
                $komunikat = 'Ustawiono czas pracy dla: '.$workData->user->name .' '.$workData->user->surname .' od: '. $workData->work_day_in .' do: '. $workData->work_day_out . ' w godzinach: '. $workData->work_time_in .' - '.$workData->work_time_out;
            }


            return redirect()->back()->with('message', $komunikat);

        }

        return view('backend.setSchedule', compact('user', 'allUsers'));
    }


    public function schedule()
    {
        //zalogowany uzytkownik
        $userAuth = Auth::user();

        //zmienna zawiera liste użytkowników, ktorzy maja zmiany
        $users = $this->bR->getAllUsersHaveShifts();

        return view('backend.schedule', compact('userAuth', 'users'));
    }

    //formularz z edycja zmiany
    public function workPanel()
    {
        return view('backend.workPanel');
    }

    //formularz z edycja zmiany
    public function deleteWork($id)
    {
        $this->bR->deleteWork($id);

        return redirect()->back()->with('message', 'Zmiana została usunięta.');
    }

}
