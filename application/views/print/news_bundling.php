<html><head>
<title><?= $judul; ?></title>

  <style type="text/css">
body {
  font-size: 14px;
}


  </style>
</head><body>

  <center>
    <table width="500">
      <tr>
        <td>
        <center>
          <img src="<?= $gambar; ?>" width="250" style="margin-top:-60px"><br>
          <p style="margin-top:-10px">
            <b>Haistar</b> <br>
          Alamat
        </p>
        </center>
        </td>
      </tr>
      <tr>
        <td><hr></td>
      </tr>
      <tr>
        <td>
          <center>
           <p style="margin-top:0px">
            <b>BERITA ACARA SERAH TERIMA BARANG</b> <br><br>
            No sekian
          </p>
          </center>
        </td>
      </tr>
      <tr>
        <td>
          <p>Pada hari ini <?= $news['tanggal']; ?>, bertempat di Haistar, kami yang bertanda tangan dibawah ini :</p>
          <table>
            <tr>
              <td width="50px">1.</td>
              <td width="80px">Nama</td>
              <td>:</td>
              <td><?= $news['nama_pihak2']; ?></td>
            </tr>
            <tr>
              <td></td>
              <td width="80px">Posisi</td>
              <td>:</td>
              <td><?= $news['posisi_pihak2']; ?></td>
            </tr>
            <tr>
              <td></td>
              <td width="80px">Dept</td>
              <td>:</td>
              <td><?= $news['dept_pihak2']; ?></td>
            </tr>
            <tr>
              <td></td>
              <td width="80px">Plat Code</td>
              <td>:</td>
              <td><?= $news['plat_code']; ?></td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td>
          <p>Dalam hal ini bertindak untuk dan atas nama Dept Operation yang di sebut <b>PIHAK PERTAMA</b></p>
          <table>
            <tr>
              <td width="50px">2.</td>
              <td width="80px">Nama</td>
              <td>:</td>
              <td><?= $news['nama_pihak1']; ?></td>
            </tr>
            <tr>
              <td></td>
              <td width="80px">Posisi</td>
              <td>:</td>
              <td><?= $news['posisi_pihak1']; ?></td>
            </tr>
            <tr>
              <td></td>
              <td width="80px">Dept</td>
              <td>:</td>
              <td><?= $news['dept_pihak1']; ?></td>
            </tr>
          </table>
        </td>
      </tr>

      <tr>
        <td>
          <p  style="margin-top: 20px">
          Dalam hal ini bertindak untuk dan atas nama Dept yang di sebut <b>PIHAK KEDUA</b> Telah melakukan proses serah terima barang dari PIHAK PERTAMA kepada PIHAK KEDUA. PIHAK KEDUA telah menerima sejumlah barang sebagai berikut :
          </p>
        </td>
      </tr>

      <tr>
        <td>
        <table border="1" width="100%" style="margin-top: 20px; margin-bottom: 20px;">
          <tr>
            <th>No</th>
            <th>Client</th>
            <th>Qty</th>
            <th>UoM</th>
            <th>Remaks</th>
          </tr>
            <?php $news_detail = $this->db->get_where('request_bundling', ['id_request_bundling' => $news['id_barang']])->row_array() ?>
                    <?php $id_item = $news_detail['id_item_bundling']; ?>
                    <?php $bundling_detail = $this->db->query(" SELECT * FROM item_bundling_detail AS ibd JOIN item_bundling AS ib ON ibd.id_item_bundling = ib.id_item_bundling JOIN client ON ib.id_client = client.id_client WHERE ibd.id_item_bundling = $id_item ")->result_array() ?>
                    <?php $no = 1;
                    foreach ($bundling_detail as $row) : ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= $row['client_name']; ?></td>
            <td><?= $row['item_qty']; ?></td>
            <td>Pcs</td>
            <td>DI TERIMA SECARA PCS</td>
          </tr>
        <?php endforeach ?>
        </table>
        </td>
      </tr>

      <tr>
        <td>
          <p>
          Demikian surat berita acara terima barang dibuat oleh kedua belah pihak, keterangan barang-barang tersebut dalam kondisi baik dan cukup. Setelah barang di serah terima barang, maka semua barang yag di jelaskan diatas menjadi tanggung jawab PIHAK KEDUA
        </p>
        </td>
      </tr>

      <tr>
        <td>

          <p  style="margin-top: 20px">
          Yang menyatakan,</p>
        </td>
      </tr>

      <tr>
        <td>
        <table border="" width="100%" style="margin-top: 20px; margin-bottom: 20px;">
            <tr>
              <td>Delivered By</td>
            </tr>
            <tr>
              <td width="25%">
                <img src="<?= $approved ?>" width="100">
              </td>
            </tr>
            <tr>
              <td>Shipping</td>
            </tr>
          </table>
        </td>
      </tr>

      <tr>
        
      </tr>
    
    </table>

    <div style="page-break-before:always;">

      <div style="text-align: right;">
          <p style="margin-bottom:20px">
            <b>BERITA ACARA PENERIMAAN BARANG</b><br><br>
        </p>
      </div>

      <table width="100%">
        <tr>
          <td width="50%">
            <table>
              <tr>
                <td>Hari</td>
                <td>:</td>
                <td>hari</td>
              </tr>
              <tr>
                <td>Hari</td>
                <td>:</td>
                <td>hari</td>
              </tr>
              <tr>
                <td>Hari</td>
                <td>:</td>
                <td>hari</td>
              </tr>
            </table>
          </td>
          <td width="50%">
            <table>
              <tr>
                <td>Hari</td>
                <td>:</td>
                <td>hari</td>
              </tr>
              <tr>
                <td>Hari</td>
                <td>:</td>
                <td>hari</td>
              </tr>
              <tr>
                <td>Hari</td>
                <td>:</td>
                <td>hari</td>
              </tr>
            </table>
          </td>
        </tr>
      </table>

      <table border="1" width="100%" style="margin-top:20px">
        <tr>
          <th>No</th>
          <th>Client</th>
          <th>Kode</th>
          <th>Item Deskripsi</th>
          <th>Qty</th>
          <th>UoM</th>
          <th>Remaks</th>
        </tr>
        <tr>
          <?php $no=1; ?>
          <td><?= $no++; ?></td>
          <td><?= $no++; ?></td>
          <td><?= $no++; ?></td>
          <td><?= $no++; ?></td>
          <td><?= $no++; ?></td>
          <td><?= $no++; ?></td>
          <td><?= $no++; ?></td>
        </tr>
      </table>



    </div>

  </center>
</body></html>