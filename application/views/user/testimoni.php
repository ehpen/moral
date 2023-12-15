<div class="container-fluid" style="margin-top: -200px; padding: 300px">
    <div class="card mb-5">    
        <div class="card-header">
            Form Testimoni
        </div>

        <div class="card-body">
        <form action="<?= base_url('user/testimoni/simpan_testimoni')?>" method="post">
            <input type="hidden" name="nama" value="<?= $user['nama']?>">
            <div class="form-group">
                <label for="testimoni">Testimoni</label>                
                <textarea name="testimoni" class="form-control">
                </textarea>
            </div>
            <div class="form-group">
                <label for="harga">Rating</label>
                <select name="rating" class="form-control">
                    <option value="">---Rating Yang Dipilih---</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            
            <button type="submit" class="btn btn-danger">Rental</button>
        </form>
        </div>
    </div>
</div>