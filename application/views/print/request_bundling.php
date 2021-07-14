<html><head>
<title><?= $judul; ?></title>

  <style type="text/css">
   body{
   	font-size: 16px;
   }

  </style>
</head><body>

  <center>
    <table width="820">
      <tr>
      	<td width="250">
      		<p style="margin-top: 55px">From <br> <strong><?= $request_bundling['created']; ?></strong>
      			<br>
      		<?php $from = $this->db->get_where('user', ['fullname' => $request_bundling['created']])->row_array() ?>
                  Email: <?= $from['email']; ?>
              </p>
      	</td>
      	<td width="250">
      		<p style="margin-top: 55px">To <br> <strong><?= $request_bundling['client_name']; ?></strong>
      			<br>
      		Email: <?= $request_bundling['email']; ?></p>
      	</td>
        <td width="200">
        	<p>
        		<img src="<?= $gambar; ?>" width="250px">
        	</p>
        </td>
      </tr>    
    </table><br><br><br>

    <table width="100%" style="text-align: left;margin-top: 5px;" border="1">
      <tr style="margin-bottom: 5">
        <td><b>Produk</b></td>
        <td><b>Code</b></td>
        <td><b>Marketplace</b></td>
        <td><b>Quantity</b></td>
        <td><b>Weight</b></td>
      </tr>
	    <?php $item = $request_bundling['id_item_bundling']; ?>
	    <?php $bundling = $this->db->query(" SELECT * FROM item_bundling WHERE id_item_bundling = $item ")->result_array() ?>
	    <?php $bundling_detail = $this->db->query(" SELECT * FROM item_bundling_detail AS ibd JOIN item_bundling AS ib ON ibd.id_item_bundling = ib.id_item_bundling JOIN item_nonbundling AS inb ON ibd.id_item_nonbundling = inb.id_item_nonbundling WHERE ibd.id_item_bundling = $item ")->result_array() ?>
	    <?php foreach ($bundling as $row) : ?>
      <tr>
        <td>
          <?= $row['item_bundling_name']; ?> <br> detail : <br>
          <ul>
            <?php foreach ($bundling_detail as $bd) : ?>
              <li>
                <?= $bd['item_nonbundling_name']; ?>
              </li>
            <?php endforeach; ?>
          </ul>
        </td>
        <td>

	      <ul style="margin-top: 45px;list-style-type: none;">
	        <?php foreach ($bundling_detail as $bd) : ?>
	          <li>
	            <?= $bd['item_nonbundling_code']; ?>
	          </li>
	        <?php endforeach; ?>
	      </ul>
	    </td>

	    <td>

	      <ul style="margin-top: 45px;list-style-type: none;">
	        <?php foreach ($bundling_detail as $bd) : ?>
	          <li>
	            ?
	          </li>
	        <?php endforeach; ?>
	      </ul>
	    </td>

	    <td>

	      <ul style="margin-top: 45px;list-style-type: none;">
	        <?php foreach ($bundling_detail as $bd) : ?>
	          <li>
	            <?= $bd['item_qty']; ?>
	          </li>
	        <?php endforeach; ?>
	      </ul>
	    </td>
	    <td>

	      <ul style="margin-top: 45px;list-style-type: none;">
	        <?php foreach ($bundling_detail as $bd) : ?>
	          <li>
	            <?= $bd['weight']; ?>
	          </li>
	        <?php endforeach; ?>
	      </ul>
	    </td>
      </tr>
  <?php endforeach; ?>
    </table>
  </center>
</body></html>