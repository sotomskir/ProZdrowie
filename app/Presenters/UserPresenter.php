<?php namespace App\Presenters;

use App\Dictionaries\ObesityType;
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

    public function ppm()
    {
        return number_format($this->person->ppm, 0);
    }

    public function ppmDescription()
    {
        return $this->dict->translate('PPM', $this->ppm());
    }

    public function ppmAlert()
    {
        return $this->ppm() > 25 ? 'alert-danger' : 'alert-info';
    }

    public function cmp()
    {
        return number_format($this->person->cmp, 0);
    }

    public function cmpDescription()
    {
        return $this->dict->translate('CMP', $this->cmp());
    }

    public function cmpAlert()
    {
        return $this->cmp() > 25 ? 'alert-danger' : 'alert-info';
    }

    public function sex()
    {
        return $this->dict->translate('SEX', $this->person->sex . '.0');
    }

    public function weight()
    {
        return $this->person->weight . ' kg';
    }

    public function weightBalance()
    {
        $diff =  $this->person->weightDiff;

        return $this->formattedBalance($diff, 'kg');
    }

    public function obesityType()
    {
        if ($this->person->hasObesity()) {
            if ($this->person->hasAbdominalObesity()) {
                return $this->dict->translate('OBESITY_TYPE', ObesityType::ABDOMINAL_OBESITY);
            }

            return $this->dict->translate('OBESITY_TYPE', ObesityType::BUTTOCK_OBESITY);
        }

        return $this->dict->translate('OBESITY_TYPE', ObesityType::NONE);
    }

    public function heightBalance()
    {
        $diff =  $this->person->heightDiff;

        return $this->formattedBalance($diff, 'cm');
    }

    public function height()
    {
        return $this->person->height . ' cm';
    }

    public function chest()
    {
        return $this->person->chest . ' cm';
    }

    public function chestBalance()
    {
        $diff =  $this->person->chestDiff;

        return $this->formattedBalance($diff, 'cm');
    }

    public function waistBalance()
    {
        $diff =  $this->person->waistDiff;

        return $this->formattedBalance($diff, 'cm');
    }

    public function waist()
    {
        return $this->person->waist . ' cm';
    }

    public function hipsBalance()
    {
        $diff =  $this->person->hipsDiff;

        return $this->formattedBalance($diff, 'cm');
    }

    public function hips()
    {
        return $this->person->hips . ' cm';
    }

    public function bicepsBalance()
    {
        $diff =  $this->person->bicepsDiff;

        return $this->formattedBalance($diff, 'cm');
    }

    public function biceps()
    {
        return $this->person->biceps . ' cm';
    }

    public function thighBalance()
    {
        $diff =  $this->person->thighDiff;

        return $this->formattedBalance($diff, 'cm');
    }

    public function thigh()
    {
        return $this->person->thigh . ' cm';
    }

    public function age()
    {
        //TODO
        return 28 . ' lat';
    }

    private function formattedBalance($diff, $unit): string
    {
        $arrow = 'fa fa-angle-' . (abs($diff) > 10 ? 'double-' : '') . ($diff > 0 ? 'up' : 'down');
        $sign = $diff > 0 ? '+' : '';
        return "$sign$diff $unit <i class=\"$arrow\"></i>";
    }
}