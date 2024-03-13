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
                      <th>Aksi</th>
                  	</tr>
                  </thead>
                  <tbody>
                  	<?php foreach($dataSiswa as $row){ ?>
                  	<tr>
                  		<td><?php echo $row->nis; ?></td>
                  		<td><?php echo $row->nama_siswa; ?></td>
                  		<td><?php echo $row->tgl_lahir; ?></td>
                  		<td><?php echo $row->jk; ?></td>
                  		<td><?php echo $row->no_telp; ?></td>
                  		<td><?php echo $row->alamat; ?></td>
                      <td><?php echo $row->angkatan; ?></td>
                      <td><?php echo $row->jurusan; ?></td>
                      <td>Kelas <?php echo $row->kelas; ?></td>
                      <td><button class="btn btn-primary btn-xs" onClick="json_siswa('<?php echo $row->nis; ?>');" data-toggle="modal" data-target="#ModalEditSiswa" title="Edit"><li class="fa fa-edit"></li></button> <a href="<?php echo site_url('adm_siswa/hapus_siswa/'.$row->nis); ?>"><button class="btn btn-danger btn-xs" title="Hapus" onClick="return confirm('Apakah Anda Yakin?');"><li class="fa fa-times"></li></button></a></td>
                  	</tr>
                  	<?php } ?>
                  </tbody>
                </table>