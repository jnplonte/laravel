<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;

class userData extends Model
{
    protected $table = 'userData';

    protected $userInfoTable;

    protected $fillable = ['firstname', 'lastname', 'picture', 'address', 'contact_number', 'birth_date'];

    protected $page = 10;

    protected $type = 'id';

    protected $sort = 'asc';

    protected $search = '';

    public function __construct()
    {
        $this->userInfoTable = config('auth.table');

        $this->page = config('site.paginationPerPage');
    }

    public function getUsers($sort = null, $type = null, $search = null){

      if(!empty($sort)){ $this->sort = $sort; }
      if(!empty($type)){ $this->type = $type; }
      if(!empty($search)){ $this->search = $search; }

      $users = DB::table($this->userInfoTable)

          ->join($this->table, $this->userInfoTable.'.id', '=', $this->table.'.id')

          ->select($this->table.'.*', $this->userInfoTable.'.username', $this->userInfoTable.'.email', $this->userInfoTable.'.role', $this->userInfoTable.'.active')

          ->where($this->userInfoTable.'.username', 'like', '%'.$search.'%')
          ->orWhere($this->userInfoTable.'.email', 'like', '%'.$search.'%')
          ->orWhere($this->table.'.firstname', 'like', '%'.$search.'%')
          ->orWhere($this->table.'.lastname', 'like', '%'.$search.'%')
          ->orderBy($this->type, $this->sort)
          
          ->paginate($this->page);

      return $users;
    }

    public function getUser($id = null){

      $users = DB::table($this->userInfoTable)

          ->join($this->table, $this->userInfoTable.'.id', '=', $this->table.'.id')

          ->select($this->table.'.*', $this->userInfoTable.'.username', $this->userInfoTable.'.email', $this->userInfoTable.'.role', $this->userInfoTable.'.active')

          ->where($this->userInfoTable.'.id', $id)

          ->first();

      return $users;
    }
}
