<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Traits\LogsActivity;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function tapActivity(Activity $activity, string $eventName)
    {
        if ($eventName == 'deleted') {
            $activity->properties = $this->attributes;
        }
    }
    
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('User')
            ->logFillable('*')
            ->setDescriptionForEvent(function(string $eventName) {
                $aksi = '';
                switch ($eventName) {
                    case 'created':
                        $aksi = 'ditambahkan';
                        break;
                    case 'updated':
                        $aksi = 'diperbarui';
                        break;
                    case 'deleted':
                        $aksi = 'dihapus';
                        break;
                }
                return "Data User telah {$aksi}";
            });
    }

    public function scopeCountUser($query, $role = null)
    {
        if ($role) {
            return $query->where('role', $role)->count();
        }

        return $query->count();
    }

    // Model User

    public function scopeSearch($query, $search)
    {
        $search = strtolower($search);
        return $query->whereRaw('LOWER(name) LIKE ?', ["%{$search}%"]);
    }

    public function scopeGlobalSearch($query, $search)
    {
        $search = strtolower($search);

        return $query->whereRaw("LOWER(name) LIKE '%{$search}%' OR 
                                LOWER(email) LIKE '%{$search}%' OR
                                LOWER(username) LIKE '%{$search}%' OR 
                                LOWER(role) LIKE '%{$search}%'");
    }

    public function countPost()
    {
        return $this->posts()->count();
    }


    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function news()
    {
        return $this->hasMany(News::class);
    }

    public function ebooks()
    {
        return $this->hasMany(Ebook::class);
    }

    public function event_logs()
    {
        return $this->hasMany(EventLog::class);
    }

    public function medias()
    {
        return $this->hasMany(Media::class);
    }

    public function login_info()
    {
        return $this->hasMany(LoginInfo::class);
    }

    public function social_media()
    {
        return $this->hasMany(UserSocialMedia::class);
    }

    public function likedPosts()
    {
        return $this->belongsToMany(Post::class, 'post_likes');
    }
}
