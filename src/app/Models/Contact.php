<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
 * @property ContactGroup|null $contactGroup
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
	];

	public function contactGroup(): BelongsTo
	{
		return $this->belongsTo(ContactGroup::class, 'group_id');
	}
}
