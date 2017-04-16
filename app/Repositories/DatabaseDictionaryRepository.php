<?php namespace App\Repositories;

use Illuminate\Database\DatabaseManager;

class DatabaseDictionaryRepository implements Contracts\DictionaryRepository
{
    /**
     * @var DatabaseManager
     */
    private $db;

    public function __construct(DatabaseManager $db)
    {
        $this->db = $db;
    }

    public function findAll()
    {
        $sql = 'SELECT d.name, v.key, v.value, d.type
                FROM dicts d 
                JOIN dict_values v 
                ON d.id = v.dict_id
                ORDER BY v.key;';

        $dictionaries = [];

        foreach ($this->db->select($sql) as $dict) {
            $dictionaries[$dict->type][$dict->name][$dict->key] = $dict->value;
        }

        return $dictionaries;
    }
}