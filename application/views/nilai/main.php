<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        DATA NILAI PER KELAS
        <!--<small>Control panel</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">NILAI</li>
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

              <h3 class="box-title">Nilai Kelas 10</h3>
            </div>

            <div class="box-body chat" id="chat-box">
                <!--Isi Konten-->
                <table class="table">
                	<tr>
                		<th>Mata Pelajaran</th>
                		<th>Kelas</th>
                		<th>Semester</th>
                		<th>Nilai</th>
                	</tr>
                	<?php foreach($dataNilai as $row){ 
                    $kelas = substr($row->kelas,0,2);
                    if($kelas==10){
                  ?>
                	<tr>
                		<td><?php echo $row->nama_mapel; ?></td>
                		<td><?php echo $row->kelas; ?></td>
                		<td><?php echo $row->semester; ?></td>
                		<td><?php echo $row->nilai; ?></td>
                	</tr>
                	<?php }} ?>
                </table>
            </div>
          </div>
        </section>
        <!-- /.Left col -->
    </div>

    <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">

          <!-- Chat box -->
          <div class="box box-success">
            <div class="box-header">
              <i class="fa fa-user"></i>

              <h3 class="box-title">Nilai Kelas 11</h3>
            </div>

            <div class="box-body chat" id="chat-box">
                <!--Isi Konten-->
                <table class="table">
                  <tr>
                    <th>Mata Pelajaran</th>
                    <th>Kelas</th>
                    <th>Semester</th>
                    <th>Nilai</th>
                  </tr>
                  <?php foreach($dataNilai as $row){ 
                    $kelas = substr($row->kelas,0,2);
                    if($kelas==11){
                  ?>
                  <tr>
                    <td><?php echo $row->nama_mapel; ?></td>
                    <td><?php echo $row->kelas; ?></td>
                    <td><?php echo $row->semester; ?></td>
                    <td><?php echo $row->nilai; ?></td>
                  </tr>
                  <?php }} ?>
                </table>
            </div>
          </div>
        </section>
        <!-- /.Left col -->
    </div>

    <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">

          <!-- Chat box -->
          <div class="box box-success">
            <div class="box-header">
              <i class="fa fa-user"></i>

              <h3 class="box-title">Nilai Kelas 12</h3>
            </div>

            <div class="box-body chat" id="chat-box">
                <!--Isi Konten-->
                <table class="table">
                  <tr>
                    <th>Mata Pelajaran</th>
                    <th>Kelas</th>
                    <th>Semester</th>
                    <th>Nilai</th>
                  </tr>
                  <?php foreach($dataNilai as $row){ 
                    $kelas = substr($row->kelas,0,2);
                    if($kelas==12){
                  ?>
                  <tr>
                    <td><?php echo $row->nama_mapel; ?></td>
                    <td><?php echo $row->kelas; ?></td>
                    <td><?php echo $row->semester; ?></td>
                    <td><?php echo $row->nilai; ?></td>
                  </tr>
                  <?php }} ?>
                </table>
            </div>
          </div>
        </section>
        <!-- /.Left col -->
    </div>
  </div>