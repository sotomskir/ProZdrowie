<?php
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\User
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Measurement[] $measurements
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Dict
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\DictValue[] $values
 */
	class Dict extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\DictValue
 *
 * @property-read \App\Models\Dict $dict
 */
	class DictValue extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Measurement
 *
 * @property-read \App\Models\User $user
 */
	class Measurement extends \Eloquent {}
}

