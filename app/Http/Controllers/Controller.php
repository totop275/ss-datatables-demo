<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Kitablog\Traits\Datatables;

class Controller extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests, Datatables;

	public function __construct(){
		$this->column=[ 
			'alias' => ['owner_name'=>'users.name','pet_name'=>'pets.name','pet_type'=>'pets.type','birth_month'=>'\func month(birthday)','detail'=>'\func JSON_OBJECT("name",users.name,"birthday",birthday,"gender",gender,"pet_name",pets.name,"pet_type",pets.type,"register_date",users.created_at)','created_at'=>'users.created_at'],
			'available' => ['owner_name','birthday','birth_month','gender','pet_name','pet_type','created_at','detail'],
			'searchable' => ['owner_name','gender','pet_name','birth_month','pet_type','birthday'],
			'table' => ['pets'=>['users.id','=','pets.owner']]
		];
		$this->model=\App\User::class;
		$this->shouldSelect=['users.id'];
		$this->actionBtn=[
			[' <btn class="btn btn-sm btn-flat btn-primary btnIntro" data-data="%s">Introduce</btn>','detail']
		];
	}

}
