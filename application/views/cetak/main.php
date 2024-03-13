<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        PRINT NILAI SISWA
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
     
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">

          <!-- Chat box -->
          <div class="box box-success">
            <div class="box-header">
              <i class="fa fa-user"></i>

              <h3 class="box-title">Nilai Kelas 1</h3>
            </div>

            <div class="box-body chat" id="chat-box">
                <!--Isi Konten-->
                <div class="row">
                  <div class="col-lg-4">

                    <form method="GET" action="<?php echo site_url('cetak_nilai/print'); ?>" target="_blank"> 
                      <div class="form-group">

                        <label>Pilih Kelas</label>
                        <div class="pull-right box-tools">
                          <button class="btn btn-primary" ><li class="fa fa-print"></li> PRINT</button>
                        </div>
                        <select class="form-control" name="id_kelas">
                          <?php foreach($dataKelas as $row){ ?>
                            <option value="<?php echo $row->id_kelas; ?>"><?php echo $row->kelas; ?></option>
                            <?php } ?>
                        </select>
                      </div>
                      </form>
                  </div>
                </div>
          </div>
        </div>
        </section>
        <!-- /.Left col -->
    </div>
  </div>
