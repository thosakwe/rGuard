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
 * @property integer $days_to_expire
 * @property string $file
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
 * @method static \Illuminate\Database\Query\Builder|\rGuard\App whereDaysToExpire($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\App whereFile($value)
 * @method static \Illuminate\Database\Query\Builder|\SleepingOwl\Models\SleepingOwlModel defaultSort()
 */
	class App {}
}

namespace rGuard{
/**
 * rGuard\Download
 *
 * @property integer $id
 * @property integer $app_id
 * @property string $virtual_path
 * @property string $file
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read App $app
 * @method static \Illuminate\Database\Query\Builder|\rGuard\Download whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\Download whereAppId($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\Download whereVirtualPath($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\Download whereFile($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\Download whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\Download whereUpdatedAt($value)
 */
	class Download {}
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
 * @property \Carbon\Carbon $expires
 * @property integer $downloads
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read mixed $download_url
 * @property-read rGuard\App $app
 * @property-read User $user
 * @method static \Illuminate\Database\Query\Builder|\rGuard\License whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\License whereAppId($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\License whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\License whereCode($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\License whereLicensedTo($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\License whereExpires($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\License whereDownloads($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\License whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\License whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\SleepingOwl\Models\SleepingOwlModel defaultSort()
 */
	class License {}
}

namespace rGuard{
/**
 * rGuard\Page
 *
 * @property integer $id
 * @property boolean $show_in_navbar
 * @property string $title
 * @property string $html
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\rGuard\Page whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\Page whereShowInNavbar($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\Page whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\Page whereHtml($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\Page whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\Page whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\SleepingOwl\Models\SleepingOwlModel defaultSort()
 */
	class Page {}
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
 * @property boolean $stripe_active
 * @property string $stripe_id
 * @property string $stripe_subscription
 * @property string $stripe_plan
 * @property string $last_four
 * @property \Carbon\Carbon $trial_ends_at
 * @property \Carbon\Carbon $subscription_ends_at
 * @property-read \Illuminate\Database\Eloquent\Collection|License[] $licenses
 * @method static \Illuminate\Database\Query\Builder|\rGuard\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\User whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\User whereConfirmationCode($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\User whereConfirmed($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\User whereStripeActive($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\User whereStripeId($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\User whereStripeSubscription($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\User whereStripePlan($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\User whereLastFour($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\User whereTrialEndsAt($value)
 * @method static \Illuminate\Database\Query\Builder|\rGuard\User whereSubscriptionEndsAt($value)
 * @method static \Illuminate\Database\Query\Builder|\SleepingOwl\Models\SleepingOwlModel defaultSort()
 */
	class User {}
}

