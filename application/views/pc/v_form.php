<div><h5 class="fw-bold"><i class="fa fa-desktop"></i> Personal Computer</h5></div>

<?php if(!empty($data)): ?>
    <form id='formEditData' method="post" action="<?= base_url() ?>PC/actEditData" class="was-validated">
<?php else: ?>
    <form id='formAddData' method="post" action="<?= base_url() ?>PC/actAddData" class="was-validated">
<?php endif; ?>
<div class="card mt-4">
    <div class="card-header">
        <h6 class="card-title fw-bold"><i class="fa fa-pen"></i> &nbsp;<?=$title?></h6>
    </div>
    <div class="card-body">
        <input type="hidden" name="id" value="<?=!empty($data) ? $data->ID : ''?>"/>
        <input type="hidden" name="tipe" value="<?=$tipe?>"/>
        <div class="col-md-12 mb-4">
            <div class="form-outline" data-mdb-input-init>
                <input type="text" class="form-control" name="nama_user" style="width:100%" value="<?=!empty($data) ? $data->NAMA_USER : ''?>" required/>
                <label for="nama_lembaga" class="form-label">Nama User</label>
            </div>
        </div>
        <div class="col-md-12 mb-4">
            <div class="form-outline" data-mdb-input-init>
                <input type="text" class="form-control" name="nama_perangkat" style="width:100%" value="<?=!empty($data) ? $data->NAMA_PERANGKAT : ''?>" required/>
                <label for="nama_lembaga" class="form-label">Nama Perangkat</label>
            </div>
        </div>
        <div class="col-md-12 mb-4">
            <select name="tahun" data-mdb-select-init class="tahun" required>
                <?php for($i = 0; $i < 10; $i++): ?>
                    <option value="202<?=$i?>" <?=!empty($data) ? ($data->TAHUN == "202".$i ? 'selected' : '') : ''?>>202<?=$i?></option>
                <?php endfor; ?>
            </select>
            <label class="form-label select-label">Tahun</label>
        </div>
        <div class="col-md-12 mb-4">
            <select name="periode" data-mdb-select-init class="periode" required>
                <option value="1" <?=!empty($data) ? ($data->PERIODE == 1 ? 'selected' : '') : ''?>>1</option>
                <option value="1" <?=!empty($data) ? ($data->PERIODE == 2 ? 'selected' : '') : ''?>>2</option>
            </select>
            <label class="form-label select-label">Periode</label>
        </div>
        <?php if($tipe == 'AR' && empty($data)): ?>
            <div class="col-md-12 mb-4">
                <select name="kendala[]" data-mdb-select-init class="kendala" multiple required>
                    <option value="1">Update</option>
                    <option value="2">Internet</option>
                    <option value="3">Antivirus</option>
                    <option value="3">Office</option>
                    <option value="4">Server</option>
                    <option value="5">Hardware</option>
                    <option value="5">Driver</option>
                </select>
                <label class="form-label select-label">Kendala</label>
            </div>
        <?php else: ?>
            <div class="col-md-12 mb-4">
            <div class="form-outline" data-mdb-input-init>
                <input type="number" class="form-control" name="pencapaian" value="<?=!empty($data) ? ($tipe != 'MTBF' ? $data->PENCAPAIAN * 100 : $data->PENCAPAIAN) : ''?>" style="width:100%" required/>
                <label for="" class="form-label">Pencapaian</label>
            </div>
        </div>
        <?php endif; ?>
    </div>
    <div class="card-footer">
        <a href="<?=base_url()?>PC/viewList?tipe=<?=$tipe?>" class="btn btn-secondary" data-mdb-ripple-init data-mdb-dismiss="modal">Close</a>
        <button type="submit" class="btn btn-success">Submit</button>
    </div>
</div>
</form>

<script type="text/javascript">
$(document).ready(function() {
   

});
</script>