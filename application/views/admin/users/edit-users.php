   <div class="row">
      <input type="text" name="idUser" hidden id="idUser" value="<?= $users['id_user'] ?>">
      <div class="col-md-6">
         <div class="form-group">
            <label for="username" class="control-label mb-1">Username</label>
            <input type="text" name="username" id="username" class="form-control" value="<?= $users['username'] ?>">
         </div>
      </div>
      <div class="col-md-3">
         <label for="level" class="control-label mb-1">Level</label>
         <select data-placeholder="Pilih Level Users" id="level" name="level" class="standardSelect" tabindex="5" required>
            <option value="tim" <?= $users['level'] == 'tim' ? 'selected' : '' ?>>Tim Penilai</option>
            <option value="kepala" <?= $users['level'] == 'kepala' ? 'selected' : '' ?>>Kepala</option>
            <option value="admin" <?= $users['level'] == 'admin' ? 'selected' : '' ?>>Administrator</option>
            <?= form_error('sm', '<label class="error text-danger">', '</label>') ?>
         </select>
      </div>
      <div class="col-md-3">
         <label class="control-label mb-1">Status Akun</label><br>
         <input type="checkbox" name="aktif" id="aktif" <?= $users['aktif'] == 'Y' ? 'checked' : '' ?>>
         <label for="aktif" class="control-label mb-1">Aktif</label>
      </div>
   </div>
   <div class="row">
      <div class="col-md-6">
         <div class="form-group">
            <label for="periode" class="control-label mb-1">Nama Depan</label>
            <input type="text" name="namaDepan" class="form-control" value="<?= $users['nama_depan'] ?>">
         </div>
      </div>
      <div class="col-md-6">
         <div class="form-group">
            <label for="periode" class="control-label mb-1">Nama Belakang</label>
            <input type="text" name="namaBelakang" class="form-control" value="<?= $users['nama_belakang'] ?>">
         </div>
      </div>
   </div>
   <hr class="mt-0 mb-1">
   <div class="row">
      <div class="col-md-12">
         <input type="checkbox" onchange="ubahPassword()" name="ubahPass" id="ubahPass">
         <label for="ubahPass" class="control-label text-muted">Silahkan Ceklist Jika ingin mengubah password Users</label>
      </div>
   </div>
   <hr class="mt-0">
   <div class="row" id="ubahPasswordForm" hidden>
      <div class="col-md-6">
         <div class="form-group">
            <label for="password" class="control-label mb-1">Password</label>
            <input type="text" disabled name="password" id="password" class="form-control">
         </div>
      </div>
      <div class="col-md-6">
         <label class="control-label mb-1">Password Default</label><br>
         <input type="checkbox" onchange="disableInputPassword()" name="passDefault" id="passDefault" checked>
         <label for="passDefault" class="control-label mb-1">Gunakan Password Default (<small>pwd</small>: <b class="text-success" style="font-size:20px">123</b>)</label>
      </div>
   </div>