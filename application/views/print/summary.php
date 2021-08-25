<html><head>
<title><?= $judul; ?></title>

  <style type="text/css">
   body{
    font-size: 16px;
   }

   table, td, th {  
  border: 1px solid #ddd;
}

table {
  border-collapse: collapse;
}


  </style>
</head><body>

  <center>
  <p style="margin-top:0px">
    <b>SUMMARY REPORT <br>  <?= $start_date; ?> - <?= $end_date; ?></b> <br><br>
           
    </p>

    <table width="100%" style="text-align: center;margin-top: 5px;">
      <tr style="margin-bottom: 5" >
        <td><b>No</b></td>
        <td><b>No Laporan</b></td>
        <td><b>Nama Pihak 1</b></td>
        <td><b>Posisi Pihak 1</b></td>
        <td><b>Plat code</b></td>
        <td><b>Nama Pihak 2</b></td>
        <td><b>Posisi Pihak 2</b></td>
        <td><b>Lokasi</b></td>
        <td><b>Remaks</b></td>
        <td><b>Tanggal</b></td>
        <td><b>Client</b></td>
        <td><b>Status</b></td>
      </tr>
      <?php if($summary->num_rows() > 0) { ?>
      <?php $no=1; $laporan=1; foreach ($summary->result_array() as $row) : ?>
      <tr>
        <td><?= $no++; ?></td> 
        <td>Haistar/Kemandoran/<?= date('Y'); ?>/<?= date('M'); ?>/<?= date('D'); ?>/00<?= $laporan++; ?></td>
        <td><?= $row['nama_pihak1']; ?></td>
        <td><?= $row['posisi_pihak1']; ?></td>
        <td><?= $row['plat_code']; ?></td>
        <td><?= $row['nama_pihak2']; ?></td>
        <td><?= $row['posisi_pihak2']; ?></td>
        <td><?= $row['lokasi']; ?></td>
        <td><?= $row['remaks']; ?></td>
        <td><?= $row['tanggal']; ?></td>
        <?php $client = $this->db->get_where('client', ['id_client' => $row['id_client']])->row_array(); ?>
        <td><?= $client['client_name']; ?></td>
        <td><?= $row['status'] == 1 ? 'Approved' : 'Pending'; ?></td>
      </tr>
      <?php endforeach; ?>
      <?php } else { ?>
         <tr>
          <td colspan="14">Data Kosong</td>
        </tr>
      <?php } ?>
    </table>
  </center>
</body></html>