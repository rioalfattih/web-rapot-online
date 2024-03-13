<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Nilai Siswa
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Nilai Siswa</li>
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
        <section class="col-lg-12 connectedSortable">

          <!-- Chat box -->
          <div class="box box-success">
            <div class="box-header">
              <i class="fa fa-user"></i>

              <h3 class="box-title">List Nilai Siswa</h3>
              <div class="pull-right box-tools">
                  <button class="btn btn-primary" data-toggle="modal" data-target="#ModalTambahNilai"><li class="fa fa-plus"></li> Tambah Nilai</button>
              </div>
            </div>

            <div class="box-body chat" id="chat-box">
                <!--Isi Konten-->
                <table class="table" id="table">
                  <thead>
                	<tr>
                		<th>NIS</th>
                		<th>Nama Siswa</th>
                		<th>Mapel</th>
                		<th>Kelas</th>
                		<th>Semester</th>
                		<th>Nilai</th>
                    <th>Aksi</th>
                	</tr>
                </thead>
                <tbody>
                	<?php foreach($dataNilai as $row){ ?>
                	<tr>
                		<td><?php echo $row->nis; ?></td>
                		<td><?php echo $row->nama_siswa; ?></td>
                		<td><?php echo $row->nama_mapel; ?></td>
                		<td><?php echo $row->kelas; ?></td>
                		<td><?php echo $row->semester; ?></td>
                		<td><?php echo $row->nilai; ?></td>
                    <td><button class="btn btn-primary btn-xs" onClick="json_nilai_siswa('<?php echo $row->id_nilai; ?>');" data-toggle="modal" data-target="#ModalEditNilai" title="Edit"><li class="fa fa-edit"></li></button> <a href="<?php echo site_url('adm_nilai/hapus_nilai/'.$row->id_nilai); ?>"><button class="btn btn-danger btn-xs" title="Hapus" onClick="return confirm('Apakah Anda Yakin?');"><li class="fa fa-times"></li></button></a></td>
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

  <!-- Modal Tambah Nilai Siswa -->
<div id="ModalTambahNilai" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Nilai Siswa</h4>
      </div>
      <div class="modal-body">
        <form action="<?php echo site_url('adm_nilai/act_tambahnilai'); ?>" method="POST">
          <div class="form-group">
            <label>NIS</label>
            <input type="text" class="form-control" name="nis" id="nisadd" required>
            <label id="verifiadd"></label>
          </div>
          <div class="form-group">
            <label>Mata Pelajaran</label>
            <select class="form-control" name="kd_mapel">
              <?php foreach($mapel as $row){ ?>
                <option value="<?php echo $row->kode_mapel; ?>"><?php echo $row->nama_mapel; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label>Kelas</label>
            <select class="form-control" name="id_kelas">
              <?php foreach($kelas as $row){ ?>
                <option value="<?php echo $row->id_kelas; ?>"><?php echo $row->kelas; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label>Semester</label>
            <select class="form-control" name="semester" required>
              <option value="Genap">Genap</option>
              <option value="Ganjil">Ganjil</option>
            </select>
          </div>
          <div class="form-group">
            <label>Nilai</label>
            <input type="number" min="1" max="100" class="form-control" name="nilai" required>
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

<!-- Modal Edit Nilai Siswa -->
<div id="ModalEditNilai" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Nilai Siswa <span id="headerModal"></span></h4>
      </div>
      <div class="modal-body">
        <form action="<?php echo site_url('adm_nilai/act_editnilai'); ?>" method="POST">
          <input type="hidden" name="id_nilai" id="id_nilai">
          <div class="form-group">
            <label>NIS</label>
            <input type="text" class="form-control" name="nis" id="nis" required>
            <label id="verifi"></label>
          </div>
          <div class="form-group">
            <label>Mata Pelajaran</label>
            <select class="form-control" name="kd_mapel" id="kd_mapel">
              <?php foreach($mapel as $row){ ?>
                <option value="<?php echo $row->kode_mapel; ?>"><?php echo $row->nama_mapel; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label>Kelas</label>
            <select class="form-control" name="id_kelas" id="id_kelas">
              <?php foreach($kelas as $row){ ?>
                <option value="<?php echo $row->id_kelas; ?>"><?php echo $row->kelas; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label>Semester</label>
            <select class="form-control" name="semester" id="semester" required>
              <option value="Genap">Genap</option>
              <option value="Ganjil">Ganjil</option>
            </select>
          </div>
          <div class="form-group">
            <label>Nilai</label>
            <input type="number" min="1" max="100" class="form-control" name="nilai" id="nilai" required>
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