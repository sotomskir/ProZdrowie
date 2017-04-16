<?php

namespace App\Http\Controllers;

use App\Presenters\UserPresenter;
use App\Services\DictionaryService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $dicts;

    /**
     * Create a new controller instance.
     * @param DictionaryService $dicts
     */
    public function __construct(DictionaryService $dicts)
    {
        $this->middleware('auth');
        $this->dicts = $dicts;
    }

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /**
         * 1. Usuwam pobieranie usera z fasady Auth ($user = \Auth::user();),
         * tylko dlatego, że moduł Auth, podpina obiek zalogowanego usera do requestu HTTP,
         * wystarczy go pobrać z kontenera DependencyInjection - dodaje w parametrze metody
         *
         * 2. Usuwam odwołanie do pomiarów ($user->measurements()->get()->last();)
         *
         * 3. zmieniam nazwę i folder zwracanego widoku blade, chce, żeby one też miały
         * sens i równocześnie odnosiły się do naszych ustaleń z mapy historyjek
         *
         * 4. zmieniam przekazywane do widoku paramety w klasę Presenter, która stanowi wrapper
         * na obiekt User - to implementacja wzorca Decorator - nie mylić z Zendem :)
         * http://culttt.com/2014/04/23/decorator-pattern/
         * wyorzystuje do tego nie używane w repo klasy Presenters, wartości z klasy User mają
         * sens rontowy tylko z słownikami, dlatego do presentera dokładam Service Dicts, jego
         * refactor później...
         *
         * 5. Dokładam serwis Dicts jako zależnośc do presentera, żeby nie mieszać przeznaczenia klas
         */
        return view('profile.index', [
            'user' => new UserPresenter($request->user(), $this->dicts)
        ]);
    }
}
