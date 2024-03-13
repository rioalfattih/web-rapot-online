<!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2018-2019 <a href="http://stikombanyuwangi.ac.id" target="_blank">STIKOM Banyuwangi</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url('assets/components'); ?>/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('assets/components'); ?>/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/components'); ?>/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url('assets/components'); ?>/raphael/raphael.min.js"></script>
<script src="<?php echo base_url('assets/components'); ?>/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('assets/components'); ?>/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('assets/components'); ?>/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url('assets/components'); ?>/moment/min/moment.min.js"></script>
<script src="<?php echo base_url('assets/components'); ?>/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url('assets/components'); ?>/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url('assets/components'); ?>/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url('assets/components'); ?>/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets/components'); ?>/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/components'); ?>/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url('assets/components'); ?>/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/components'); ?>/dist/js/demo.js"></script>
<script src="<?php echo base_url('assets'); ?>/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/js/dataTables.bootstrap.min.js"></script>

<script type="application/javascript">
    $(document).ready(function() {
      tampil_semua_siswa();
      $('#table').DataTable();
    } );

    function json_guru(nip)
    {
       $.getJSON("<?php echo site_url('adm_guru/json_guru/'); ?>"+nip, function(result){
        $("#headerModal").html(result['nama_guru']);
        $("#nip").val(result['nip']);
        $("#nama_guru").val(result['nama_guru']);
        $("#tgl_lahir").val(result['tgl_lahir']);
        $("#jk").val(result['jk']);
        $("#no_telp").val(result['no_telp']);
        $("#alamat").val(result['alamat']);
      });
    };

    function json_siswa(nis)
    {
       $.getJSON("<?php echo site_url('adm_siswa/json_siswa/'); ?>"+nis, function(result){
        $("#EheaderModal").html(result['nama_siswa']);
        $("#Enis").val(result['nis']);
        $("#Enama_siswa").val(result['nama_siswa']);
        $("#Etgl_lahir").val(result['tgl_lahir']);
        $("#Ejk").val(result['jk']);
        $("#Eno_telp").val(result['no_telp']);
        $("#Ealamat").val(result['alamat']);
        $("#Eangkatan").val(result['angkatan']);
        $("#Ejurusan").val(result['jurusan']);
      });
    };

    function cari_siswa()
    {
      $("#verifi").html("Loading...");
      var nis = $("#nis").val();
      $.getJSON("<?php echo site_url('adm_nilai/json_cari_siswa/'); ?>"+nis, function(result)
      {
        $("#verifi").html("Siswa: "+result['nama_siswa']);
      });
    }

    $("#nisadd").on("keyup", function(){
      $("#verifiadd").html("Loading...");
      var nis = $("#nisadd").val();
      $.getJSON("<?php echo site_url('adm_nilai/json_cari_siswa/'); ?>"+nis, function(result)
      {
        if(result)
        {
          $("#verifiadd").html("Siswa: "+result['nama_siswa']+", Jurusan: "+result['jurusan']);
        }else{
          $("#verifiadd").html("Data Tidak Ditemukan!");
        }
      });
    });

    function json_nilai_siswa(id)
    {
       $.getJSON("<?php echo site_url('adm_nilai/json_nilai_siswa/'); ?>"+id, function(result){
         $("#headerModal").html(result['nama_siswa']);
         $("#id_nilai").val(result['id_nilai']);
        $("#nis").val(result['nis']);
        $("#kd_mapel").val(result['kd_mapel']);
        $("#id_kelas").val(result['id_kelas']);
        $("#semester").val(result['semester']);
        $("#nilai").val(result['nilai']);
       });
    };

    function tampil_semua_siswa()
    {
      $.get("<?php echo site_url('adm_siswa/isi_kelas'); ?>", function(result)
      {
        $('#tableIsiKelas').html(result);
      });
    }

    function pilih_kelas()
    {
      var id_kelas = $('#selectKelas').val();
      if(id_kelas=="semua"){
        tampil_semua_siswa();
      }else{
        $.get("<?php echo site_url('adm_siswa/isi_kelas/'); ?>"+id_kelas, function(result)
        {
          $('#tableIsiKelas').html(result);
        });
      }
    }

    $("#dataMapel").on("click", "#edit_mapel", function() {
      $('#kode_mapel').val($(this).data('kode'));
      $('#nama_mapel').val($(this).data('nama'));
    });

    $("#table").on("click", "#tambahKomen", function(){
      $("#knis").val($(this).data('nis'));
      $("#knama").val($(this).data('nama'));
    });
  </script>

</body>
</html>