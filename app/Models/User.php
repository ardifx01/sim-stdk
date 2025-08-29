<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Cash;
use App\Models\News;
use App\Models\Galery;
use App\Enums\JabatanEnum;
use App\Enums\JenisKelamin;
use App\Models\Attendances;
use App\Models\Inventories;
use App\Enums\StatusAnggotaEnum;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nama',
        'umur',
        'pekerjaan',
        'foto',
        'alamat',
        'no_telepon',
        'jabatan',
        'status',
        'jenis_kelamin',
        'email',
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'jabatan' => JabatanEnum::class,
        'status' =>  StatusAnggotaEnum::class,
        'jenis_kelamin' =>  JenisKelamin::class,
    ];

    public function hasManagementRoleForAnggota(): bool
    {
        return in_array($this->jabatan, [
            JabatanEnum::Ketua,
            JabatanEnum::WakilKetua,
            JabatanEnum::Sekretaris,
        ]);
    }

    public function hasManagementRoleForVerificationAnggota(): bool
    {
        return in_array($this->jabatan, [
            JabatanEnum::Ketua,
        ]);
    }

    public function hasManagementRoleForKegiatan(): bool
    {
        return in_array($this->jabatan, [
            JabatanEnum::Ketua,
            JabatanEnum::WakilKetua,
            JabatanEnum::Sekretaris,
        ]);
    }

    public function hasManagementRoleForAbsensi(): bool
    {
        return in_array($this->jabatan, [
            JabatanEnum::Sekretaris,
        ]);
    }
    public function hasManagementRoleForKeuangan(): bool
    {
        return in_array($this->jabatan, [
            JabatanEnum::Bendahara,
        ]);
    }
    public function hasManagementRoleForGaleri(): bool
    {
        return in_array($this->jabatan, [
            JabatanEnum::Ketua,
            JabatanEnum::WakilKetua,
        ]);
    }
    public function hasManagementRoleForInventaris(): bool
    {
        return in_array($this->jabatan, [
            JabatanEnum::Sekretaris,
        ]);
    }
    public function hasManagementRoleForBerita(): bool
    {
        return in_array($this->jabatan, [
            JabatanEnum::Sekretaris,
        ]);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function cashes(): HasMany
    {
        return $this->hasMany(Cash::class);
    }

    public function galeries(): HasMany
    {
        return $this->hasMany(Galery::class);
    }
    public function inventories(): HasMany
    {
        return $this->hasMany(Inventories::class);
    }
    public function attendances(): HasMany
    {
        return $this->hasMany(Attendances::class);
    }
    public function news(): HasMany
    {
        return $this->hasMany(News::class);
    }
}
