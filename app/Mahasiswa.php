<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
  protected $fillable = [
      'name', 'kelas_id', 'alamat','jenis_kelamin'
  ];

  public function kelas(){

    return $this->belongsTo('App\Kelas');

  }
  public function jeniskelamin(){
  return $this->belongsTo('App\JenisKelamin');

}
    //
}
