<div><h5 class="fw-bold"><i class="fa fa-print"></i> Printer</h5></div>

<?php if(!empty($data)): ?>
    <form id='formEditData' method="post" action="<?= base_url() ?>Printer/actEditData" class="was-validated">
<?php else: ?>
    <form id='formAddData' method="post" action="<?= base_url() ?>Printer/actAddData" class="was-validated">
<?php endif; ?>
<div class="card mt-4">
    <div class="card-body">
        <div class="row text-start">
            <h6 class="card-title fw-bold"><i class="fa fa-pen"></i> &nbsp;<?=$title?></h6>  
        </div>
        <hr class="hr hr-blurry mb-4"/>
        <input type="hidden" name="id" value="<?=!empty($data) ? $data->ID : ''?>"/>
        <input type="hidden" name="tipe" value="<?=$tipe?>"/>
        <div class="col-md-12 mb-4">
            <div class="form-outline" data-mdb-input-init>
                <input type="text" class="form-control" name="nama_perangkat" style="width:100%" value="<?=!empty($data) ? $data->NAMA_PERANGKAT : ''?>" required/>
                <label for="nama_lembaga" class="form-label">Nama Perangkat</label>
            </div>
        </div>
        <div class="col-md-12 mb-4">
            <select data-mdb-select-init class="tipe" name="tipe">
                <option value="FREKUENSI PENGGUNA" <?=!empty($data) && $data->TIPE == 'FREKUENSI PENGGUNA' ? 'selected' : ''?>>Frekuensi Pengguna</option>
                <option value="FREKUENSI PERBAIKAN" <?=!empty($data) && $data->TIPE == 'FREKUENSI PERBAIKAN' ? 'selected' : ''?>>Frekuensi Perbaikan</option>
                <option value="TINGKAT KEPUASAN" <?=!empty($data) && $data->TIPE == 'TINGKAT KEPUASAN' ? 'selected' : ''?>>Tingkat Kepuasan</option>
            </select>
            <label class="form-label select-label">Tipe</label>
        </div>
        <div class="col-md-12 mb-4">
            <select name="tahun" data-mdb-select-init class="tahun" required>
                <option value="<?=date('Y')?>"><?=date('Y')?></option>
            </select>
            <label class="form-label select-label">Tahun</label>
        </div>
        <div class="col-md-12 mb-4">
            <select name="periode" data-mdb-select-init class="periode" required>
                <option value="1" <?=!empty($data) ? ($data->BULAN == 1 ? 'selected' : '') : ''?>>1</option>
                <option value="2" <?=!empty($data) ? ($data->BULAN == 2 ? 'selected' : '') : ''?>>2</option>
                <option value="3" <?=!empty($data) ? ($data->BULAN == 3 ? 'selected' : '') : ''?>>3</option>
                <option value="4" <?=!empty($data) ? ($data->BULAN == 4 ? 'selected' : '') : ''?>>4</option>
                <option value="5" <?=!empty($data) ? ($data->BULAN == 5 ? 'selected' : '') : ''?>>5</option>
                <option value="6" <?=!empty($data) ? ($data->BULAN == 6 ? 'selected' : '') : ''?>>6</option>
                <option value="7" <?=!empty($data) ? ($data->BULAN == 7 ? 'selected' : '') : ''?>>7</option>
                <option value="8" <?=!empty($data) ? ($data->BULAN == 8 ? 'selected' : '') : ''?>>8</option>
                <option value="9" <?=!empty($data) ? ($data->BULAN == 9 ? 'selected' : '') : ''?>>9</option>
                <option value="10" <?=!empty($data) ? ($data->BULAN == 10 ? 'selected' : '') : ''?>>10</option>
                <option value="11" <?=!empty($data) ? ($data->BULAN == 11 ? 'selected' : '') : ''?>>11</option>
                <option value="12" <?=!empty($data) ? ($data->BULAN == 12 ? 'selected' : '') : ''?>>12</option>
            </select>
            <label class="form-label select-label">Bulan</label>
        </div>
        <div class="col-md-12 mb-4">
            <div class="form-outline" data-mdb-input-init>
                <input type="number" class="form-control" name="pencapaian" value="<?=!empty($data) ? ($tipe != 'FREKUENSI PERBAIKAN' ? $data->PENCAPAIAN * 100 : $data->PENCAPAIAN) : ''?>" style="width:100%" required/>
                <label for="" class="form-label">Pencapaian</label>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <a href="<?=base_url()?>Printer/viewList?tipe=<?=$tipe?>" class="btn btn-secondary" data-mdb-ripple-init data-mdb-dismiss="modal">Close</a>
        <button type="submit" class="btn btn-success">Submit</button>
    </div>
</div>
</form>

<script type="text/javascript">
$(document).ready(function() {
   

});
</script>