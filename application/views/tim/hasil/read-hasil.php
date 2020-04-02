<div class="row">
   <div class="col-lg-12">
      <div class="card mb-2">
         <div class="card-body">
            <div class="row">
               <div class="col-md-12">
                  <div class="box-tile">
                     <h4><?= $judul ?>
                        <span class="pull-right">Penilai : <span class="text-info"><i class="fa fa-user"></i> <?= $this->session->userdata('namaDepan') . ' ' . $this->session->userdata('namaBelakang') ?></span></span>
                        <hr class="mb-3 mt-1">
                        <div class="row">
                           <div class="col-md-1">
                              <label>Periode</label>
                           </div>
                           <div class="col-md-4">
                              <select name="periode" id="periode" class="standardSelect" onchange="if (this.value) window.location.href=this.value">
                                 <?php foreach ($periode as $pr) : ?>
                                    <option value="<?= base_url('hasil/index/' . $pr['id_periode']) ?>" <?= $pr['id_periode'] == $this->uri->segment(3) ? 'selected' : '' ?>>
                                       <?= bulanIndo($pr['bulan']) . ' ' . $pr['tahun'] ?>
                                       <?= $pr['status'] == 1 ? ' - <small>(Aktif)</small>' : '' ?>
                                    </option>
                                 <?php endforeach ?>
                              </select>
                           </div>
                        </div>
                     </h4>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div class="card">
         <div class="card-body">
            <div class="custom-tab">
               <nav>
                  <div class="nav nav-tabs" id="nav-tab" role="tablist">
                     <a class="nav-item nav-link active" id="custom-nav-home-tab" data-toggle="tab" href="#custom-nav-home" role="tab" aria-controls="custom-nav-home" aria-selected="true">Hasil Penilai</a>
                     <a class="nav-item nav-link" id="custom-nav-profile-tab" data-toggle="tab" href="#custom-nav-profile" role="tab" aria-controls="custom-nav-profile" aria-selected="false">Total Keseluruhan</a>
                  </div>
               </nav>
               <div class="tab-content pt-2" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="custom-nav-home" role="tabpanel" aria-labelledby="custom-nav-home-tab">
                     <div class="alert alert-success" role="alert">
                        <h5 class="alert-heading"><b>Metode SMART</b> <small><i>(Simple Multi Attribute Rating)</i></small></h5>
                        <small>
                           Perhitungan Penerima Donasi Terbaik Menggunakan Metode SMART
                        </small>
                     </div>

                     <?php $this->load->view('tim/hasil/hasil-1minmax') ?>
                     <?php $this->load->view('tim/hasil/hasil-2utility') ?>
                     <?php $this->load->view('tim/hasil/hasil-3normalisasi') ?>
                     <?php $this->load->view('tim/hasil/hasil-4smart') ?>
                     <?php $this->load->view('tim/hasil/hasil-5poinborda') ?>
                  </div>

                  <div class="tab-pane fade" id="custom-nav-profile" role="tabpanel" aria-labelledby="custom-nav-profile-tab">
                     <div class="alert alert-success" role="alert">
                        <h5 class="alert-heading"><b>Nilai Borda</b> </h5>
                        <small>
                           Perhitungan dilakukan dengan menjumlahkan nilai borda dari masing-masing <b class="text-danger"><?= $countTim ?> orang penilai</b>.
                        </small>

                     </div>
                     <?php $this->load->view('tim/hasil/hasil-6totalborda') ?>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>