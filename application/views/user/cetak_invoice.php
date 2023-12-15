<table style="width: 60%">

    <h2>Invoice Pembayaran Anda</h2>
            <?php foreach ($transaksi as $tr) : ?>

                <tr>
                    <td>Nama Customer</td>
                    <td>:</td>
                    <td><?= $tr->nama ?></td>
                </tr>

                <tr>
                    <td>Nama Mobil</td>
                    <td>:</td>
                    <td><?= $tr->nama_mobil ?></td>
                </tr>
                
                <tr>
                    <td>Tanggal Sewa</td>
                    <td>:</td>
                    <td> <?= date('d/m/Y',strtotime($tr->tanggal_sewa)) ?></td>
                </tr>

                <tr>
                    <td>Tanggal Kembali</td>
                    <td>:</td>
                    <td><?= date('d/m/Y',strtotime($tr->tanggal_kembali)); ?></td>
                </tr>

                <tr>
                    <td>Biaya Sewa/Hari</td>
                    <td>:</td>
                    <td><?= rupiah($tr->tarif) ?></td>
                </tr>

                <tr>
                    <td>Lama Sewa</td>
                    <td>:</td>
                    <td><?= $tr->lama_sewa ?> Hari</td>
                </tr>

                <tr style="font-weight: bold; color: red">
                    <td>Jumlah Pembayaran</td>
                    <td>:</td>
                    <td><?= rupiah( $tr->tarif * $tr->lama_sewa) ?></td>
                </tr>
                
                <tr>
                    <td>Status Pembayaraan</td>
                    <td>:</td>
                    <td><?= $tr->status_byr?></td>
                </tr>
    
                <tr>
                    <td>Rekening Pembayaran</td>
                    <td>:</td>
                    <td><?= $tr->bank ?></td>
                </tr>

            <?php endforeach ; ?>
                </table>

<script type="text/javascript">
    window.print();
</script>