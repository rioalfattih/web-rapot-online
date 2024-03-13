<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Peringkat Per Kelas
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <?php if(!empty($this->session->flashdata('config'))) { ?>
      <div class="alert alert-<?php echo $this->session->flashdata('config'); ?>">
        <?php echo $this->session->flashdata('pesan'); ?>
      </div>
      <?php } ?>
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <?php foreach($kelas as $row) { ?>
        <section class="col-lg-12 connectedSortable">

          <!-- Chat box -->
          <div class="box box-success">
            <div class="box-header">
              <i class="fa fa-user"></i>

              <h3 class="box-title">Peringkat Kelas <?php echo $row->kelas; ?></h3>
            </div>

            <?php if($row->id_kelas == 1){ ?>
            <div class="box-body chat">
               <table class="table">
                <tr>
                  <th>Peringkat</th>
                  <th>NIS</th>
                  <th>Nama Siswa</th>
                </tr>
                <?php $no=1; foreach($peringkat1 as $row){?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $row->nis; ?></td>
                    <td><?php echo $row->nama_siswa; ?> </td>
                  </tr>
                  <?php $no++; } ?>
               </table>
            </div>

            <?php }else if($row->id_kelas == 2) { ?>

              <div class="box-body chat">
               <table class="table">
                <tr>
                  <th>Peringkat</th>
                  <th>NIS</th>
                  <th>Nama Siswa</th>
                </tr>
                <?php $no=1; foreach($peringkat2 as $row){?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $row->nis; ?></td>
                    <td><?php echo $row->nama_siswa; ?> </td>
                  </tr>
                  <?php $no++; } ?>
               </table>
            </div>
          <?php }else if($row->id_kelas == 3) { ?>

              <div class="box-body chat">
               <table class="table">
                <tr>
                  <th>Peringkat</th>
                  <th>NIS</th>
                  <th>Nama Siswa</th>
                </tr>
                <?php $no=1; foreach($peringkat3 as $row){?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $row->nis; ?></td>
                    <td><?php echo $row->nama_siswa; ?> </td>
                  </tr>
                  <?php $no++; } ?>
               </table>
            </div>
          <?php }else if($row->id_kelas == 4) { ?>

              <div class="box-body chat">
               <table class="table">
                <tr>
                  <th>Peringkat</th>
                  <th>NIS</th>
                  <th>Nama Siswa</th>
                </tr>
                <?php $no=1; foreach($peringkat4 as $row){?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $row->nis; ?></td>
                    <td><?php echo $row->nama_siswa; ?> </td>
                  </tr>
                  <?php $no++; } ?>
               </table>
            </div>
          <?php }else if($row->id_kelas == 5) { ?>

              <div class="box-body chat">
               <table class="table">
                <tr>
                  <th>Peringkat</th>
                  <th>NIS</th>
                  <th>Nama Siswa</th>
                </tr>
                <?php $no=1; foreach($peringkat5 as $row){?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $row->nis; ?></td>
                    <td><?php echo $row->nama_siswa; ?> </td>
                  </tr>
                  <?php $no++; } ?>
               </table>
            </div>
          <?php }else if($row->id_kelas == 6) { ?>

              <div class="box-body chat">
               <table class="table">
                <tr>
                  <th>Peringkat</th>
                  <th>NIS</th>
                  <th>Nama Siswa</th>
                </tr>
                <?php $no=1; foreach($peringkat6 as $row){?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $row->nis; ?></td>
                    <td><?php echo $row->nama_siswa; ?> </td>
                  </tr>
                  <?php $no++; } ?>
               </table>
            </div>
          <?php } ?>
          </div>
        </section>
        <?php } ?>
        <!-- /.Left col -->
    </div>
  </div>
