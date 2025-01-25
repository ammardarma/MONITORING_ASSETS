<div class="row justify-content-end">
    <div class="col-md-3">
        <select data-mdb-select-init class="tahun">
            <?php for($i = 0; $i < 10; $i++): ?>
                <option value="202<?=$i?>" <?=(("202".$i) == $tahun) ? 'selected': ''?>>202<?=$i?></option>
            <?php endfor; ?>
        </select>
        <label class="form-label select-label">Filter Year</label>
    </div>
</div>

<p><strong><i class="fa fa-desktop"></i> Personal Computer</p></strong>
<div class="row">
   <div class="col-md-2 align-self-stretch mb-2">
        <div class="card shadow-5-strong rounded-8 h-100 wave wave-danger">
            <div class="card-body h-100 py-2">
                <div class="d-flex justify-content-between text-primary">
                    <small><b>Total Users</b></small>
                    <div><b><i class="fa fa-user"></i></b></div>
                </div>
                <div class="row h-100 text-center align-content-center">
                    <p class="text-dark fw-bold" style="font-size: 2.5rem;"><?=$dataUser[0]->USER_PC ?: '0'?></p>
                </div>
            </div>
        </div>
   </div>
   <div class="col-md-5 mb-2">
        <div class="card shadow-5-strong rounded-8 wave wave-primary">
            <div class="card-body py-2">
                <div class="d-flex justify-content-between text-purple mb-1">
                    <small><b>Availability Rate</b></small>
                    <div><b><i class="fa fa-percentage"></i></b></div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card shadow-2-strong rounded-8">
                            <div class="card-body py-1">
                                <div><b><i class="fa fa-bullseye-arrow text-primary"></i></b></div>
                                <div class="text-center">
                                    <h2 class="fw-bold"><?=round($dataPC[0]->TARGET_AR,2)?>%</h2>
                                    <hr class="hr hr-blurry m-0"/>
                                    <small><b>Target</b></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card shadow-2-strong rounded-8">
                            <div class="card-body py-1">
                                <div><b><i class="fa fa-medal text-primary"></i></b></div>
                                <div class="text-center">
                                    <?=$myClass->formatText($dataPC[0]->TARGET_AR, $dataPC[0]->PC_AR)?>
                                    <hr class="hr hr-blurry m-0"/>
                                    <small><b>Achievement</b></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </div>
   <div class="col-md-5 mb-2">
        <div class="card shadow-5-strong rounded-8 wave wave-success">
            <div class="card-body py-2">
                <div class="d-flex justify-content-between text-teal mb-1">
                    <small><b>Maintenance Success</b></small>
                    <div><b><i class="fa fa-percentage"></i></b></div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card shadow-2-strong rounded-8">
                            <div class="card-body py-1">
                                <div><b><i class="fa fa-bullseye-arrow text-primary"></i></b></div>
                                <div class="text-center">
                                    <h2 class="fw-bold"><?=round($dataPC[0]->TARGET_KM)?>%</h2>
                                    <hr class="hr hr-blurry m-0"/>
                                    <small><b>Target</b></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card shadow-2-strong rounded-8">
                            <div class="card-body py-1">
                                <div><b><i class="fa fa-medal text-primary"></i></b></div>
                                <div class="text-center">
                                    <?=$myClass->formatText($dataPC[0]->TARGET_KM, $dataPC[0]->PC_KM)?>
                                    <hr class="hr hr-blurry m-0"/>
                                    <small><b>Achievement</b></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </div>
</div>

<p><strong><i class="fa fa-laptop"></i> Laptop</p></strong>
<div class="row">
   <div class="col-md-2 align-self-stretch mb-2">
        <div class="card shadow-5-strong rounded-8 h-100 wave wave-info">
            <div class="card-body h-100 py-2">
                <div class="d-flex justify-content-between text-primary">
                    <small><b>Total Users</b></small>
                    <div><b><i class="fa fa-user"></i></b></div>
                </div>
                <div class="row h-100 text-center align-content-center">
                    <p class="text-dark fw-bold" style="font-size: 2.5rem;"><?=$dataUser[0]->USER_NB ?: '0'?></p>
                </div>
            </div>
        </div>
   </div>
   <div class="col-md-5 mb-2">
        <div class="card shadow-5-strong rounded-8 wave wave-primary">
            <div class="card-body py-2">
                <div class="d-flex justify-content-between mb-1 text-purple">
                    <small><b>Availability Rate</b></small>
                    <div><b><i class="fa fa-percentage"></i></b></div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card shadow-2-strong rounded-8">
                            <div class="card-body py-1">
                                <div><b><i class="fa fa-bullseye-arrow text-primary"></i></b></div>
                                <div class="text-center">
                                    <h2 class="fw-bold"><?=round($dataNB[0]->TARGET_AR,2)?>%</h2>
                                    <hr class="hr hr-blurry m-0"/>
                                    <small><b>Target</b></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card shadow-2-strong rounded-8">
                            <div class="card-body py-1">
                                <div><b><i class="fa fa-medal text-primary"></i></b></div>
                                <div class="text-center">
                                    <?=$myClass->formatText($dataNB[0]->TARGET_AR, $dataNB[0]->NB_AR)?>
                                    <hr class="hr hr-blurry m-0"/>
                                    <small><b>Achievement</b></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </div>
   <div class="col-md-5 mb-2">
        <div class="card shadow-5-strong rounded-8 wave wave-success">
            <div class="card-body py-2">
                <div class="d-flex justify-content-between mb-1 text-teal">
                    <small><b>Maintenance Success</b></small>
                    <div><b><i class="fa fa-percentage"></i></b></div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card shadow-2-strong rounded-8">
                            <div class="card-body py-1">
                                <div><b><i class="fa fa-bullseye-arrow text-primary"></i></b></div>
                                <div class="text-center">
                                    <h2 class="fw-bold"><?=round($dataNB[0]->TARGET_KM,2)?>%</h2>
                                    <hr class="hr hr-blurry m-0"/>
                                    <small><b>Target</b></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card shadow-2-strong rounded-8">
                            <div class="card-body py-1">
                                <div><b><i class="fa fa-medal text-primary"></i></b></div>
                                <div class="text-center">
                                    <?=$myClass->formatText($dataNB[0]->TARGET_KM, $dataNB[0]->NB_KM)?>
                                    <hr class="hr hr-blurry m-0"/>
                                    <small><b>Achievement</b></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </div>
</div>

<div class="row mb-5">
    <p class="fw-bold mb-2 text-dark"><i class="fa fa-print"></i>&nbsp;&nbsp; Printers</p>
    <div class="col-md-4 mb-2">
        <div class="rounded-5 p-2">
            <div class="card h-100 shadow-5-strong rounded-8 wave wave-dark">
                <div class="card-body py-2">
                    <div class="d-flex justify-content-between mb-1 text-primary">
                        <p><b>User Frequency</b></p>
                        <div><b><i class="fa fa-percentage"></i></b></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 position-relative text-center">
                            <h2 class="fw-bold"><?=round($dataPrinter[0]->TARGET_FPG,2)?>%</h2>
                            <h6 class="text-dark">Target</h6>
                            <div class="vr vr-blurry position-absolute my-0 h-100 d-none d-md-block top-0 end-0"></div>
                        </div>
                        <div class="col-md-6 position-relative text-center">
                            <?=$myClass->formatText($dataPrinter[0]->TARGET_FPG, $dataPrinter[0]->PR_FPG)?> 
                            <h6 class="text-dark">Achievement</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-2">
        <div class="rounded-5 p-2">
            <div class="card h-100 shadow-5-strong rounded-8 wave wave-success">
                <div class="card-body py-2">
                    <div class="d-flex justify-content-between text-purple">
                        <p><b>Repair Frequency</b></p>
                        <h5><b>x&#772;</b></h5>
                    </div>
                    <div class="row">
                        <div class="col-md-6 position-relative text-center">
                            <h2 class="fw-bold"><?=round($dataPrinter[0]->TARGET_FPB,2)?></h2>
                            <h6 class="text-dark">Target</h6>
                            <div class="vr vr-blurry position-absolute my-0 h-100 d-none d-md-block top-0 end-0"></div>
                        </div>
                        <div class="col-md-6 position-relative text-center">
                            <?=$myClass->formatText($dataPrinter[0]->TARGET_FPB, $dataPrinter[0]->PR_FPB)?> 
                            <h6 class="text-dark">Achievement</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-2">
        <div class="rounded-5 p-2">
            <div class="card h-100 shadow-5-strong rounded-8 wave wave-info">
                <div class="card-body py-2">
                    <div class="d-flex justify-content-between text-teal">
                        <p><b>Users Sactifaction</b></p>
                        <div><b><i class="fa fa-percentage"></i></b></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 position-relative text-center">
                            <h2 class="fw-bold"><?=round($dataPrinter[0]->TARGET_TK,2)?></h2>
                            <h6 class="text-dark">Target</h6>
                            <div class="vr vr-blurry position-absolute my-0 h-100 d-none d-md-block top-0 end-0"></div>
                        </div>
                        <div class="col-md-6 position-relative text-center">
                            <?=$myClass->formatText($dataPrinter[0]->TARGET_TK, $dataPrinter[0]->PR_TK)?>
                            <h6 class="text-dark">Achievement</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $('.tahun').on('change', function() {
        window.location.href="<?=base_url()?>Home?tahun="+$('.tahun').val();
    });
});
</script>