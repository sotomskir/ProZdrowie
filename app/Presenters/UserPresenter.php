<?php namespace App\Presenters;

use App\Models\User;
use App\Services\DictionaryService;

class UserPresenter
{
    protected $person;
    protected $dict;

    public function __construct(User $person, DictionaryService $dict)
    {
        $this->person = $person;
        $this->dict = $dict;
    }

    public function printHtml()
    {
        $dicts = Dicts::getInstance();
        $html = $this->person->getFirstName() . '<br>'
            . $this->person->getLastname() . '<br>'
            . $dicts->translate('SEX', $this->person->getSex()) . '<br>'
            . $dicts->translate('PAL', $this->person->getPal()) . '<br>'
            . 'BMI:' . $dicts->translate('BMI', $this->person->bmi()) . '<br>';

        return $html;
    }

    public function getFullName()
    {
        return $this->getFirstName() . ' ' . $this->getLastname();
    }

    public function getFirstName()
    {
        return $this->person->first_name;
    }

    public function getLastname()
    {
        return $this->person->last_name;
    }

    public function getGravatar()
    {
        return "http://www.gravatar.com/avatar/" . md5(strtolower(trim($this->getEmail())));
    }

    public function getEmail()
    {
        return $this->person->email;
    }

    public function getMembershipTime()
    {
        return 'Zarejestrowany <br>' . $this->person->created_at->diffForHumans();
    }

    public function bmi()
    {
        return number_format($this->person->bmi, 0);
    }

    public function bmiDescription()
    {
        return $this->dict->translate('BMI', $this->bmi());
    }

    public function bmiAlert()
    {
        return $this->bmi() > 25 ? 'alert-danger' : 'alert-info';
    }

    public function sex()
    {
        return $this->dict->translate('SEX', $this->person->sex . '.0');
    }

    public function weight()
    {
        return $this->person->weight . ' kg';
    }

    public function weightBallance()
    {
        $weightDifference =  $this->person->weightDiff;
        $arrow = 'fa-angle-' . (abs($weightDifference) > 10 ? 'double-' : '') . ($weightDifference > 0 ? 'up' : 'down');
        $sign = $weightDifference > 0 ? '+' : '';
        return "$sign$weightDifference kg <i class=\"$arrow\"></i>";
    }

    public function age()
    {
        //TODO
        return 28 . ' lat';
    }
}