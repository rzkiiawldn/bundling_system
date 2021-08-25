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
            <b>PT BINTANG DAGANG INTERNASIONAL (Haistar)</b> <br>
            Alamat Jl. Kemandoran I No.37, RT.13/RW.3, Grogol Utara, Kec. Kby. Lama, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12210
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
           <p style="margin-top:0px;text-transform: uppercase;">
            <b>BERITA ACARA SERAH TERIMA BARANG BUNDLING</b> <br>
            <b>NO : Haistar/Kemandoran/<?= date('Y'); ?>/<?= date('M'); ?>/<?= date('D'); ?>/00<?= rand(1, 100); ?></b> <br><br>
           
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
              <td width="80px">Departemen</td>
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
              <td width="80px">Departemen</td>
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
             <?php $id = $news['id_news'] ?>
              <?php $news_detail = $this->db->query("SELECT * FROM news_detail JOIN news ON news_detail.id_news = news.id_news JOIN request_bundling ON news_detail.id_request_bundling = request_bundling.id_request_bundling LEFT JOIN client ON news.id_client = client.id_client WHERE news.id_news = $id")->result_array(); ?>
              <?php $no = 1;
              foreach ($news_detail as $row) : ?>
          <tr style="text-align:center"> 
            <td><?= $no++; ?></td>
            <td><?= $row['client_name']; ?></td>
            <td><?= $row['request_quantity']; ?></td>
            <td><?= $row['uom']; ?></td>
            <td><?= $row['remaks']; ?></td>
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
              <td>Menyetujui</td>
            </tr>
            <tr>
              <td width="25%">
                <img src="<?= $approved ?>" width="100">
              </td>
            </tr>
            <tr>
              <td>Supervisior</td>
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
            <b>BERITA ACARA PENERIMAAN BARANG BUNDLING</b><br><br>
        </p>
      </div>

      <table width="100%">
        <tr>
          <td width="50%">
            <table>
              <tr>
                <td>Hari</td>
                <td>:</td>
                <td><?= date('l'); ?></td>
              </tr>
              <tr>
                <td>Tanggal</td>
                <td>:</td>
                <td><?= date('F Y'); ?></td>
              </tr>
              <tr>
                <td>Client</td>
                <td>:</td>
                <td><?= $news['client_name']; ?></td>
              </tr>
            </table>
          </td>
          <td width="50%">
            <table>
              <tr>
                <td>Transporter/ekspedisi</td>
                <td>:</td>
                <td><?= $news['nama_pihak1']; ?></td>
              </tr>
              <tr>
                <td>No Kendaraan</td>
                <td>:</td>
                <td><?= $news['plat_code']; ?></td>
              </tr>
            </table>
          </td>
        </tr>
      </table>

      <table border="1" width="100%" style="margin-top:20px">
        <tr> 
          <th>No</th>
          <th>Client</th>
          <th>Code</th>
          <!-- <th>News Deskripsi</th> -->
          <th>Qty</th>
          <th>UoM</th>
          <th>Remaks</th>
        </tr>
          <?php $no=1; ?>
        <?php foreach($news_detail as $row): ?>
        <tr style="text-align:center">
          <td><?= $no++; ?></td>
          <td><?= $row['client_name']; ?></td>
          <td><?= $row['request_bundling_code'] ?></td>
          <!-- <td></td> -->
          <td><?= $row['request_quantity']; ?></td>
          <td><?= $row['uom']; ?></td>
          <td><?= $row['remaks']; ?></td>
        </tr>
      <?php endforeach; ?>
      </table>



    </div>

  </center>
</body></html>