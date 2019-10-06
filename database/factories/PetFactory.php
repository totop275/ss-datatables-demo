<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$petNames=['Charlie','Max','Buddy,','Archie','Teddy','Toby','Bailey','Frankie','Ollie','Jack'];
$petTypes=['Cat','Dog','Bear','Tiger','Lion','Elephant','Giraffe'];

$factory->define(App\Pet::class, function (Faker $faker) use ($petNames,$petTypes){
	$petName=$petNames[array_rand($petNames)];
	$petType=$petTypes[array_rand($petTypes)];
    return [
        'name'=>$petName,
        'type'=>$petType,
        'owner'=>factory('App\User')->create()->id
    ];
});
