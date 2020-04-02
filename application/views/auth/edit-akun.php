<form action="<?= base_url('profil/akunku') ?>" method="POST">
   <div class="card">
      <div class="table-stats order-table ov-h">
         <table class="table table-striped">
            <tr align="center">
               <td align="left">Username</td>
               <td align="left">
                  <input type="text" name="username" class="form-control" value="<?= $profil['username'] ?>">
                  <?= form_error('username', '<label class="error text-danger">', '</label>') ?>
               </td>
            </tr>
            <tr align="center">
               <td align="left">E-mail</td>
               <td align="left">
                  <input type="text" name="email" class="form-control" value="<?= $profil['email'] ?>">
                  <?= form_error('email', '<label class="error text-danger">', '</label>') ?>
               </td>
            </tr>
            <tr>
               <td colspan="2">
                  <div class="alert alert-warning mt-0 mb-0 text-center">
                     <i class="fa fa-info"></i> Kosongkan jika tidak ingin mengubah password.
                  </div>
               </td>
            </tr>
            <tr align="center">
               <td align="left">Password Lama</td>
               <td align="left">
                  <input type="text" name="passLama" class="form-control">
                  <?= form_error('passLama', '<label class="error text-danger">', '</label>') ?>
               </td>
            </tr>
            <tr align="center">
               <td align="left">Password Baru</td>
               <td align="left">
                  <input type="text" name="passBaru" class="form-control">
                  <?= form_error('passBaru', '<label class="error text-danger">', '</label>') ?>
               </td>
            </tr>
            <tr align="center">
               <td align="left">Ulangi Password Baru</td>
               <td align="left">
                  <input type="text" name="passBaru2" class="form-control">
                  <?= form_error('passBaru2', '<label class="error text-danger">', '</label>') ?>
               </td>
            </tr>

         </table>
      </div>
      <?= $this->session->flashdata('pesan') ?>
      <div>
         <button type="submit" class="btn btn-success btn-block"><i class="fa fa-save"></i> SIMPAN</button>
      </div>
   </div>
</form>