<?php namespace App;

class LaravelDictsRepository implements DictsRepository
{
    protected $type;

    public function __construct($type)
    {
//        $this->pdo = DbConnection::getInstance()->getConnection();
        $this->type = $type;
    }

    public function findAll()
    {
        $sql = 'SELECT d.name, v.key, v.value 
                FROM dicts d 
                JOIN dict_values v 
                ON d.id = v.dict_id
                WHERE d.type = ? 
                ORDER BY v.key;';
//        $statement = $this->pdo->prepare($sql);
//        $statement->bindParam(1, $this->type);
//        $statement->execute();
        $dictsArray = [];
//        $results = $statement->fetchAll();
        $results = \DB::select($sql, [$this->type]);

        foreach ($results as $dict) {
            $dictsArray  [$dict->name]  [$dict->key] = $dict->value;
        }

        return $dictsArray;
    }
}