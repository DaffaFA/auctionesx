<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Barang
 *
 * @property int $id_barang
 * @property string $nama_barang
 * @property \Illuminate\Support\Carbon $tgl
 * @property int $harga_awal
 * @property string $deskripsi_barang
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read Barang $lelang
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Penawaran[] $penawaran
 * @property-read int|null $penawaran_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Photo[] $photos
 * @property-read int|null $photos_count
 * @method static \Illuminate\Database\Eloquent\Builder|Barang newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Barang newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Barang query()
 * @method static \Illuminate\Database\Eloquent\Builder|Barang whereDeskripsiBarang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barang whereHargaAwal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barang whereIdBarang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barang whereNamaBarang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barang whereTgl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barang whereUpdatedAt($value)
 */
	class Barang extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Lelang
 *
 * @property int $id_lelang
 * @property int $id_barang
 * @property \Illuminate\Support\Carbon $tgl_lelang
 * @property int|null $harga_akhir
 * @property int|null $id_user
 * @property int $id_petugas
 * @property string $status
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \App\Models\Barang|null $barang
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Penawaran[] $penawaran
 * @property-read int|null $penawaran_count
 * @property-read \App\Models\Petugas $petugas
 * @property-read \App\Models\Masyarakat|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Lelang newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Lelang newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Lelang query()
 * @method static \Illuminate\Database\Eloquent\Builder|Lelang whereHargaAkhir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lelang whereIdBarang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lelang whereIdLelang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lelang whereIdPetugas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lelang whereIdUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lelang whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lelang whereTglLelang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lelang whereUpdatedAt($value)
 */
	class Lelang extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Level
 *
 * @property int $id_level
 * @property string $level
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Petugas[] $petugas
 * @property-read int|null $petugas_count
 * @method static \Illuminate\Database\Eloquent\Builder|Level newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Level newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Level query()
 * @method static \Illuminate\Database\Eloquent\Builder|Level whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Level whereIdLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Level whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Level whereUpdatedAt($value)
 */
	class Level extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Masyarakat
 *
 * @property int $id_user
 * @property string $nama_lengkap
 * @property string $username
 * @property string $password
 * @property string|null $api_token
 * @property string|null $remember_token
 * @property string $telp
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Lelang[] $lelangs
 * @property-read int|null $lelangs_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Penawaran[] $penawaran
 * @property-read int|null $penawaran_count
 * @method static \Illuminate\Database\Eloquent\Builder|Masyarakat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Masyarakat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Masyarakat query()
 * @method static \Illuminate\Database\Eloquent\Builder|Masyarakat whereApiToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Masyarakat whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Masyarakat whereIdUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Masyarakat whereNamaLengkap($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Masyarakat wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Masyarakat whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Masyarakat whereTelp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Masyarakat whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Masyarakat whereUsername($value)
 */
	class Masyarakat extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Penawaran
 *
 * @property int $id_history
 * @property int $id_lelang
 * @property int $id_barang
 * @property int $id_user
 * @property int $penawaran_harga
 * @property mixed|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Barang $barang
 * @property-read \App\Models\Lelang $lelang
 * @property-read \App\Models\Masyarakat $user
 * @method static \Illuminate\Database\Eloquent\Builder|Penawaran newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Penawaran newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Penawaran query()
 * @method static \Illuminate\Database\Eloquent\Builder|Penawaran whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Penawaran whereIdBarang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Penawaran whereIdHistory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Penawaran whereIdLelang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Penawaran whereIdUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Penawaran wherePenawaranHarga($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Penawaran whereUpdatedAt($value)
 */
	class Penawaran extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Petugas
 *
 * @property int $id_petugas
 * @property string $nama_petugas
 * @property string $username
 * @property string $password
 * @property string|null $remember_token
 * @property int $id_level
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Lelang[] $lelangs
 * @property-read int|null $lelangs_count
 * @property-read \App\Models\Level $level
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|Petugas newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Petugas newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Petugas query()
 * @method static \Illuminate\Database\Eloquent\Builder|Petugas whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Petugas whereIdLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Petugas whereIdPetugas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Petugas whereNamaPetugas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Petugas wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Petugas whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Petugas whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Petugas whereUsername($value)
 */
	class Petugas extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Photo
 *
 * @property int $id
 * @property string $path
 * @property int $id_barang
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Barang $barang
 * @method static \Illuminate\Database\Eloquent\Builder|Photo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Photo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Photo query()
 * @method static \Illuminate\Database\Eloquent\Builder|Photo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photo whereIdBarang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photo wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photo whereUpdatedAt($value)
 */
	class Photo extends \Eloquent {}
}

