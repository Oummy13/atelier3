<?php
declare(strict_types=1);

namespace App;

class Tester
{
    public function run(): void
    {
        $data = new MagicData();
        $data->name = 'Oumoul';
        $data->age = 33;

        echo $data->getName(); // Doit fonctionner sans alerte PHPStan

        $users = [new User()];
        $collection = new Collection($users);

        $first = $collection->first(); // PHPStan sait que c'est un User|null
        if ($first !== null && $first->isPremium()) {
            echo "Premium user";
        }
    }
}
