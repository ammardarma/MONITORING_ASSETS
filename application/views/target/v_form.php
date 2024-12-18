<div><h5 class="fw-bold"><i class="fa fa-bullseye-arrow"></i> Target</h5></div>

<?php if(!empty($data)): ?>
    <form id='formEditData' method="post" action="<?= base_url() ?>Target/actEditData" class="was-validated">
<?php else: ?>
    <form id='formAddData' method="post" action="<?= base_url() ?>Target/actAddData" class="was-validated">
<?php endif; ?>
<div class="card mt-4">
    <div class="card-body">
        <div class="row text-start">
            <h6 class="card-title fw-bold"><i class="fa fa-pen"></i> &nbsp;<?=$title?></h6>  
        </div>
        <hr class="hr hr-blurry mb-4"/>
        <input type="hidden" name="id" value="<?=!empty($data) ? $data->ID : ''?>"/>
        <div class="col-md-12 mb-4">
            <select name="tahun" data-mdb-select-init class="tahun" required <?=!empty($data) ? 'disabled' : '' ?>> 
                <?php for($i = 0; $i < 10; $i++): ?>
                    <option value="202<?=$i?>" <?=!empty($data) ? ($data->TAHUN == "202".$i ? 'selected' : '') : ''?>>202<?=$i?></option>
                <?php endfor; ?>
            </select>
            <label class="form-label select-label">Tahun</label>
        </div>
        <div class="col-md-12 mb-4">
            <select name="periode" data-mdb-select-init class="periode" required <?=!empty($data) ? 'disabled' : '' ?>>
                <option value="1" <?=!empty($data) ? ($data->PERIODE == 1 ? 'selected' : '') : ''?>>1</option>
                <option value="2" <?=!empty($data) ? ($data->PERIODE == 2 ? 'selected' : '') : ''?>>2</option>
            </select>
            <label class="form-label select-label">Periode</label>
        </div>
        <div class="col-md-12 mb-4">
            <select name="tipe" data-mdb-select-init class="tipe" required <?=!empty($data) ? 'disabled' : '' ?>>
                <option value="AR" <?=!empty($data) ? ($data->TIPE == 'AR' ? 'selected' : '') : ''?>>AR</option>
                <option value="KM" <?=!empty($data) ? ($data->TIPE == 'KM' ? 'selected' : '') : ''?>>KM</option>
                <option value="MTBF" <?=!empty($data) ? ($data->TIPE == 'MTBF' ? 'selected' : '') : ''?>>MTBF</option>
                <option value="FREKUENSI PENGGUNA" <?=!empty($data) ? ($data->TIPE == 'FREKUENSI PENGGUNA' ? 'selected' : '') : ''?>>FREKUENSI PENGGUNA</option>
                <option value="FREKUENSI PERBAIKAN" <?=!empty($data) ? ($data->TIPE == 'FREKUENSI PERBAIKAN' ? 'selected' : '') : ''?>>FREKUENSI PERBAIKAN</option>
                <option value="TINGKAT KEPUASAN" <?=!empty($data) ? ($data->TIPE == 'TINGKAT KEPUASAN' ? 'selected' : '') : ''?>>TINGKAT KEPUASAN</option>
            </select>
            <label class="form-label select-label">Tipe</label>
        </div>
        <div class="col-md-12 mb-4">
            <div class="form-outline" data-mdb-input-init>
                <input type="number" class="form-control" name="target" value="<?=!empty($data) ? ($data->TIPE != 'FREKUENSI PERBAIKAN' ? $data->TARGET * 100 : $data->TARGET) : ''?>" style="width:100%" required/>
                <label for="" class="form-label">Target</label>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <a href="<?=base_url()?>Target" class="btn btn-secondary" data-mdb-ripple-init data-mdb-dismiss="modal">Close</a>
        <button type="submit" class="btn btn-success">Submit</button>
    </div>
</div>
</form>

<script type="text/javascript">
$(document).ready(function() {
   

});
</script>