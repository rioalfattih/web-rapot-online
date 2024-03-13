<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Siswa
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
        <section class="col-lg-12 connectedSortable">

          <!-- Chat box -->
          <div class="box box-success">
            <div class="box-header">
              <i class="fa fa-user"></i>

              <h3 class="box-title">List Siswa</h3>
              <div class="pull-right box-tools">
                  
                  <button class="btn btn-primary" data-toggle="modal" data-target="#ModalTambahSiswa"><li class="fa fa-plus"></li> Tambah Siswa</button>
              </div>
            </div>


            <div class="box-body chat">
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
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach($dataSiswa as $row){ ?>
                    <tr>
                      <td><?php echo $row->nis; ?></td>
                      <td><?php echo $row->nama_siswa; ?></td>
                      <td><?php echo $row->tgl_lahir  ; ?></td>
                      <td><?php echo $row->jk; ?></td>
                      <td><?php echo $row->no_telp; ?></td>
                      <td><?php echo $row->alamat; ?></td>
                      <td><?php echo $row->angkatan; ?></td>
                      <td><?php echo $row->jurusan; ?></td>
                      <td><button class="btn btn-primary btn-xs" onClick="json_siswa('<?php echo $row->nis; ?>');" data-toggle="modal" data-target="#ModalEditSiswa" title="Edit"><li class="fa fa-edit"></li></button> <a href="<?php echo site_url('adm_siswa/hapus_siswa/'.$row->nis); ?>"><button class="btn btn-danger btn-xs" title="Hapus" onClick="return confirm('Apakah Anda Yakin?');"><li class="fa fa-times"></li></button></a> <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#ModalTambahKomentar" data-nis="<?php echo $row->nis; ?>" data-nama="<?php echo $row->nama_siswa; ?>" id="tambahKomen" title="Tambah Komentar"><li class="fa fa-comment"></li></button></td>
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

  <div id="ModalTambahKomentar" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Siswa </span></h4>
      </div>
      <div class="modal-body">
        <form action="<?php echo site_url('adm_siswa/act_tambahkomentar'); ?>" method="POST">
          <input type="hidden" name="nip" value="<?php echo $this->session->userdata('adm_login'); ?>">
          <div class="form-group">
            <label>NIS</label>
            <input type="text" class="form-control" name="nis" id="knis" readonly>
          </div>
          <div class="form-group">
            <label>Nama Siswa</label>
            <input type="text" class="form-control" id="knama" readonly>
          </div>
          <div class="form-group">
            <label>Komentar</label>
            <textarea class="form-control" name="komentar"></textarea>
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

 <!-- Modal Tambah Siswa -->
<div id="ModalTambahSiswa" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Siswa <span id="headerModal"></span></h4>
      </div>
      <div class="modal-body">
        <form action="<?php echo site_url('adm_siswa/act_tambahsiswa'); ?>" method="POST">
          <div class="form-group">
            <label>NIS</label>
            <input type="text" class="form-control" name="nis" id="nis" required>
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="text" class="form-control" name="password">
          </div>
          <div class="form-group">
            <label>Nama Siswa</label>
            <input type="text" class="form-control" name="nama_siswa" id="nama_siswa" required>
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
          <div class="form-group">
            <label>Angkatan</label>
            <input type="text" class="form-control" name="angkatan" id="angkatan" required>
          </div>
          <div class="form-group">
            <label>Jurusan</label>
            <select class="form-control" name="jurusan" id="jurusan" required>
              <option value="">Tidak Ada</option>
              <option value="IPA">IPA</option>
              <option value="IPS">IPS</option>
            </select>
          </div>
          <div class="form-group">
            <label>Kelas</label>
            <select class="form-control" name="kelas" id="kelas" required>
              <?php foreach($dataKelas as $row){ ?>
                <option value="<?php echo $row->id_kelas; ?>"><?php echo $row->kelas; ?></option>
                <?php } ?>
            </select>
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

  <!-- Modal Edit Siswa -->
<div id="ModalEditSiswa" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Siswa <span id="EheaderModal"></span></h4>
      </div>
      <div class="modal-body">
        <form action="<?php echo site_url('adm_siswa/act_editsiswa'); ?>" method="POST">
          <div class="form-group">
            <label>NIS</label>
            <input type="text" class="form-control" name="nis" id="Enis" required>
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="text" class="form-control" name="password">
            <label>Isikan apabila ingin mengganti password</label>
          </div>
          <div class="form-group">
            <label>Nama Siswa</label>
            <input type="text" class="form-control" name="nama_siswa" id="Enama_siswa" required>
          </div>
          <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="date" class="form-control" name="tgl_lahir" id="Etgl_lahir" required>
          </div>
          <div class="form-group">
            <label>Jenis Kelamin</label>
            <select class="form-control" name="jk" id="Ejk" required>
              <option value="L">Laki - Laki</option>
              <option value="P">Perempuan</option>
            </select>
          </div>
          <div class="form-group">
            <label>No Telp</label>
            <input type="text" class="form-control" name="no_telp" id="Eno_telp" required>
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <input type="text" class="form-control" name="alamat" id="Ealamat" required>
          </div>
          <div class="form-group">
            <label>Angkatan</label>
            <input type="text" class="form-control" name="angkatan" id="Eangkatan" required>
          </div>
          <div class="form-group">
            <label>Jurusan</label>
            <select class="form-control" name="jurusan" id="Ejurusan" required>
              <option value="">Tidak Ada</option>
              <option value="IPA">IPA</option>
              <option value="IPS">IPS</option>
            </select>
          </div>
          <div class="form-group">
            <label>Kelas</label>
            <select class="form-control" name="kelas" id="Ekelas" required>
              <?php foreach($dataKelas as $row){ ?>
                <option value="<?php echo $row->id_kelas; ?>"><?php echo $row->kelas; ?></option>
                <?php } ?>
            </select>
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

