<?php namespace Dicts\Services;

class DictsService {
	protected static $instance = null;
	protected $dicts;
	protected $dicts1;
	protected $dicts2;
	protected $dictsType;
    protected $dictsRepository1;
    protected $dictsRepository2;

    public function __construct() {
        //$this->dictsRepository = new PdoDictsRepository();
        $this->dictsRepository1 = new IniDictsRepository(__DIR__ . '/../../storage/dicts1.ini');
        $this->dicts1 = $this->dictsRepository1->findAll();
		foreach($this->dicts1 as $par =>$v){
			//echo '<br>'.$par;
			$this->dictsType[$par]=1;
		}
		
        $this->dictsRepository2 = new IniDictsRepository(__DIR__ . '/../../storage/dicts2.ini');
        $this->dicts2 = $this->dictsRepository2->findAll();
		foreach($this->dicts2 as $par =>$values){
			//echo '<br>'.$par;
			$this->dictsType[$par]=2;
		}
		$this->dicts=array_merge($this->dicts1,$this->dicts2);
		/*
		$this->dictsType=array_keys($this->dicts);
		*/
//		dump($this->dicts);
//		dump($this->dictsType);
	}

	public function translate($dict, $key)
	{
		if(array_key_exists($dict,$this->dictsType)){
			//echo '<br>'.$this->dictsType[$dict];
			if($this->dictsType[$dict]==1){
				if(array_key_exists($key, $this->dicts[$dict])) {
					return $this->dicts[$dict][$key];
				}
				return 'Brak wartosci w słowniku 2';
			}
			if($this->dictsType[$dict]=2){
				// trudna część
				foreach($this->dicts[$dict] as $k => $v){
					//echo '<br>'.$k;
					$last=$v;
					if($key<=$k){
						return $this->dicts[$dict][$k];
					}
				}
				return $last;
			}
		}
		return 'Brak wartosci w słowniku 1';
	}
}