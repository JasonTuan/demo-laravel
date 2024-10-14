<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ContactGroup
 * 
 * @property int $id
 * @property string|null $name
 * 
 * @property Collection|Contact[] $contacts
 *
 * @package App\Models
 */
class ContactGroup extends Model
{
	protected $table = 'contact_group';
	public $timestamps = false;

	protected $fillable = [
		'name'
	];

	public function contacts()
	{
		return $this->hasMany(Contact::class, 'group_id');
	}
}
