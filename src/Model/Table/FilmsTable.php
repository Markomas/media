<?php
namespace App\Model\Table;

use App\Model\Entity\Film;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Films Model
 *
 */
class FilmsTable extends Table
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

        $this->table('films');
        $this->primaryKey('id_film');
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
            ->requirePresence('titre_film', 'create')
            ->notEmpty('titre_film');

        $validator
            ->requirePresence('annee_film', 'create')
            ->notEmpty('annee_film');

        $validator
            ->requirePresence('real_film', 'create')
            ->notEmpty('real_film');

        $validator
            ->requirePresence('genre_film', 'create')
              ->allowEmpty('genre_film');

        $validator
            ->requirePresence('time_film', 'create')
            ->notEmpty('time_film');

        $validator
            ->requirePresence('resume_film', 'create')
            ->notEmpty('resume_film');

        $validator
            ->requirePresence('trailer_film', 'create')
              ->allowEmpty('trailer_film');

        $validator
            ->requirePresence('acteur_film', 'create')
            ->notEmpty('acteur_film');

        $validator
            ->add('note_film', 'valid', ['rule' => 'decimal'])
            ->requirePresence('note_film', 'create')
              ->allowEmpty('note_film');

        $validator
            ->requirePresence('tagline_film', 'create')
            ->allowEmpty('tagline_film');

        $validator
            ->requirePresence('file_film', 'create')
            ->notEmpty('file_film');

        $validator
            ->requirePresence('original_file', 'create')
            ->notEmpty('original_file');

        $validator
            ->add('date_ajout', 'valid', ['rule' => 'datetime'])
            ->allowEmpty('date_ajout');

        $validator
            ->add('view', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('view');

        $validator
            ->add('alert', 'valid', ['rule' => 'boolean'])
            ->requirePresence('alert', 'create')
            ->notEmpty('alert');

        $validator
            ->allowEmpty('def_film');

        $validator
            ->allowEmpty('audio');

        $validator
            ->allowEmpty('sub');

        return $validator;
    }
}
