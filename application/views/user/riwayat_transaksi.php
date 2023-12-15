<div class="container" style="margin-top: 20px; margin-bottom: 200px">
    <div class="card mx-auto" style="margin-top: 100px; width: 80%;">
        <div class="card-header">
            Data Transaksi Anda
        </div>
        <span class="mt-2 p2"><?= $this->session->flashdata('pesan') ?></span>
        <div class="card-body">
            <table class="table table-bordered table-striperd">
                <tr>
                    <th>No</th>
                    <th>Nomor Transaksi</th>
                    <th>Mobil</th>
                    <th>No Plat</th>
                    <th>Tarif/Hari</th>
                    <th>Lama Sewa</th>
                    <th>Total Bayar</th>
                    <th>Action</th>
                </tr>

            <?php $no=1; foreach($transaksi as $tr) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= "3271023".$tr->id_transaksi ?></td>
                    <td><?= $tr->nama_mobil ?></td>
                    <td><?= $tr->no_plat ?></td>
                    <td><?= rupiah($tr->tarif)  ?></td>
                    <td><?= $tr->lama_sewa ?></td>
                    <td><?= rupiah($tr->tarif*$tr->lama_sewa) ?></td>
                    <td>
                    <?php if($tr->isi_testimoni == 0):?>
                        <a href="<?= base_url('user/testimoni/v_testimoni/'.$tr->id_transaksi) ?>" class="btn btn-sm btn-primary">Testimoni</a>                       
                    <?php endif;?>
                    </td>
                </tr>
        <?php endforeach ; ?>
            </table>
        </div>
    </div>
</div>