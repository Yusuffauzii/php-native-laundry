<?php
include '../database.php';
$db = new database();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="body">
            	<link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
				<div class="head">
					<h2>laporan transaksi Planner O Wedding</h2>
					<h2></h2>
					<p style="font-weight: normal;text-transform: capitalize;">No Telepon : (025) XXX-XXX-XXX Email : <span style="text-transform: none;">koperasi-kowi@gmail.com</span> no Handphone : 089-XXX-XXX-XXX</p>
					<p style="font-weight: normal;">========================================================================================================</p>
				</div>
				<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
					<thead>
						<tr>
                        <th>No</th>
                <th>ID Transaksi</th>
                <th>Nama Pelanggan</th>
                <th>Paket</th>
                <th>Nama Kasir</th>
                <th>Tanggal</th>
                <th>Harga</th>
                <th>KG</th>
                <th>Total</th>
                <?php
                $no = 1;
                foreach ($db->tampil_data_tran() as $x){
                ?>
                <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $x['id_transaksi']; ?></td>
                <td><?php echo $x['nm_pel']; ?></td>
                <td><?php echo $x['nm_paket']; ?></td>
                <td><?php echo $x['nm_user']; ?></td>
                <td><?php echo $x['tgl_transaksi']; ?></td>
                <td><?php echo $x['harga']; ?></td>
                <td><?php echo $x['jml_kilo']; ?></td>
                <td>Rp.<?php echo $x['total']; ?></td>
            </td>
            </tr>
            <?php } ?>
            <tr>
							<td colspan="8" style="text-align: center;font-weight: bold;">Total seluruh transaksi</td>
							<td>Rp. <?php $db->hitung(); ;?></td>
						</tr>
				</table>
				<i><?php echo "Periode, " . date("Y-m-d") . "<br>"; ?></i>
				<div class="row clearfix">
					<div class="ttd">
						<p><?php echo "Cianjur, " . date("Y-m-d") . "<br>"; ?> </p>
						<p>Mengetahui</p>
						<p>Pimpinan</p>
						<br><br><br>
						<p style="font-weight: bold;">Yusuf Ahmad Fauzi</p>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>
<script src="../../assets/plugins/bootstrap/js/bootstrap.js"></script>
<!-- Bootstrap Core Css -->
<link href="../../assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
<style type="text/css">
	.head{
		text-align: center;
		text-transform: uppercase;
		font-weight: bold;
		margin:20px 0;
	}
	h2,h3,p{
		margin: 0;
		padding: 0;
	}
	.ttd{
		float: right;
		margin: 20px;
	}
</style>			
   
        <script>
		window.print();
	    </script>
</body>
</html>