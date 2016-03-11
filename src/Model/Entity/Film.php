<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Film Entity.
 *
 * @property int $id_film
 * @property string $titre_film
 * @property string $annee_film
 * @property string $real_film
 * @property string $genre_film
 * @property string $time_film
 * @property string $resume_film
 * @property string $trailer_film
 * @property string $acteur_film
 * @property float $note_film
 * @property string $tagline_film
 * @property string $file
 * @property \Cake\I18n\Time $date_ajout
 * @property int $view
 * @property bool $alert
 * @property string $def_film
 * @property string $audio
 * @property string $sub
 */
class Film extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id_film' => false,
    ];
}
