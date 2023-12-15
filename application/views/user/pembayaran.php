<div class="container mt-2 mb-5">
    <div class="row">
        <div class="col-md-8">
            <div class="card" style="margin-top: 150px;">
                <div class="card-header alert alert-success">
                    Invoice Pembayaran Anda
                </div>

    <div class="card-body">
                <table class="table">
            <?php foreach ($transaksi as $tr) : ?>

                <tr>
                    <th>Nama Mobil</th>
                    <td>:</td>
                    <td><?= $tr->nama_mobil ?></td>
                </tr>

                <tr>
                    <th>Tanggal Rental</th>
                    <td>:</td>
                    <td> <?= date('d/m/Y',strtotime($tr->tanggal_sewa)) ?></td>
                </tr>

                <tr>
                    <th>Tanggal Kembali</th>
                    <td>:</td>
                    <td><?= date('d/m/Y',strtotime($tr->tanggal_kembali)); ?></td>
                </tr>

                <tr>
                    <th>Biaya Sewa/Hari</th>
                    <td>:</td>
                    <td><?= rupiah($tr->tarif) ?></td>
                </tr>
                <tr>
                    <th>Lama Sewa</th>
                    <td>:</td>
                    <td><?= $tr->lama_sewa ?> Hari</td>
                </tr>

                
                <tr class="text-success">
                    <th>Jumlah Pembayaran</th>
                    <td>:</td>
                    <td><button class="btn btn-sm btn-success"><?= rupiah($tr->tarif*$tr->lama_sewa)?></button></td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td><a href="<?= base_url('user/transaksi/cetak_invoice/'.$tr->id_transaksi) ?>" class="btn btn-sm btn-secondary">Print Invoice</a></td>
                </tr>


            <?php endforeach ; ?>
                </table>
            </div>
            
            </div>
        </div>
        <div class="col-md-4" style="margin-top: 150px;">
        <div class="card">
            <div class="card-header alert alert-primary">
                Informasi Pembayaran
            </div>

            <div class="card-body">
                <p class="text-success mb-3">Silahkan Melakukan Pembayaran Melalui No Rekening di bawah Ini</p>

            <ul class="list-group list-group-flush">
            <li class="list-group-item"><i class="fas fa-credit-card" style="color:navy;"></i><b> BRI: 087 908 098 1 | a/n CV Moral</b></li>
            <li class="list-group-item"><i class="fas fa-credit-card" style="color:blue;"></i><b> BCA: 890 879 731 2 | a/n CV Moral</b></li>
            <li class="list-group-item"><i class="fas fa-credit-card" style="color:#ff6600;"></i><b> BNI: 789 891 091 3 | a/n CV Moral</b></li>
            </ul>

            <?php 
            
            if(empty($tr->bukti_pembayaran)) { ?>
            <!-- Button trigger modal -->
            <button style="width:100%" type="button" class="btn btn-sm btn-danger mt-3" data-toggle="modal" data-target="#exampleModal">Upload Bukti Pembayaran</button>
            <?php } elseif($tr->status_pembayaran == '0'){ ?>
            <button style="width: 100%" class="btn btn-sm btn-warning"><i class="fa fa-clock-o"></i> Menunggu Konfirmasi</button>
            <?php }elseif($tr->status_pembayaran == '1'){ ?>
            <button style="width: 100%" class="btn btn-sm btn-success"><i class="fa fa-check"></i> Pembayaran selesai</button>
            <?php } ?>

            </div>
        </div>
    </div>
</div>
</div>

<!-- Modal untuk upload bukti pembayaran -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Bukti Pembayaraan Anda</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form action="<?= base_url('user/transaksi/pembayaran_aksi') ?>" enctype="multipart/form-data" method="post">
      <div class="modal-body">
        <div class="form-group">
        <label>Pilih Bank</label>
        <select name="bank" class="form-control mb-2">
				<option value="">--Pilih Bank--</option>
				<option value="BRI">BRI</option>
				<option value="BCA">BCA</option>
				<option value="BNI">BNI</option>
		</select>
        <label>Upload Bukti Pembayaran</label>
        <input type="hidden" name="id_transaksi" class="form-control" value="<?= $tr->id_transaksi ?>">
        <input type="hidden" name="total_byr" class="form-control" value="<?= $tr->tarif*$tr->lama_sewa ?>">
        <input type="file" name="bukti_pembayaran" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-sm btn-success">Kirim</button>
      </div>
      </form>
    </div>
  </div>
</div> 