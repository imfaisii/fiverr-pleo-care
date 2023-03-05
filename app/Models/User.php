<?php

namespace App\Models;

use App\Enums\GeneralStatus;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Arr;
use Jenssegers\Agent\Agent;
use Laravel\Sanctum\HasApiTokens;
use Rappasoft\LaravelAuthenticationLog\Traits\AuthenticationLoggable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class User extends Authenticatable implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, InteractsWithMedia, AuthenticationLoggable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'status'
    ];

    protected $hidden = [
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'status' => GeneralStatus::class
    ];

    protected $with = ['details'];

    protected $appends = ['top_role', 'first_name', 'last_name', 'days_since_join'];

    public function getTopRoleAttribute()
    {
        if (is_object($this->roles)) {
            return $this->roles->first()?->name;
        }
    }

    public function getDaysSinceJoinAttribute()
    {
        return $this->created_at->diffInDays();
    }

    public function getFirstNameAttribute()
    {
        return Arr::first(explode(" ", $this->name));
    }

    public function getLastNameAttribute()
    {
        return Arr::last(explode(" ", $this->name));
    }

    // public function getUserAgentAttribute()
    // {
    //     return $this->getUserAgents(1);
    // }

    public function getUserAgents($count = 5)
    {
        $agents = $this->authentications->map(function ($log) {
            $agent = tap(new Agent, fn ($agent) => $agent->setUserAgent($log->user_agent));

            return [
                'is_mobile' => ($agent->isMobile() || $agent->isTablet()) ? true : false,
                'device' => $agent->device(),
                'platform' => $agent->platform(),
                'browser' => $agent->browser(),
                'login_at' => Carbon::parse($log->login_at)->format('l M d g:i a'),
                'logout_at' => Carbon::parse($log->logout_at)->format('l M d g:i a'),
                'country' => $log->location['country'],
                'city' => $log->location['city'],
                'ip' => $log->location['ip'],
                'timezone' => $log->location['timezone']
            ];
        });

        return $agents->take($count);
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('preview')
            ->fit(Manipulations::FIT_CROP, 300, 300)
            ->nonQueued();
    }


    public function details()
    {
        return $this->hasOne(UserDetail::class, 'user_id', 'id');
    }

    public function company()
    {
        return $this->hasOne(Company::class);
    }

    public function manager()
    {
        return $this->hasOne(Manager::class);
    }

    public function employee()
    {
        return $this->hasOne(Employee::class);
    }
}
