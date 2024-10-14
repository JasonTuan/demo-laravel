<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Contact
 *
 * @property int $id
 * @property string $fullname
 * @property string|null $email
 * @property string|null $tel
 * @property string|null $address
 * @property int|null $group_id
 *
 * @property ContactGroup|null $contact_group
 *
 * @package App\Models
 */
class Contact extends Model
{
	protected $table = 'contact';
	public $timestamps = false;

	protected $casts = [
		'group_id' => 'int'
	];

	protected $fillable = [
		'fullname',
		'email',
		'tel',
		'address',
		'group_id'
	];

	public function contactGroup()
	{
		return $this->belongsTo(ContactGroup::class, 'group_id');
	}
}
