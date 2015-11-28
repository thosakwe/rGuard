<?php
/**
 * An helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace rGuard{
/**
 * rGuard\App
 *
 * @property integer $id
 * @property string $name
 * @property string $tagline
 * @property string $description
 * @property string $version
 * @property boolean $featured
 * @property float $price
 * @property string $image
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\rGuard\App whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\App whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\App whereTagline($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\App whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\App whereVersion($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\App whereFeatured($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\App wherePrice($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\App whereImage($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\App whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\App whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\SleepingOwl\Models\SleepingOwlModel defaultSort()
 */
	class App {}
}

namespace rGuard{
/**
 * rGuard\Feedback
 *
 * @property integer $id
 * @property integer $license_id
 * @property integer $user_id
 * @property integer $stars
 * @property string $title
 * @property string $text
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\rGuard\Feedback whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\Feedback whereLicenseId($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\Feedback whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\Feedback whereStars($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\Feedback whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\Feedback whereText($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\Feedback whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\Feedback whereUpdatedAt($value)
 */
	class Feedback {}
}

namespace rGuard{
/**
 * rGuard\License
 *
 * @property integer $id
 * @property integer $app_id
 * @property integer $user_id
 * @property string $code
 * @property string $licensed_to
 * @property string $expires
 * @property integer $downloads
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\rGuard\License whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\License whereAppId($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\License whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\License whereCode($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\License whereLicensedTo($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\License whereExpires($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\License whereDownloads($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\License whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\License whereUpdatedAt($value)
 */
	class License {}
}

namespace rGuard{
/**
 * rGuard\User
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $confirmation_code
 * @property boolean $confirmed
 * @method static \Illuminate\Database\Query\Builder|\rGuard\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\User whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\User whereConfirmationCode($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\User whereConfirmed($value)
 * @method static \Illuminate\Database\Query\Builder|\SleepingOwl\Models\SleepingOwlModel defaultSort()
 */
	class User {}
}

