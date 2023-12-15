<div class="container-fluid" style="margin-top: -200px; padding: 300px">
    <div class="card mb-5">    
        <div class="card-header">
            Form Rental Mobil
        </div>

        <div class="card-body">
        <form action="<?= base_url('user/sewa/simpan_sewa')?>" method="post">
        <?php foreach ($mobil as $mb) : ?>
            <div class="form-group">
                <label for="mobil">Nama Mobil</label>
                <input type="hidden" name="id_user" value="<?= $user['id_user']?>">
                <input type="hidden" name="id_mobil" value="<?= $mb->id_mobil?>">
                <input type="text" name="mobil" class="form-control" value="<?=$mb->nama_mobil?>" readonly>
            </div>
            <div class="form-group">
                <label for="harga">Harga Sewa/Hari</label>                
                <input type="text" name="tarif" class="form-control" value="<?= rupiah($mb->tarif)?>" readonly>
            </div>
            <div class="form-group">
                <label for="harga">Denda/Hari</label>
                <input type="text" name="denda" class="form-control" value="<?= rupiah($mb->tarif)?>" readonly>
            </div>

            <div class="form-group">
                <label for="tanggal_sewa">Tanggal Sewa</label>
                <input type="date" name="tanggal_sewa" id="tgl_sewa" class="form-control">
            </div>

            <div class="form-group">
                <label for="tanggal_kembali">Tanggal Kembali</label>
                <input type="date" name="tanggal_kembali" id="tgl_kembali" class="form-control">
            </div>

            <div class="form-group">
                <label for="lama_sewa">Lama Sewa</label>
                <input type="number" name="lama_sewa" class="form-control" id="lama_sewa" readonly>
            </div>
            <button type="submit" class="btn btn-danger">Rental</button>

        </form>
        <?php endforeach;?>
        <script>            
            document.getElementById("tgl_sewa").addEventListener("change", dateDiff);
            document.getElementById("tgl_kembali").addEventListener("change", dateDiff);
           
            
            function dateDiff(){
                const startDate = new Date(document.getElementById('tgl_sewa').value);
                const endDate = new Date(document.getElementById('tgl_kembali').value);

                startDate.setHours(0, 0, 0, 0);
                endDate.setHours(0, 0, 0, 0);

                const oneDay = 24 * 60 * 60 * 1000;
                const diff = Math.abs(startDate - endDate);
                const day = Math.round(diff / oneDay);

                document.getElementById('lama_sewa').value = day;
            }

        </script>
        </div>
    </div>
</div>