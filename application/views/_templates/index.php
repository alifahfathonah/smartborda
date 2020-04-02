<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
   <?php $this->load->view('_templates/palak') ?>
</head>

<body>
   <!-- Left Panel -->
   <?php $this->load->view('_templates/left-panel') ?>
   <!-- /#left-panel -->

   <!-- Right Panel -->
   <div id="right-panel" class="right-panel">
      <?php $this->load->view('_templates/header') ?>

      <!-- Content -->
      <div class="content">
         <!-- Animated -->
         <div class="animated fadeIn">
            <?php $this->load->view('_templates/content') ?>
         </div>
         <!-- .animated -->
      </div>
      <!-- /.content -->

      <div class="clearfix"></div>

      <?php if (peringatanAdmin()['peringatan'] == 1) : ?>
         <!-- Modal -->
         <div class="modal fade show" id="peringatanModal" role="dialog">
            <div class="modal-dialog">

               <!-- Modal content-->
               <div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title text-danger"><i class="fa fa-exclamation-circle"></i>&nbsp; Penting</h4>
                  </div>
                  <div class="modal-body text-center">
                     <img src="<?= base_url('images/warning.gif') ?>" alt=""><br>
                     Anda harus melakukan penilaian terhadap sosok mulia karena sudah diperingatkan oleh admin. Terima kasih
                  </div>
                  <div class="modal-footer">
                     <button type="button" onclick="window.location.href='<?= base_url('penilaian') ?>'" class="btn btn-success" data-dismiss="modal">Ok. Kerjakan</button>
                  </div>
               </div>

            </div>
         </div>
      <?php endif ?>
      <!-- Footer -->
      <?php $this->load->view('_templates/footer') ?>
      <!-- /.site-footer -->
   </div>
   <!-- /#right-panel -->

   <?php $this->load->view('_templates/sekel') ?>
</body>

</html>