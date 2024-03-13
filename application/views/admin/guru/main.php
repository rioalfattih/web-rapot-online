<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Guru
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Guru</li>
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

              <h3 class="box-title">List Guru</h3>
              <div class="pull-right box-tools">
                  <button class="btn btn-primary" data-toggle="modal" data-target="#ModalTambahGuru"><li class="fa fa-plus"></li> Tambah Guru</button>
              </div>
            </div>

            <div class="box-body chat" id="chat-box">
                <!--Isi Konten-->
                <table class="table" id="table">
                  <thead>
                	<tr>
                		<th>NIP</th>
                		<th>Nama</th>
                		<th>Tgl Lahir</th>
                		<th>JK</th>
                		<th>No Telp</th>
                		<th>Alamat</th>
                    <th>Aksi</th>
                	</tr>
                </thead>
                <tbody>
                	<?php foreach($dataGuru as $row){ ?>
                	<tr>
                		<td><?php echo $row->nip; ?></td>
                		<td><?php echo $row->nama_guru; ?></td>
                		<td><?php echo $row->tgl_lahir; ?></td>
                		<td><?php echo $row->jk; ?></td>
                		<td><?php echo $row->no_telp; ?></td>
                		<td><?php echo $row->alamat; ?></td>
                    <td><button class="btn btn-primary btn-xs" onClick="json_guru('<?php echo $row->nip; ?>');" data-toggle="modal" data-target="#ModalEditGuru" title="Edit"><li class="fa fa-edit"></li></button> <a href="<?php echo site_url('adm_guru/hapus_guru/'.$row->nip); ?>"><button class="btn btn-danger btn-xs" title="Hapus" onClick="return confirm('Apakah Anda Yakin?');"><li class="fa fa-times"></li></button></a></td>
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

  <!-- Modal Tambah Guru -->
<div id="ModalTambahGuru" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Guru</h4>
      </div>
      <div class="modal-body">
        <form action="<?php echo site_url('adm_guru/act_tambahguru'); ?>" method="POST">
          <div class="form-group">
            <label>NIP</label>
            <input type="text" class="form-control" name="nip" required>
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="text" class="form-control" name="password" required>
          </div>
          <div class="form-group">
            <label>Nama Guru</label>
            <input type="text" class="form-control" name="nama_guru" required>
          </div>
          <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="date" class="form-control" name="tgl_lahir" required>
          </div>
          <div class="form-group">
            <label>Jenis Kelamin</label>
            <select class="form-control" name="jk" required>
              <option value="L">Laki - Laki</option>
              <option value="P">Perempuan</option>
            </select>
          </div>
          <div class="form-group">
            <label>No Telp</label>
            <input type="text" class="form-control" name="no_telp" required>
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <input type="text" class="form-control" name="alamat" required>
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

<!-- Modal Edit Guru -->
<div id="ModalEditGuru" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Guru <span id="headerModal"></span></h4>
      </div>
      <div class="modal-body">
        <form action="<?php echo site_url('adm_guru/act_editguru'); ?>" method="POST">
          <div class="form-group">
            <label>NIP</label>
            <input type="text" class="form-control" name="nip" id="nip" required>
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="text" class="form-control" name="password">
            <label>Isikan apabila ingin mengganti password</label>
          </div>
          <div class="form-group">
            <label>Nama Guru</label>
            <input type="text" class="form-control" name="nama_guru" id="nama_guru" required>
          </div>
          <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" required>
          </div>
          <div class="form-group">
            <label>Jenis Kelamin</label>
            <select class="form-control" name="jk" id="jk" required>
              <option value="L">Laki - Laki</option>
              <option value="P">Perempuan</option>
            </select>
          </div>
          <div class="form-group">
            <label>No Telp</label>
            <input type="text" class="form-control" name="no_telp" id="no_telp" required>
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <input type="text" class="form-control" name="alamat" id="alamat" required>
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