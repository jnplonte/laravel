<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userData extends Model
{
    protected $table = 'userData';

    protected $fillable = ['firstname', 'lastname', 'address', 'contact_number', 'birth_date'];
    

    protected $id;

    protected $firstname;

    protected $lastname;

    protected $address;

    protected $contact_number;

    protected $birth_date;

    public function getUser($id)
    {
        if (!empty($id)) {
            return $this->find($id)->getOriginal();
        } else {
            return false;
        }
    }
}
