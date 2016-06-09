<?php
namespace Movie;
/**
 * 	This class handles all the data you can get from a Movie
 *
 *	@package TMDB-V3-PHP-API
 * 	@author Alvaro Octal | <a href="https://twitter.com/Alvaro_Octal">Twitter</a>
 * 	@version 0.2
 * 	@date 02/04/2016
 * 	@link https://github.com/Alvaroctal/TMDB-PHP-API
 * 	@copyright Licensed under BSD (http://www.opensource.org/licenses/bsd-license.php)
 */

class Movie{

	//------------------------------------------------------------------------------
	// Class Variables
	//------------------------------------------------------------------------------

	private $_data;
	private $_tmdb;

	/**
	 * 	Construct Class
	 *
	 * 	@param array $data An array with the data of the Movie
	 */
	public function __construct($data) {
		$this->_data = $data;
	}

	//------------------------------------------------------------------------------
	// Get Variables
	//------------------------------------------------------------------------------

	/**
	 * 	Get the Movie's id
	 *
	 * 	@return int
	 */
	public function getID() {
		return $this->_data['id'];
	}


	public function getYear() {
		$year = $this->_data['release_date'];


			return $year;
	}

	public function getTime() {
		$time = $this->_data['runtime'];
		$hours = floor($time / 60);
		$minutes = $time % 60;
		$minutes = sprintf("%02d", $minutes);
		$time = $hours.'h'.$minutes;

			return $time;
	}

	public function getOverview() {
			return $this->_data['overview'];
	}

	/**
	 * 	Get the Movie's title
	 *
	 * 	@return string
	 */
	public function getTitle() {
		return $this->_data['title'];
	}

	/**
	 * 	Get the Movie's tagline
	 *
	 * 	@return string
	 */
	public function getTagline() {
		return $this->_data['tagline'];
	}

	/**
	 * 	Get the Movie's Poster
	 *
	 * 	@return string
	 */
	public function getPoster() {
		return $this->_data['poster_path'];
	}

	/**
	 * 	Get the Movie's vote average
	 *
	 * 	@return int
	 */
	public function getVoteAverage() {
		return $this->_data['vote_average'];
	}

	/**
	 * 	Get the Movie's vote count
	 *
	 * 	@return int
	 */
	public function getVoteCount() {
		return $this->_data['vote_count'];
	}

	/**
	 * 	Get the Movie's trailers
	 *
	 * 	@return array
	 */
	public function getTrailers() {
			return $this->_data['videos'];
	}

	/**
	 * 	Get the Movie's trailer
	 *
	 * 	@return string
	 */
	public function getTrailer() {
		$trailers = $this->getTrailers();
		if (	$trailers['results'] == null) {
			return '';
		} else {
			return $trailers['results'][0]['key'];
		}

	}

	/**
	 * 	Get the Movie's genres
	 *
	 * 	@return Genre[]
	 */
	 public function getGenre() {
 		$genres ='';
 		foreach ($this->_data['genres'] as $key) {
 		 $genres = $genres.$key['name'].', ';
 	 };
 		return $genres;
 	}

	public function getDirector() {
		$directors ='';
		foreach ($this->_data['credits']['crew'] as $key) {

			if ($key['job']=="Director"){
		 		$directors = $directors.$key['name'].', ';
			};
		};
			return $directors;
	}

	public function getActor() {
		$actors = '';
		foreach ($this->_data['credits']['cast'] as $key) {

		 $actors = $actors.$key['name'].', ';
 		};
		return $actors;
	}

	/**
	 * 	Get the Movie's reviews
	 *
	 * 	@return Review[]
	 */
	public function getReviews() {
		$reviews = array();

		foreach ($this->_data['review']['result'] as $data) {
			$reviews[] = new Review($data);
		}

		return $reviews;
	}

	/**
	 * 	Get the Movie's companies
	 *
	 * 	@return Company[]
	 */
	public function getCompanies() {
		$companies = array();

		foreach ($this->_data['production_companies'] as $data) {
			$companies[] = new Company($data);
		}

		return $companies;
	}


	/**
	 *  Get Generic.<br>
	 *  Get a item of the array, you should not get used to use this, better use specific get's.
	 *
	 * 	@param string $item The item of the $data array you want
	 * 	@return array
	 */
	public function get($item = ''){
		return (empty($item)) ? $this->_data : $this->_data[$item];
	}

	//------------------------------------------------------------------------------
	// Import an API instance
	//------------------------------------------------------------------------------

	/**
	 *	Set an instance of the API
	 *
	 *	@param TMDB $tmdb An instance of the api, necessary for the lazy load
	 */
	public function setAPI($tmdb){
		$this->_tmdb = $tmdb;
	}

	//------------------------------------------------------------------------------
	// Export
	//------------------------------------------------------------------------------

	/**
	 * 	Get the JSON representation of the Movie
	 *
	 * 	@return string
	 */
	public function getJSON() {
		return json_encode($this->_data, JSON_PRETTY_PRINT);
	}
}
?>
