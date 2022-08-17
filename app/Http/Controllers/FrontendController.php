<?php

namespace App\Http\Controllers;

use App\czaspracy\Gateways\FrontendGateway;
use App\czaspracy\Interfaces\FrontendRepositoryInterface;
use Illuminate\Http\Request;

class FrontendController extends Controller
{

    /**
     * FrontendController constructor.
     */
    public function __construct(FrontendRepositoryInterface $fR, FrontendGateway $fG)
    {
        //w only(tablica z nazwami metod ktore chce zabezpieczyc przed logowaniem - czynie to zamiast robic rout-y w web.php - jest to inna metoda)
        //$this->middleware('auth')->only(['addOpinion', 'addReservation']);

        //mamy widoczne repozytorium i gateway we wszystkich metodach tej klasy
        //robie tak bo prawie kazda metoda tutaj bedzie korzystac z tych wzorcow
        $this->fR = $fR;
        $this->fG = $fG;
    }

    public function welcome()
    {
        return view('welcome');
    }

    //strona główna
    public function index()
    {
        return view("frontend.index");
    }

    //zakładka info o stronie
    public function about()
    {
        return view('frontend.about');
    }

    //aktualne zmiany
    public function currentShifts()
    {

        //zwraca kto na zmianie tego dnia
        $listOfUsers = $this->fR->getUsersWorkList();

        //dd($listOfUsers);

        return view('frontend.currentShifts');
    }



    //zwraca widok formularzu dodania

}
