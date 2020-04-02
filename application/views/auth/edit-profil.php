<form action="<?= base_url('profil/ubah') ?>" method="POST" enctype="multipart/form-data">
   <div class="card">
      <div class="table-stats order-table ov-h">
         <table class="table table-striped">
            <tr align="center">
               <td align="left">Foto Profil</td>
               <td align="left">
                  <input type="file" name="fotoProfil">
                  <?= form_error('namaDepan', '<label class="error text-danger">', '</label>') ?>
               </td>
            </tr>
            <tr align="center">
               <td align="left">Nama Depan</td>
               <td align="left">
                  <input type="text" name="namaDepan" class="form-control" value="<?= $profil['nama_depan'] ?>">
                  <?= form_error('namaDepan', '<label class="error text-danger">', '</label>') ?>
               </td>
            </tr>
            <tr align="center">
               <td align="left">Nama Belakang</td>
               <td align="left">
                  <input type="text" name="namaBelakang" class="form-control" value="<?= $profil['nama_belakang'] ?>">
               </td>
            </tr>
            <tr align="center">
               <td align="left">Jenis Kelamin</td>
               <td align="left">
                  <input type="radio" name="jk" id="pria" value="Pria" <?= $profil['jk'] == "Pria" ? 'checked' : '' ?>>
                  <label for="pria">Laki-laki</label>&nbsp;&nbsp;&nbsp;
                  <input type="radio" name="jk" id="wanita" value="Wanita" <?= $profil['jk'] == "Wanita" ? 'checked' : '' ?>>
                  <label for="wanita">Perempuan</label>
                  <?= form_error('jk', '<label class="error text-danger">', '</label>') ?>
               </td>
            </tr>
            <tr align="center">
               <td align="left">Tempat Lahir</td>
               <td align="left">
                  <input type="text" name="tempatLahir" class="form-control" value="<?= $profil['tmpt_lahir'] ?>">
            </tr>
            <tr align="center">
               <td align="left">Tanggal Lahir</td>
               <td align="left">
                  <input type="date" name="tanggalLahir" class="form-control" value="<?= $profil['tgl_lahir'] ?>">
            </tr>
            <tr align="center">
               <td align="left">Kontak</td>
               <td align="left">
                  <input type="text" name="kontak" class="form-control" value="<?= $profil['kontak'] ?>">
               </td>
            </tr>
            <tr align="center">
               <td align="left">Alamat</td>
               <td align="left">
                  <textarea name="alamat" class="form-control" cols="30" rows="3"><?= $profil['alamat'] ?></textarea>
               </td>
            </tr>
         </table>
      </div>
      <div>
         <button type="submit" class="btn btn-success btn-block"><i class="fa fa-save"></i> SIMPAN</button>
      </div>
   </div>
</form>