  <div class="row">
     <div class="col-lg-12">
        <div class="card mb-2">
           <div class="card-body">
              <div class="row">
                 <div class="col-md-6">
                    <div class="box-tile">
                       <h4><a href="<?= base_url('penilaian') ?>" title="Kembali" class="text-danger"> <i class="ti-angle-double-left"></i></a> <?= $judul . " <b>" . $detailsm['nama_sm'] ?></b></h4>
                    </div>
                 </div>
                 <div class="col-md-6">
                    <select name="periode" id="periode" class="form-control pull-right" onchange="if (this.value) window.location.href=this.value">
                       <?php foreach ($sosokmulia as $sm) : ?>
                          <option value="<?= base_url('penilaian/detail/' . $sm['id_sm']) ?>" <?= $sm['id_sm'] == $this->uri->segment(3) ? 'selected' : '' ?>><?= $sm['nama_sm'] . '|' . $sm['umur'] . 'th|' . $sm['nama_pekerjaan'] ?>
                          </option>
                       <?php endforeach ?>
                    </select>
                 </div>
              </div>
           </div>
           <small><?= $this->session->flashdata('pesan') ?></small>
        </div>

        <form action="<?= base_url('penilaian/ubah/' . $this->uri->segment(3)) ?>" method="POST">
           <div class="card">
              <div class="card-body">
                 <div class="table-stats order-table ov-h">
                    <table class="table" id="bootstrap-data-table">
                       <thead>
                          <tr>
                             <th class="serial">#</th>
                             <th>Kode Kriteria</th>
                             <th>Kriteria</th>
                             <th colspan="5" align="center">Pilihan Jawaban</th>
                          </tr>
                       </thead>
                       <tbody>
                          <?php $no = 1 ?>
                          <?php
                           $idsm = $this->uri->segment(3);
                           $iduser = $this->session->userdata('idUser');
                           ?>
                          <?php foreach ($kriteria as $kr) : ?>
                             <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $kr['kd_kriteria'] ?></td>
                                <td><?= $kr['kriteria'] ?></td>
                                <input type="checkbox" checked="" hidden="" id="idkriteria" name="idkriteria[]" value="<?php echo $kr['id_kriteria'] ?>">
                                <td align="center">
                                   <?php
                                    $subkriteria = "SELECT * from penilaian INNER JOIN m_kriteria on penilaian.id_kriteria=m_kriteria.id_kriteria inner join m_subkriteria on m_kriteria.id_kriteria=m_subkriteria.id_kriteria inner join m_periode on penilaian.id_periode=m_periode.id_periode WHERE m_kriteria.id_kriteria = '$kr[id_kriteria]' AND id_sm = '$idsm' and status=1 and id_user = '$iduser'";

                                    $ss = $this->db->query($subkriteria)->result_array();
                                    foreach ($ss as $dd) : ?>
                                <td align="center">
                                   <label class="jawaban">
                                      <input required type="radio" name="p[<?php echo $kr['id_kriteria'] ?>]" value="<?php echo $dd['nilai'] ?>" <?php echo $dd['point'] == $dd['nilai'] ? 'checked' : ''; ?>>
                                      <span> <br> <small><?php echo $dd['subkriteria']; ?></<small>
                                      </span>
                                   </label>
                                </td>
                             <?php endforeach ?>
                             </td>
                             </tr>
                          <?php endforeach ?>
                       </tbody>
                    </table>
                 </div>
              </div>
              <div>
                 <?php if ($validasiSimpanStatus['status'] == 1) : ?>
                    <button id="simpan-button" type="submit" class="btn btn-lg btn-success btn-block">
                       <i class="fa fa-check-square-o fa-lg"></i>&nbsp;
                       <span id="payment-button-amount">Simpan</span>
                    </button>
                 <?php else : ?>
                    <button id="simpan-button" disabled type="button" class="btn btn-lg btn-secondary btn-block">
                       <i class="fa fa-warning fa-lg"></i>&nbsp;
                       <span id="payment-button-amount">Data Sosok Mulia tidak dalam masa periode aktif untuk dinilai</span>
                    </button>
                 <?php endif ?>
              </div>
           </div>
        </form>

     </div>
  </div>