<body>
  <!-- ini navbar -->
  <div class="row my-5 pb-5">
    <nav class="navbar navbar-expand-lg navbar-success navbar-dark bg-success py-2 fixed-top">
      <div class="container">
        <a class="navbar-brand" href="<?php echo site_url(); ?>dashboard"><strong>IT - Clinic</strong></a>
        </button>

        <div class="navbar-collapse" id="navbar_main">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url(); ?>dashboard/technician_view_accepted_request">Accepted Request</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Request History</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url(); ?>login/logout">Log Out</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
  <!-- akhir navbar -->

  <!-- ini body -->
  <div class="row px-5 mx-5">

    <div class="col-md-6">
      <h4>List accepted request :</h4>
    </div>


  </div><br><br><br>

  <div class="row mx-5">
    <div class="col md-12">
      <?php
      if ($this->session->flashdata('message') != '') {
      ?>
        <div class="alert alert-primary">
          <?php echo $this->session->flashdata('message'); ?>
        </div>
      <?php
      }
      ?>
    </div>
  </div>

  <div class="row py-5 px-5 mx-5">
    <?php foreach ($request as $rows) { ?>
      <div class="col-md-4 my-3">
        <div class="card shadow-lg" style="width: 20rem;">
          <img src="<?php echo base_url(); ?>data/order/<?php echo $rows->image; ?>" class="card-img-top" height="200px" style="object-fit: cover">
          <div class="card-body">
            <p class="h6">Kode Order :</p>
            <p class="card-text"><?php echo $rows->code_order; ?></p>
            <p class="h6">Keterangan :</p>
            <p class="card-text"><?php echo $rows->detail; ?></p><br><br>

            <center>
              <?php if ($rows->status == "avaiable") { ?>
                <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal_accept_<?php echo $rows->id; ?>">Ambil Job</a>
              <?php } ?>
              <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal_more_detail_<?php echo $rows->id; ?>">Details</a>
            </center>
          </div>
        </div>
        <!-- modal -->
        <div class="modal modal-light fade" id="modal_more_detail_<?php echo $rows->id; ?>" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modal_title_6">More details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="row">
                <div class="col">
                  <div class="d-flex justify-content-center">
                    <img class="rounded" src="<?php echo base_url(); ?>data/order/<?php echo $rows->image; ?>" height="250px" style="object-fit: cover">
                  </div>
                </div>
              </div>
              <br><br>
              <div class="modal-body">
                <p class="h6">Kode Order :</p>
                <p class="card-text"><?php echo $rows->code_order; ?></p>
                <p class="h6">Keterangan :</p>
                <p class="card-text"><?php echo $rows->detail; ?></p>
                <p class="card-text h6">Tanggal Order : <?php echo $rows->date_order; ?></p>
                <p class="card-text h6">Tanggal Selesai : <?php echo $rows->date_finish; ?></p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Kembali</button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal modal-success fade" id="modal_accept_<?php echo $rows->id; ?>" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Ambil Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="py-3 text-center">
                  <i class="fas fa-exclamation-triangle fa-4x"></i>
                  <p>
                    Anda yakin ingin mengambil order ?
                  </p>
                </div>
              </div>
              <div class="modal-footer">
                <a href="<?php echo site_url('dashboard/technician_take_request' . "/" . $rows->id . "/" . $this->session->userdata('user')); ?>" class="btn btn-sm btn-secondary">Ya</a>
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Kembali</button>
              </div>
            </div>
          </div>
        </div>
        <!-- modal -->
      </div>
    <?php
    } ?>
  </div>

  <!-- modal -->
  <div class="modal modal-teritiary fade" id="modal_ambil_job" tabindex="-1" role="dialog" aria-labelledby="modall" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal_title_6">Status</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="py-3 text-center">
            <i class="fa fa-check fa-4x"></i>
            <h4 class="heading mt-4 mb-3">Selamat Bekerja :)</h4>
            <!-- ganti kode nya -->
            <h5 class="heading mt-2">Kode Pemesanan : <b>X41oa8Zl</b></h5>
            <!-- ganti kode nya -->
            <p>
              silahkan ambil barang di kantor it-clinic dengan menunjukan kode diatas
            </p>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal"><a href="sign-in.html">Kembali</a></button>
        </div>
      </div>
    </div>
  </div>
  <!-- modal -->

  <!-- footer -->
  <footer class="pt-5 pb-3 footer  footer-dark bg-tertiary">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-4">
          <div class="pr-lg-5">
            <h1 class="heading h6 text-uppercase font-weight-700 mb-3"><strong>IT-</strong>Clinic</h1>
            <p>IT-Clinic didesain dan di program untuk memenuhi tugas Design Interface dan juga Pemrograman Web Lanjut.
            </p>
          </div>
        </div>
        <!-- space kosong -->
        <div class="col-5"></div>
        <!-- space kosong -->
        <div class="col-1 col-md">
          <h5 class="heading h6 text-uppercase font-weight-700 mb-3">Shortcut</h5>
          <ul class="list-unstyled text-small">
            <li><a class="text-muted" href="index.html">Home</a></li>
            <li><a class="text-muted" href="sign-in.html">Sign-In</a></li>
            <li><a class="text-muted" href="register-user.html">Register User</a></li>
            <li><a class="text-muted" href="register-teknisi.html">Register Teknisi</a></li>
          </ul>
        </div>
        <div class="col-1 col-md">
          <h5 class="heading h6 text-uppercase font-weight-700 mb-3">About</h5>
          <ul class="list-unstyled text-small">
            <li><a class="text-muted" href="about.html">About Us</a></li>
          </ul>
        </div>
      </div>
      <hr>
      <div class="d-flex align-items-center">
        <span class="">
          © 2019 <a href="#" class="footer-link" target="_blank">IT-Clinic</a>
        </span>
      </div>
    </div>
  </footer>
  <!-- footer -->

  <!-- cdn js ojo diganti!! -->

  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 
  <script src="<?php echo base_url(); ?>assets/js/theme.js"></script>
</body>

</html>