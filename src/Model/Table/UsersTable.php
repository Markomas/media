<?php
// src/Model/Table/UsersTable.php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;



class UsersTable extends Table
{

    public function validationDefault(Validator $validator)
    {
      // Un champ unique.
        return $validator
                ->add(
                'username',
                ['unique' => [
                    'rule' => 'validateUnique',
                    'provider' => 'table',
                    'message' => 'Utilisateur existant']
                ]
            )
            ->notEmpty('username', "Un nom d'utilisateur est nécessaire")
            ->notEmpty('password', 'Un mot de passe est nécessaire')
            ->notEmpty('role', 'Un role est nécessaire')
            ->add('role', 'inList', [
                'rule' => ['inList', ['admin', 'author']],
                'message' => 'Merci de rentrer un role valide'
            ]);
    }



}


 ?>
