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

              <h3 class="box-title">List Mapel</h3>
              <div class="pull-right box-tools">
                  <button class="btn btn-primary" data-toggle="modal" data-target="#ModalTambahMapel"><li class="fa fa-plus"></li> Tambah Mapel</button>
              </div>
            </div>

            <div class="box-body chat" id="dataMapel">
                <!--Isi Konten-->
                <table class="table">
                	<tr>
                		<th>ID Kelas</th>
                		<th>Kelas</th>
                		<th>Wali Kelas</th>
                    <th>Aksi</th>
                	</tr>
                	<?php foreach($dataKelas as $row){ ?>
                	<tr>
                		<td><?php echo $row->id_kelas; ?></td>
                		<td><?php echo $row->kelas; ?></td>
                		<td><?php echo $row->nama_guru; ?></td>
                    <td><button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#ModalEditMapel" data-kode="<?php echo $row->id_kelas; ?>" id="edit_kelas" title="Edit Kelas"><li class="fa fa-edit"></li></button> <a href="<?php echo site_url('adm_kelas/isi_kelas/'.$row->id_kelas); ?>" target="_blank" title="Cari Siswa"><button class="btn btn-primary btn-xs"><li class="fa fa-search"></li></button></td>
                	</tr>
                	<?php } ?>
                </table>
            </div>
          </div>
        </section>
        <!-- /.Left col -->
    </div>
  </div>

  <!-- Modal Tambah Guru -->
<div id="ModalTambahMapel" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Mata Pelajaran</h4>
      </div>
      <div class="modal-body">
        <form action="<?php echo site_url('adm_mapel/act_tambah'); ?>" method="POST">
          <div class="form-group">
            <label>Kode Mapel</label>
            <input type="text" class="form-control" name="kode_mapel" required>
          </div>
          <div class="form-group">
            <label>Nama Mapel</label>
            <input type="text" class="form-control" name="nama_mapel" required>
          </div>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Submit" name="submit">
      </div>
    </div>
        </form>
  </div>
</div>

<!-- Modal Tambah Guru -->
<div id="ModalEditMapel" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Mata Pelajaran</h4>
      </div>
      <div class="modal-body">
        <form action="<?php echo site_url('adm_mapel/act_edit'); ?>" method="POST">
          <div class="form-group">
            <label>Kode Mapel</label>
            <input type="text" class="form-control" name="kode_mapel" id="kode_mapel" readonly>
          </div>
          <div class="form-group">
            <label>Nama Mapel</label>
            <input type="text" class="form-control" name="nama_mapel" id="nama_mapel" required>
          </div>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Submit" name="submit">
      </div>
    </div>
        </form>
  </div>
</div>