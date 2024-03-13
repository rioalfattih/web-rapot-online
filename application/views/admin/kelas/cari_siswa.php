<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Kelas
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Kelas</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php if(!empty($this->session->flashdata('config'))) { ?>
      <div class="alert alert-<?php echo $this->session->flashdata('config'); ?>">
        <?php echo $this->session->flashdata('pesan'); ?>
      </div>
      <?php } ?>
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">

          <!-- Chat box -->
          <div class="box box-success">
            <div class="box-header">
              <i class="fa fa-user"></i>

              <h3 class="box-title">List Kelas Siswa</h3>
            </div>

            <div class="box-body chat" id="dataMapel">
                <!--Isi Konten-->
                <table class="table" id="table">
                  <thead>
                  	<tr>
                  		<th>NIS</th>
                  		<th>Nama</th>
                  		<th>Tgl Lahir</th>
                      <th>JK</th>
                      <th>No Telp</th>
                      <th>Alamat</th>
                      <th>Angkatan</th>
                      <th>Jurusan</th>
                      <th>Kelas</th>
                  	</tr>
                  </thead>
                  <tbody>
                	<?php foreach($dataKelas as $row){ ?>
                  	<tr>
                      <td><?php echo $row->nis; ?></td>
                      <td><?php echo $row->nama_siswa; ?></td>
                      <td><?php echo $row->tgl_lahir  ; ?></td>
                      <td><?php echo $row->jk; ?></td>
                      <td><?php echo $row->no_telp; ?></td>
                      <td><?php echo $row->alamat; ?></td>
                      <td><?php echo $row->angkatan; ?></td>
                      <td><?php echo $row->jurusan; ?></td>
                      <td><?php echo $row->kelas; ?></td>
                  	</tr>
                	<?php } ?>
                </tbody>
                </table>
            </div>
          </div>
        </section>
        <!-- /.Left col -->
    </div>
  </div>