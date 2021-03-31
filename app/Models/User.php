<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    const DEFAULT_USER_PROFILE_IMAGE = 'images/profile-images/default_profile_pic.jpeg';

    const ROLE_USER     = 'user';
    const ROLE_VERIFIED = 'verified';
    const ROLE_STAFF    = 'staff';
    const ROLE_ADMIN    = 'admin';

    const ROLE_CHOICES = [
        User::ROLE_USER, 
        User::ROLE_VERIFIED, 
        User::ROLE_STAFF,
        User::ROLE_ADMIN
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_pic',
        'recipies_is_public',
        'first_name',
        'last_name',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the users recipies
     */
    public function recipies() {
        return $this->hasMany(Recipie::class);
    }

    public static function uploadProfileImage($img) {
        // Prepend username to easier know whose profileimage that is
        $path = 'images/profile-images/' . auth()->user()->name . '-profile-image.' . $img->getClientOriginalExtension();

        // Delete old profileimage to save storagespace
        if (auth()->user()->profile_pic !== User::DEFAULT_USER_PROFILE_IMAGE) {
            (new self())->deleteOldProfileImage(auth()->user()->profile_pic);
        }

        Storage::put($path, file_get_contents($img));
        auth()->user()->update(['profile_pic' => $path]);
    }

    protected function deleteOldProfileImage($path) {
        Storage::delete($path);
    }
}
