<div><h5 class="fw-bold"><i class="fa fa-laptop"></i> Laptop</h5></div>

<div class="row mt-4 mb-4 justify-content-end">
    </div>
    
    <div class="row justify-content-between align-items-center">
        <div class="col-md-3 align-self-stretch mb-2">
            <div class="card shadow-5-strong rounded-8 wave wave-success">
                <div class="card-body">
                    <div class="row">
                        <small class="text-secondary"><small><b>Total Users</b></small></small>
                    </div>
                    <div class="d-flex justify-content-between align-items-start mt-3">
                        <h3 class="text-dark fw-bold"><?=$dataUser[0]->USER_NB ?: '0'?></h3>
                        <div class="btn btn-floating btn-secondary"><b><i class="fa fa-user"></i></b></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <select data-mdb-select-init class="tahun">
                <?php for($i = 0; $i < 10; $i++): ?>
                    <option value="202<?=$i?>" <?=(("202".$i) == $tahun) ? 'selected': ''?>>202<?=$i?></option>
                <?php endfor; ?>
            </select>
            <label class="form-label select-label">Filter Year</label>
        </div>
</div>
<div class="row mb-4">
   <div class="col-md-4 align-self-stretch mb-2">
        <div class="card shadow-5-strong h-100 border-bottom border-primary border-5">
            <div class="card-body pt-3 pb-2">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="text-secondary fw-bold" style="font-size:0.6em;">Deviation Availability Rate</div>
                    <div class="text-primary fw-bold" style="font-size:0.7em;"><i class="fa fa-percentage"></i></div>
                </div>
                    <div class="row align-items-center justify-content-between mt-4">
                        <div class="col-md-6 position-relative text-center mb-2">
                            <?php if(substr($dataSelisih[0]->SELISIH_AR_1, 0, 1) == '-'): ?>
                                <h6 class="text-danger fw-bold"><i class="fa fa-angle-down"></i> &nbsp;&nbsp;<?=round($dataSelisih[0]->SELISIH_AR_1,2) ?: '0'?>%</h6>
                            <?php else : ?>
                                <h6 class="text-success fw-bold"><i class="fa fa-angle-up"></i> &nbsp;&nbsp;<?=round($dataSelisih[0]->SELISIH_AR_1,2) ?: '0'?>%</h6>
                            <?php endif; ?>
                            <div class="text-secondary" style="font-size:12px;">Period 1</div>
                            <div class="vr vr-blurry position-absolute my-0 h-100 d-none d-md-block top-0 end-0"></div>
                        </div>
                        <div class="col-md-6 position-relative text-center mb-2">
                            <?php if(substr($dataSelisih[0]->SELISIH_AR_2, 0, 1) == '-'): ?>
                                <h6 class="text-danger fw-bold"><i class="fa fa-angle-down"></i> &nbsp;&nbsp;<?=round($dataSelisih[0]->SELISIH_AR_2,2) ?: '0'?>%</h6>
                            <?php else : ?>
                                <h6 class="text-success fw-bold"><i class="fa fa-angle-up"></i> &nbsp;&nbsp;<?=round($dataSelisih[0]->SELISIH_AR_2,2) ?: '0'?>%</h6>
                            <?php endif; ?>
                            <div class="text-secondary" style="font-size:12px;">Period 2</div>
                        </div>
                    </div>
            </div>
        </div>
   </div>
   <div class="col-md-4 align-self-stretch mb-2">
        <div class="card shadow-5-strong h-100 border-bottom border-success border-5">
            <div class="card-body pt-3 pb-2">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="text-secondary fw-bold" style="font-size:0.6em;">Deviation Maintenance Success</div>
                    <div class="text-success fw-bold" style="font-size:0.7em;"><i class="fa fa-percentage"></i></div>
                </div>
                    <div class="row align-items-center justify-content-between mt-4">
                        <div class="col-md-6 position-relative text-center mb-2">
                            <?php if(substr($dataSelisih[0]->SELISIH_KM_1, 0, 1) == '-'): ?>
                                <h6 class="text-danger fw-bold"><i class="fa fa-angle-down"></i> &nbsp;&nbsp;<?=round($dataSelisih[0]->SELISIH_KM_1,2) ?: '0'?>%</h6>
                            <?php else : ?>
                                <h6 class="text-success fw-bold"><i class="fa fa-angle-up"></i> &nbsp;&nbsp;<?=round($dataSelisih[0]->SELISIH_KM_1,2) ?: '0'?>%</h6>
                            <?php endif; ?>
                            <div class="text-secondary" style="font-size:12px;">Period 1</div>
                            <div class="vr vr-blurry position-absolute my-0 h-100 d-none d-md-block top-0 end-0"></div>
                        </div>
                        <div class="col-md-6 position-relative text-center mb-2">
                            <?php if(substr($dataSelisih[0]->SELISIH_KM_2, 0, 1) == '-'): ?>
                                <h6 class="text-danger fw-bold"><i class="fa fa-angle-down"></i> &nbsp;&nbsp;<?=round($dataSelisih[0]->SELISIH_KM_2,2) ?: '0'?>%</h6>
                            <?php else : ?>
                                <h6 class="text-success fw-bold"><i class="fa fa-angle-up"></i> &nbsp;&nbsp;<?=round($dataSelisih[0]->SELISIH_KM_2,2) ?: '0'?>%</h6>
                            <?php endif; ?>
                            <div class="text-secondary" style="font-size:12px;">Period 2</div>
                        </div>
                    </div>
            </div>
        </div>
   </div>
   <div class="col-md-4 align-self-stretch mb-2">
        <div class="card shadow-5-strong h-100 border-bottom border-warning border-5">
            <div class="card-body pt-3 pb-2">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="text-secondary fw-bold" style="font-size:0.6em;">Deviation Mean Time Between Failures</div>
                    <div class="text-warning fw-bold" style="font-size:0.6em;">(Mon)</div>
                </div>
                    <div class="row align-items-center justify-content-between mt-4">
                        <div class="col-md-6 position-relative text-center mb-2">
                            <?php if(substr($dataSelisih[0]->SELISIH_MTBF_1, 0, 1) == '-'): ?>
                                <h6 class="text-danger fw-bold"><i class="fa fa-angle-down"></i> &nbsp;&nbsp;<?=round($dataSelisih[0]->SELISIH_MTBF_1,2) ?: '0'?></h6>
                            <?php else : ?>
                                <h6 class="text-success fw-bold"><i class="fa fa-angle-up"></i> &nbsp;&nbsp;<?=round($dataSelisih[0]->SELISIH_MTBF_1,2) ?: '0'?></h6>
                            <?php endif; ?>
                            <div class="text-secondary" style="font-size:12px;">Period 1</div>
                            <div class="vr vr-blurry position-absolute my-0 h-100 d-none d-md-block top-0 end-0"></div>
                        </div>
                        <div class="col-md-6 position-relative text-center mb-2">
                            <?php if(substr($dataSelisih[0]->SELISIH_MTBF_2, 0, 1) == '-'): ?>
                                <h6 class="text-danger fw-bold"><i class="fa fa-angle-down"></i> &nbsp;&nbsp;<?=round($dataSelisih[0]->SELISIH_MTBF_2,2) ?: '0'?></h6>
                            <?php else : ?>
                                <h6 class="text-success fw-bold"><i class="fa fa-angle-up"></i> &nbsp;&nbsp;<?=round($dataSelisih[0]->SELISIH_MTBF_2,2) ?: '0'?></h6>
                            <?php endif; ?>
                            <div class="text-secondary" style="font-size:12px;">Period 2</div>
                        </div>
                    </div>
            </div>
        </div>
   </div>
</div>

<div class="row mb-5">
    <div class="col-md-4">
        <div class="card bg-transparent shadow-0 border-bottom border-top border-primary border-3">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="text-primary fw-bold" style="font-size:0.7em;">Availability Rate</div>
                    <div class="text-primary fw-bold" style="font-size:0.7em;"><i class="fa fa-percentage"></i></div>
                </div>
                <canvas class="chart-ar" height="300"></canvas>
                <div class="text-center mt-5">
                    <a href="<?=base_url()?>Laptop/viewList?tipe=AR">
                        <h6 class="text-primary mb-0">See Detail</h6>
                        <i class="fas fa-angle-down"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-transparent shadow-0 border-bottom border-top border-success border-3">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="text-success fw-bold" style="font-size:0.7em;">Maintenance Success</div>
                    <div class="text-success fw-bold" style="font-size:0.7em;"><i class="fa fa-percentage"></i></div>
                </div>
                <canvas class="chart-km" height="300"></canvas>
                <div class="text-center mt-5">
                    <a href="<?=base_url()?>Laptop/viewList?tipe=KM">
                        <h6 class="text-success mb-0">See Detail</h6>
                        <i class="fas fa-angle-down text-success"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-transparent shadow-0 border-bottom border-top border-warning border-3">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="text-warning fw-bold" style="font-size:0.7em;">Mean Time Between Failures</div>
                    <div class="text-warning fw-bold" style="font-size:0.7em;">(Month)</div>
                </div>
                <canvas class="chart-mtbf" height="300"></canvas>
                <div class="text-center mt-5">
                    <a href="<?=base_url()?>Laptop/viewList?tipe=MTBF">
                        <h6 class="text-warning mb-0">See Detail</h6>
                        <i class="fas fa-angle-down text-warning"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $('.tahun').on('change', function() {
      location.href="<?=base_url()?>Laptop?tahun="+$(this).val();
    });
    Chart.register(ChartDataLabels);

    const formatter = (value, ctx) => {
        return value.toLocaleString()+'%';
    };

    const formatterNonPercentage = (value, ctx) => {
        return value.toLocaleString();
    };

    // AR
    const dataChartAR = {
    type: "bar",
    maintainAspectRatio: false,
    responsive: true,  
    options: {
      plugins : {
        datalabels: { 
          anchor: 'center',
          align: 'top',
          clamp: true
        },
        legend : {
            position:'bottom',
        }
      }, 
      scales: {
            x: {
                grid: {
                display: false
                }
            },
            y: {
                grid: {
                display: false
                }
            }
        }
    },
    data: {
      labels: ["Period 1", "Period 2",],
      datasets: [{
          label: "Target",
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
          ],
          fill: true,
          borderColor: [
            'rgba(255,99,132,1)',
          ],
          borderWidth: 2,
          borderRadius : 6,
          tension: 0.4,
          data: <?=json_encode($targetAR)?>,
          datalabels: {
            color: "black",
            formatter: formatter,
          }
        },
        {
          label: "Achievement",
          backgroundColor: [
            'rgba(102, 16, 242, 0.2)',
          ],
          fill: true,
          borderColor: [
            'rgba(102, 16, 242, 1)',
          ],
          borderWidth: 2,
          borderRadius : 6,
          tension: 0.4,
          data: <?=json_encode($achievementAR)?>,
          datalabels: {
            color: "black",
            formatter: formatter,
          }
        },
      ],
    },
  };
  new Chart($('.chart-ar'), dataChartAR);

    //   KM
  const dataChartKM = {
    type: "bar",
    maintainAspectRatio: false,
    responsive: true,  
    options: {
      plugins : {
        datalabels: { 
          anchor: 'center',
          align: 'top',
          clamp: true
        },
        legend : {
            position:'bottom',
        }
      }, 
      scales: {
            x: {
                grid: {
                display: false
                }
            },
            y: {
                grid: {
                display: false
                }
            }
        }
    },
    data: {
      labels: ["Period 1", "Period 2",],
      datasets: [{
          label: "Target",
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
          ],
          fill: true,
          borderColor: [
            'rgba(255,99,132,1)',
          ],
          borderWidth: 2,
          borderRadius : 6,
          tension: 0.4,
          data: <?=json_encode($targetKM)?>,
          datalabels: {
            color: "black",
            formatter: formatter,
          }
        },
        {
          label: "Achievement",
          backgroundColor: [
            'rgba(102, 16, 242, 0.2)',
          ],
          fill: true,
          borderColor: [
            'rgba(102, 16, 242, 1)',
          ],
          borderWidth: 2,
          borderRadius : 6,
          tension: 0.4,
          data: <?=json_encode($achievementKM)?>,
          datalabels: {
            color: "black",
            formatter: formatter,
          }
        },
      ],
    },
  };
  new Chart($('.chart-km'), dataChartKM);

    // MTBF   
  const dataChartMTBF = {
    type: "bar",
    maintainAspectRatio: false,
    responsive: true,  
    options: {
      plugins : {
        datalabels: { 
          anchor: 'center',
          align: 'top',
          clamp: true
        },
        legend : {
            position:'bottom',
        }
      }, 
      scales: {
            x: {
                grid: {
                display: false
                }
            },
            y: {
                grid: {
                display: false
                }
            }
        }
    },
    data: {
      labels: ["Period 1", "Period 2",],
      datasets: [{
          label: "Target",
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
          ],
          fill: true,
          borderColor: [
            'rgba(255,99,132,1)',
          ],
          borderWidth: 2,
          borderRadius : 6,
          tension: 0.4,
          data: <?=json_encode($targetMTBF)?>,
          datalabels: {
            color: "black",
            formatter: formatterNonPercentage,
          }
        },
        {
          label: "Achievement",
          backgroundColor: [
            'rgba(102, 16, 242, 0.2)',
          ],
          fill: true,
          borderColor: [
            'rgba(102, 16, 242, 1)',
          ],
          borderWidth: 2,
          borderRadius : 6,
          tension: 0.4,
          data: <?=json_encode($achievementMTBF)?>,
          datalabels: {
            color: "black",
            formatter: formatterNonPercentage,
          }
        },
      ],
    },
  };
  new Chart($('.chart-mtbf'), dataChartMTBF);
});
</script>