<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UsermetaCache
 */
class UsermetaCache extends Model
{
    protected $table = 'usermeta_cache';

    public $timestamps = true;

    protected $fillable = [
        'umeta_id',
        'user_id',
        'meta_key',
        'meta_value'
    ];

    protected $guarded = [];

    
	/**
	 * @return mixed
	 */
	public function getUmetaId() {
		return $this->umeta_id;
	}

	/**
	 * @return mixed
	 */
	public function getUserId() {
		return $this->user_id;
	}

	/**
	 * @return mixed
	 */
	public function getMetaKey() {
		return $this->meta_key;
	}

	/**
	 * @return mixed
	 */
	public function getMetaValue() {
		return $this->meta_value;
	}


    
	/**
	 * @param $value
	 * @return $this
	 */
	public function setUmetaId($value) {
		$this->umeta_id = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setUserId($value) {
		$this->user_id = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setMetaKey($value) {
		$this->meta_key = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setMetaValue($value) {
		$this->meta_value = $value;
		return $this;
	}



}