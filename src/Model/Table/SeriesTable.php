<?php
namespace App\Model\Table;

use App\Model\Entity\Series;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Series Model
 *
 */
class SeriesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('series');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

    }
    

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->add('id_tmdb', 'valid', ['rule' => 'numeric'])
            ->requirePresence('id_tmdb', 'create')
            ->notEmpty('id_tmdb');

        $validator
            ->requirePresence('titre', 'create')
            ->notEmpty('titre');

        $validator
            ->requirePresence('resume', 'create')
            ->notEmpty('resume');

        $validator
            ->add('note', 'valid', ['rule' => 'decimal'])
            ->requirePresence('note', 'create')
            ->notEmpty('note');

        $validator
            ->requirePresence('annee', 'create')
            ->notEmpty('annee');

        $validator
            ->requirePresence('encours', 'create')
            ->notEmpty('encours');

        $validator
            ->requirePresence('realisateur', 'create')
            ->notEmpty('realisateur');

        $validator
            ->requirePresence('genre', 'create')
            ->notEmpty('genre');

        $validator
            ->requirePresence('acteur', 'create')
            ->notEmpty('acteur');

        $validator
            ->requirePresence('file', 'create')
            ->notEmpty('file');

        $validator
            ->requirePresence('original_file', 'create')
            ->notEmpty('original_file');



        return $validator;
    }
}
