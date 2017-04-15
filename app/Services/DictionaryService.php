<?php namespace App\Services;

use App\DictsRepository;
use App\LaravelDictsRepository;
use App\Repositories\Contracts\DictionaryRepository;

class DictionaryService
{
    protected $dictionaries;
    /**
     * @var DictionaryRepository
     */
    private $dictionaryGateway;

    public function __construct(DictionaryRepository $dictionaryGateway)
    {
        /**
         * Tutaj trochę namieszamy :) podstawowa sprawa wyciagniemy interfejs
         * z klasy odpowiedzialnej za pobieranie wartości słowników, żeby go współdzielić
         * między implementacją bazodanową i plikową i ten wyciągniety interfejs wrzucimy
         * jako zaleznośc do konstruktowa, żeby framework sam nam wstrzyknął tą zależność.
         * Będzie to dopiero możliwe po ręcznym wskazaniu jaka implementacja ma być wykorzystana
         * gdy prosimy kontener zalezności o instancję interfejsu
         * https://laravel.com/docs/5.4/container#binding-interfaces-to-implementations
         */
        $this->dictionaryGateway = $dictionaryGateway;

        /**
         * Tu troche sprzątam, zamiast tworzyć wiele instancji słowników, przerzucam pobieranie
         * na jedną zalezność a tą logikę z konstruktora przerzucam na nową metodę, żeby było czytelniej.
         */
        $this->preloadDictionaries();
    }

    public function translate($dict, $key)
    {
        $dictionariesMapping = [
            1 => 'singleDictionary',
            2 => 'rangeDictionary'
        ];
        foreach ($this->dictionaries as $dictionaryKey => $dictionary) {
            if (array_key_exists($dict, $dictionary)) {
                return $this->{$dictionariesMapping[$dictionaryKey] . 'Translate'}($key, $dict);
            }
        }

        return $key;
    }

    protected function singleDictionaryTranslate($key, $dict)
    {
        if (array_key_exists($key, $this->dictionaries[1][$dict])) {
            return $this->dictionaries[1][$dict][$key];
        }
        return $key;
    }

    protected function rangeDictionaryTranslate($key, $dict)
    {
        foreach ($this->dictionaries[2][$dict] as $k => $v) {
            $last = $v;
            if ($key <= $k) {
                return $this->dictionaries[2][$dict][$k];
            }
        }
        return $last;
    }

    protected function preloadDictionaries()
    {
        $this->dictionaries = $this->dictionaryGateway->findAll();
    }
}