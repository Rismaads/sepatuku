<h2>Our Catalogue</h2>
<?= $this->session->flashdata('pesan'); ?>
<center>
  <a href="#tambah" data-toggle="modal" class="btn btn-warning">+Insert</a>
</center>
<table id="example" class="table table-hover table-striped">
  <thead>
    <tr>
      <td>No</td>
      <td>Picture </td>
      <td>Merk</td>
      <td>Releas</td>
      <td>Categori</td>
      <td>Price</td>

      <td>Stock</td>
      <td>Action</td>
    </tr>
  </thead>
  <tbody>
    <?php $no=0; foreach($tampil_sepatu as $sepatu):
    $no++; ?>
    <tr>
      <td><?= $no ?></td>
      <td><img src="<?=base_url('assets/img/'.$sepatu->foto )?>" style="width: 40px"></td>
      <td><?= $sepatu->nama_sepatu ?></td>
      <td><?= $sepatu->tahun ?></td>
      <td><?= $sepatu->nama_kategori ?></td>
      <td><?= $sepatu->harga ?></td>

      <td><?= $sepatu->stok ?></td>
      <td><a href="#edit" onclick="edit('<?= $sepatu->id_sepatu ?>')" data-toggle="modal" class="btn btn-success">Update</a>
        <a href="<?=base_url('index.php/sepatu/hapus/'.$sepatu->id_sepatu)?>" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a></td>
    </tr>
  <?php endforeach ?>
  </tbody>
</table>

<div class="modal fade" id="tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-titile">Insert Shoe</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/sepatu/tambah')?>" method="post" enctype="multipart/form-data">
          <table>
            <tr>
              <td><input type="hidden" name="id_sepatu" class="form-control"></td>
            </tr>
            <tr>
              <td>Merk</td>
              <td><input type="text" name="nama_sepatu" required class="form-control"></td>
            </tr>
            <tr>
              <td>Categori</td>
              <td><select name="id_kategori" class="form-control">
                <option></option>
                <?php foreach($kategori as $kat): ?>
                <option value="<?=$kat->id_kategori?>"><?=$kat->nama_kategori?></option>
                <?php endforeach ?>
              </select></td>
            </tr>
            <tr>
              <td>Year Release</td>
              <td><input type="number" name="tahun" required class="form-control"></td>
            </tr>
            <tr>
              <td>Price</td>
              <td><input type="number" name="harga" required class="form-control"></td>
            </tr>

            <tr>
              <td>Stock</td>
              <td><input type="number" name="stok" required class="form-control"></td>
            </tr>
            <tr>
              <td>Picture</td>
              <td><input type="file" name="foto" class="form-control"></td>
            </tr>
          </table>
          <input type="submit" name="create" value="Submit" class="btn btn-success">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="edit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-titile">Update Item</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/sepatu/sepatu_update')?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_sepatu_lama" id="id_sepatu_lama">
          <table>
            <tr>
              <td><input type="hidden" name="id_sepatu" id="id_sepatu" class="form-control"></td>
            </tr>
            <tr>
              <td>Merk</td>
              <td><input type="text" name="nama_sepatu" id="nama_sepatu" required class="form-control"></td>
            </tr>
            <tr>
              <td>Categori</td>
              <td><select name="id_kategori" class="form-control" id="id_kategori">
                <option></option>
                <?php foreach($kategori as $kat): ?>
                <option value="<?=$kat->id_kategori?>"><?=$kat->nama_kategori?></option>
                <?php endforeach ?>
              </select></td>
            </tr>
            <tr>
              <td>Releas</td>
              <td><input type="number" name="tahun" required id="tahun" class="form-control"></td>
            </tr>
            <tr>
              <td>Price</td>
              <td><input type="number" name="harga" required id="harga" class="form-control"></td>
            </tr>

            <tr>
              <td>Stock</td>
              <td><input type="number" name="stok" required id="stok" class="form-control"></td>
            </tr>
            <tr>
              <td>Picture </td>
              <td><input type="file" name="foto" id="foto" class="form-control"></td>
            </tr>
          </table>
          <input type="submit" name="edit" value="Submit" class="btn btn-success">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  function edit(a){
    $.ajax({
      type:"post",
      url:"<?=base_url()?>index.php/sepatu/edit_sepatu/"+a,
      dataType:"json",
      success:function(data){
        $("#id_sepatu").val(data.id_sepatu);
        $("#nama_sepatu").val(data.nama_sepatu);
        $("#tahun").val(data.tahun);
        $("#id_kategori").val(data.id_kategori);
        $("#harga").val(data.harga);

        $("#stok").val(data.stok);
        $("#id_sepatu_lama").val(data.id_sepatu);
      }
    })
  }
</script>
