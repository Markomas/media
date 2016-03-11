<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Series Entity.
 *
 * @property int $id
 * @property int $id_tmdb
 * @property string $titre
 * @property string $resume
 * @property float $note
 * @property string $annee
 * @property string $encours
 * @property string $realisateur
 * @property string $genre
 * @property string $acteur
 * @property string $file
 * @property int $season
 * @property int $episode
 * @property string $titre_episode
 * @property int $view
 * @property bool $alert
 * @property string $def
 * @property string $audio
 * @property string $sub
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class Series extends Entity
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
        'id' => false,
    ];
}
