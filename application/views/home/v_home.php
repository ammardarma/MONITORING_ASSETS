<p><strong><i class="fa fa-desktop"></i> Personal Computer</p></strong>
<div class="row mb-5">
   <div class="col-md-2 align-self-stretch">
        <div class="card shadow-5-strong rounded-8 h-100 wave wave-danger">
            <div class="card-body h-100">
                <div class="d-flex justify-content-between mb-3 text-primary">
                    <small><b>Total Users</b></small>
                    <div><b><i class="fa fa-user"></i></b></div>
                </div>
                <div class="row h-100 text-center align-content-center pb-4">
                    <p class="text-dark fw-bold" style="font-size: 3.5rem;"><?=$dataUser[0]->USER_PC?></p>
                </div>
            </div>
        </div>
   </div>
   <div class="col-md-5">
        <div class="card shadow-5-strong rounded-8 wave wave-primary">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3 text-purple">
                    <small><b>Availability Rate</b></small>
                    <div><b><i class="fa fa-percentage"></i></b></div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card shadow-2-strong rounded-8">
                            <div class="card-body pt-3 pb-3">
                                <div><b><i class="fa fa-bullseye-arrow text-primary"></i></b></div>
                                <div class="text-center">
                                    <h1 class="fw-bold"><?=round($dataPC[0]->TARGET_AR,2)?>%</h1>
                                    <hr class="hr hr-blurry"/>
                                    <small><b>Target</b></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card shadow-2-strong rounded-8">
                            <div class="card-body pt-3 pb-3">
                                <div><b><i class="fa fa-medal text-primary"></i></b></div>
                                <div class="text-center">
                                    <?=$myClass->formatText($dataPC[0]->TARGET_AR, $dataPC[0]->PC_AR)?>
                                    <hr class="hr hr-blurry"/>
                                    <small><b>Achievement</b></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </div>
   <div class="col-md-5">
        <div class="card shadow-5-strong rounded-8 wave wave-success">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3 text-teal">
                    <small><b>Maintenance Success</b></small>
                    <div><b><i class="fa fa-percentage"></i></b></div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card shadow-2-strong rounded-8">
                            <div class="card-body pt-3 pb-3">
                                <div><b><i class="fa fa-bullseye-arrow text-primary"></i></b></div>
                                <div class="text-center">
                                    <h1 class="fw-bold"><?=round($dataPC[0]->TARGET_KM)?>%</h1>
                                    <hr class="hr hr-blurry"/>
                                    <small><b>Target</b></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card shadow-2-strong rounded-8">
                            <div class="card-body pt-3 pb-3">
                                <div><b><i class="fa fa-medal text-primary"></i></b></div>
                                <div class="text-center">
                                    <?=$myClass->formatText($dataPC[0]->TARGET_KM, $dataPC[0]->PC_KM)?>
                                    <hr class="hr hr-blurry"/>
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
<div class="row mb-5">
   <div class="col-md-2 align-self-stretch">
        <div class="card shadow-5-strong rounded-8 h-100 wave wave-info">
            <div class="card-body h-100">
                <div class="d-flex justify-content-between mb-3 text-primary">
                    <small><b>Total Users</b></small>
                    <div><b><i class="fa fa-user"></i></b></div>
                </div>
                <div class="row h-100 text-center align-content-center pb-4">
                    <p class="text-dark fw-bold" style="font-size: 3.5rem;"><?=$dataUser[0]->USER_NB?></p>
                </div>
            </div>
        </div>
   </div>
   <div class="col-md-5">
        <div class="card shadow-5-strong rounded-8 wave wave-primary">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3 text-purple">
                    <small><b>Availability Rate</b></small>
                    <div><b><i class="fa fa-percentage"></i></b></div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card shadow-2-strong rounded-8">
                            <div class="card-body pt-3 pb-3">
                                <div><b><i class="fa fa-bullseye-arrow text-primary"></i></b></div>
                                <div class="text-center">
                                    <h1 class="fw-bold"><?=round($dataNB[0]->TARGET_AR,2)?>%</h1>
                                    <hr class="hr hr-blurry"/>
                                    <small><b>Target</b></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card shadow-2-strong rounded-8">
                            <div class="card-body pt-3 pb-3">
                                <div><b><i class="fa fa-medal text-primary"></i></b></div>
                                <div class="text-center">
                                    <?=$myClass->formatText($dataNB[0]->TARGET_AR, $dataNB[0]->NB_AR)?>
                                    <hr class="hr hr-blurry"/>
                                    <small><b>Achievement</b></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </div>
   <div class="col-md-5">
        <div class="card shadow-5-strong rounded-8 wave wave-success">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3 text-teal">
                    <small><b>Maintenance Success</b></small>
                    <div><b><i class="fa fa-percentage"></i></b></div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card shadow-2-strong rounded-8">
                            <div class="card-body pt-3 pb-3">
                                <div><b><i class="fa fa-bullseye-arrow text-primary"></i></b></div>
                                <div class="text-center">
                                    <h1 class="fw-bold"><?=round($dataNB[0]->TARGET_KM,2)?>%</h1>
                                    <hr class="hr hr-blurry"/>
                                    <small><b>Target</b></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card shadow-2-strong rounded-8">
                            <div class="card-body pt-3 pb-3">
                                <div><b><i class="fa fa-medal text-primary"></i></b></div>
                                <div class="text-center">
                                    <?=$myClass->formatText($dataNB[0]->TARGET_KM, $dataNB[0]->NB_KM)?>
                                    <hr class="hr hr-blurry"/>
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
    <div class="col-md-4">
        <div class="rounded-5 p-2">
            <div class="card h-100 shadow-5-strong rounded-8 wave wave-dark">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3 text-primary">
                        <p><b>User Frequency</b></p>
                        <div><b><i class="fa fa-percentage"></i></b></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 position-relative text-center">
                            <h1 class="fw-bold"><?=round($dataPrinter[0]->TARGET_FPG,2)?>%</h1>
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
    <div class="col-md-4">
        <div class="rounded-5 p-2">
            <div class="card h-100 shadow-5-strong rounded-8 wave wave-warning">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3 text-purple">
                        <p><b>Repair Frequency</b></p>
                        <h5><b>x&#772;</b></h5>
                    </div>
                    <div class="row">
                        <div class="col-md-6 position-relative text-center">
                            <h1 class="fw-bold"><?=round($dataPrinter[0]->TARGET_FPB,2)?></h1>
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
    <div class="col-md-4">
        <div class="rounded-5 p-2">
            <div class="card h-100 shadow-5-strong rounded-8 wave wave-info">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3 text-teal">
                        <p><b>Users Sactifaction</b></p>
                        <div><b><i class="fa fa-percentage"></i></b></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 position-relative text-center">
                            <h1 class="fw-bold"><?=round($dataPrinter[0]->TARGET_TK,2)?></h1>
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