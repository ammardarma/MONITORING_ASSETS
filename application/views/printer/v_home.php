<section id="pdf">

  <div id="header" class="row d-flex justify-content-between align-items-center mb-5 d-none">
    <div class="col-md-2">
      <img src="<?=base_url()?>assets/logo-wb.png" class="rounded d-none d-md-block logo" height="50" alt="?" loading="lazy"/>
    </div>
    <div class="col-md-4 text-end">
      <h6 style="font-size:0.8em;">Print tanggal : <?=date('d F Y h:i:s')?></h6>
      <h6 class="fw-bold text-primary" style="font-size:14px;"><i class="fa fa-info-circle">&nbsp;&nbsp;</i><?=$this->session->userdata('name') . ' | ' .ucfirst($this->session->userdata('status'))?></h6>
    </div>
  </div>

<div><h5 class="fw-bold"><i class="fa fa-print"></i> Printer</h5></div>
    
  <div class="row justify-content-between align-items-center mt-2">
      <div class="col-md-3 align-self-stretch mb-4">
      </div>
      <div class="col-md-4 mb-2 d-flex justify-content-end">
        <select data-mdb-select-init class="tahun">
          <?php for($i = 2; $i < 10; $i++): ?>
          <option value="202<?=$i?>" <?=(("202".$i) == $tahun) ? 'selected': ''?>>202<?=$i?></option>
          <?php endfor; ?>
        </select>
        <label class="form-label select-label">Filter Year</label>
        <button class="btn btn-primary ms-2 rounded-5" onclick="printPDF()">Print PDF</button>
      </div>
  </div>
<div class="row mb-2">
   <div class="col-md-4 align-self-stretch mb-2">
        <div class="card shadow-5-strong h-100 border-bottom border-primary border-5">
            <div class="card-body pt-3 pb-2">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="text-primary fw-bold" style="font-size:0.9em;">Frekuensi Pengguna</div>
                    <div class="text-primary fw-bold" style="font-size:0.7em;"><i class="fa fa-percentage"></i></div>
                </div>
                    <div class="row align-items-center justify-content-between mt-4">
                        <div class="col-md-6 position-relative text-center mb-2">
                            <h6 class="text-dark fw-bold"> &nbsp;&nbsp;<?=round($dataSummary[0]->PR_FPG*100,2) ?: '0'?>%</h6>
                            <div class="text-secondary" style="font-size:12px;">Achievement</div>
                            <div class="vr vr-blurry position-absolute my-0 h-100 d-none d-md-block top-0 end-0"></div>
                        </div>
                        <div class="col-md-6 position-relative text-center mb-2">
                            <h6 class="text-dark fw-bold"> &nbsp;&nbsp;<?=round($dataSummary[0]->TARGET_FPG*100,2) ?: '0'?>%</h6>
                            <div class="text-secondary" style="font-size:12px;">Target</div>
                            <div class="vr vr-blurry position-absolute my-0 h-100 d-none d-md-block top-0 end-0"></div>
                        </div>
                    </div>
            </div>
        </div>
   </div>
   <div class="col-md-4 align-self-stretch mb-2">
        <div class="card shadow-5-strong h-100 border-bottom border-success border-5">
            <div class="card-body pt-3 pb-2">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="text-success fw-bold" style="font-size:0.9em;">Frekuensi Perbaikan</div>
                    <div class="text-success fw-bold" style="font-size:0.7em;">x&#772;</div>
                </div>
                    <div class="row align-items-center justify-content-between mt-4">
                        <div class="col-md-6 position-relative text-center mb-2">
                            <h6 class="text-dark fw-bold"> &nbsp;&nbsp;<?=round($dataSummary[0]->PR_FPB,2) ?: '0'?></h6>
                            <div class="text-secondary" style="font-size:12px;">Achievement</div>
                            <div class="vr vr-blurry position-absolute my-0 h-100 d-none d-md-block top-0 end-0"></div>
                        </div>
                        <div class="col-md-6 position-relative text-center mb-2">
                            <h6 class="text-dark fw-bold"> &nbsp;&nbsp;<?=round($dataSummary[0]->TARGET_FPB,2) ?: '0'?></h6>
                            <div class="text-secondary" style="font-size:12px;">Target</div>
                            <div class="vr vr-blurry position-absolute my-0 h-100 d-none d-md-block top-0 end-0"></div>
                        </div>
                    </div>
            </div>
        </div>
   </div>
   <div class="col-md-4 align-self-stretch mb-2">
        <div class="card shadow-5-strong h-100 border-bottom border-warning border-5">
            <div class="card-body pt-3 pb-2">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="text-warning fw-bold" style="font-size:0.9em;">Tingkat Kepuasan</div>
                    <div class="text-warning fw-bold" style="font-size:0.7em;"><i class="fa fa-percentage"></i></div>
                </div>
                    <div class="row align-items-center justify-content-between mt-4">
                        <div class="col-md-6 position-relative text-center mb-2">
                            <h6 class="text-dark fw-bold"> &nbsp;&nbsp;<?=round($dataSummary[0]->PR_TK*100,2) ?: '0'?>%</h6>
                            <div class="text-secondary" style="font-size:12px;">Achievement</div>
                            <div class="vr vr-blurry position-absolute my-0 h-100 d-none d-md-block top-0 end-0"></div>
                        </div>
                        <div class="col-md-6 position-relative text-center mb-2">
                            <h6 class="text-dark fw-bold"> &nbsp;&nbsp;<?=round($dataSummary[0]->TARGET_TP*100,2) ?: '0'?>%</h6>
                            <div class="text-secondary" style="font-size:12px;">Target</div>
                            <div class="vr vr-blurry position-absolute my-0 h-100 d-none d-md-block top-0 end-0"></div>
                        </div>
                    </div>
            </div>
        </div>
   </div>
</div>

<div class="row mb-5">
    <div class="col-md-12 mb-2">
        <div class="card bg-transparent shadow-0 border border-primary border-2">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <div class="text-primary fw-bold" style="font-size:0.9em;">Frekuensi Pengguna</div>
                    <div class="text-primary fw-bold" style="font-size:1em;"><i class="fa fa-percentage"></i></div>
                </div>
                <canvas class="chart-fpg" height="50"></canvas>
                <div class="text-center mt-2">
                    <a href="<?=base_url()?>Printer/viewList?tipe=FREKUENSI PENGGUNA">
                        <h6 class="text-primary mb-0">See Detail</h6>
                        <i class="fas fa-angle-down"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 mb-2">
        <div class="card bg-transparent shadow-0 border border-success border-2">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <div class="text-success fw-bold" style="font-size:0.9em;">Frekuensi Perbaikan</div>
                    <div class="text-success fw-bold" style="font-size:1em;">x&#772;</div>
                </div>
                <canvas class="chart-fpb" height="50"></canvas>
                <div class="text-center mt-2">
                    <a href="<?=base_url()?>Printer/viewList?tipe=FREKUENSI PERBAIKAN">
                        <h6 class="text-success mb-0">See Detail</h6>
                        <i class="text-success fas fa-angle-down"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 mb-2">
        <div class="card bg-transparent shadow-0 border border-warning border-2">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <div class="text-warning fw-bold" style="font-size:0.9em;">Tingkat Kepuasan</div>
                    <div class="text-warning fw-bold" style="font-size:1em;"><i class="fa fa-percentage"></i></div>
                </div>
                <canvas class="chart-tk" height="50"></canvas>
                <div class="text-center mt-2">
                    <a href="<?=base_url()?>Printer/viewList?tipe=TINGKAT KEPUASAN">
                        <h6 class="text-warning mb-0">See Detail</h6>
                        <i class="text-warning fas fa-angle-down"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

</section> <!-- END OF PDF -->
<section id="pdf2">
<hr class="hr hr-blurry mb-5"/>
<div class="mb-4"><h6 class="fw-bold"><i class="fas fa-chart-bar"></i> &nbsp;&nbsp;Comparison Data Between Years</h6></div>

<div class="row mb-5">
    <div class="col-md-12 mb-5">
        <div class="card bg-transparent shadow-0 border border-primary border-2">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="text-primary fw-bold" style="font-size:0.9em;">Perbandingan Frekuensi Pengguna dengan Tahun Sebelumnya</div>
                    <div class="text-primary fw-bold" style="font-size:1em;"><i class="fa fa-percentage"></i></div>
                </div>
                <canvas class="chart-fpg-compare" height="100"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-12 mb-5">
        <div class="card bg-transparent shadow-0 border border-success border-2">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="text-success fw-bold" style="font-size:0.9em;">Perbandingan Frekuensi Perbaikan dengan Tahun Sebelumnya</div>
                    <div class="text-success fw-bold" style="font-size:1em;">x&#772;</div>
                </div>
                <canvas class="chart-fpb-compare" height="100"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-12 mb-5">
        <div class="card bg-transparent shadow-0 border border-warning border-2">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="text-warning fw-bold" style="font-size:0.9em;">Perbandingan Tingkat Kepuasan dengan Tahun Sebelumnya</div>
                    <div class="text-warning fw-bold" style="font-size:1em;"><i class="fa fa-percentage"></i></div>
                </div>
                <canvas class="chart-tk-compare" height="100"></canvas>
            </div>
        </div>
    </div>
</div>
</section>

<script type="text/javascript">
function printPDF(){
  $('#header').removeClass('d-none');
  $('.total-users').removeClass('wave');
  var HTML_Width = $("#pdf").width();
  var HTML_Height = $("#pdf").height();
  var top_left_margin = 30;
  var PDF_Width = HTML_Width+(top_left_margin*2);
  var PDF_Height = (PDF_Width*1)+(top_left_margin*2);
  var canvas_image_width = HTML_Width;
  var canvas_image_height = HTML_Height;
  var totalPDFPages = Math.ceil(HTML_Height/PDF_Height)-1;
  var pdf = new jsPDF('p', 'pt',  "a4");
  var width = pdf.internal.pageSize.width;
  var height = pdf.internal.pageSize.height;
       
  html2canvas($("#pdf")[0],{allowTaint:true}).then(function(canvas) {
  canvas.getContext('2d');
  var imgData = canvas.toDataURL("image/jpeg", 1.0);
  pdf.addImage(imgData, 'JPG', 5, 30,width-15,height-50);
  window.open(pdf.output('bloburl'), '_blank');
  });

  $('#header').addClass('d-none');
  $('.total-users').addClass('wave');

}
$(document).ready(function() {

    $('.tahun').on('change', function () {
      location.href="<?=base_url()?>Printer?tahun="+$('.tahun').val();
    });

    Chart.register(ChartDataLabels);

    const formatter = (value, ctx) => {
        return value.toLocaleString()+'%';
    };

    const formatterNonPercentage = (value, ctx) => {
        return value.toLocaleString();
    };

  // FREKUENSI PENGGUNA
  const dataChartFPG = {
    type: "bar",
    maintainAspectRatio: false,
    responsive: true,  
    options: {
      plugins : {
        datalabels: { 
          anchor: 'end',
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
                grace: '2%',
                grid: {
                display: false
                }
            }
        }
    },
    data: {
      labels: <?=json_encode($bulan)?>,
      datasets: [{
          label: "Target",
          backgroundColor: [
            'rgba(255,99,132,0.2)',
          ],
          borderColor: [
            'rgba(255,99,132,1)',
          ],
          borderWidth: 2,
          borderRadius : 6,
          tension: 0.2,
          data: <?=json_encode($targetFPG)?>,
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
          borderColor: [
            'rgba(102, 16, 242, 1)',
          ],
          borderWidth: 2,
          borderRadius : 6,
          tension: 0.2,
          data: <?=json_encode($achievementFPG)?>,
          datalabels: {
            color: "black",
            formatter: formatter,
          }
        },
      ],
    },
  };
  new Chart($('.chart-fpg'), dataChartFPG);

  // FREKUENSI PERBAIKAN
  const dataChartFPB = {
    type: "bar",
    maintainAspectRatio: false,
    responsive: true,  
    options: {
      plugins : {
        datalabels: { 
          anchor: 'end',
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
                grace: '2%',
                grid: {
                display: false
                }
            }
        }
    },
    data: {
      labels: <?=json_encode($bulan)?>,
      datasets: [{
          label: "Target",
          backgroundColor: [
            'rgba(255,99,132,0.2)',
          ],
          borderColor: [
            'rgba(255,99,132,1)',
          ],
          borderWidth: 2,
          borderRadius : 6,
          tension: 0.2,
          data: <?=json_encode($targetFPB)?>,
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
          borderColor: [
            'rgba(102, 16, 242, 1)',
          ],
          borderWidth: 2,
          borderRadius : 6,
          tension: 0.2,
          data: <?=json_encode($achievementFPB)?>,
          datalabels: {
            color: "black",
            formatter: formatterNonPercentage,
          }
        },
      ],
    },
  };
  new Chart($('.chart-fpb'), dataChartFPB);

  // TINGKAT KEPUASAN
  const dataChartTK = {
    type: "bar",
    maintainAspectRatio: false,
    responsive: true,  
    options: {
      plugins : {
        datalabels: { 
          anchor: 'end',
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
                grace: '5%',
                grid: {
                display: false
                }
            }
        }
    },
    data: {
      labels: <?=json_encode($bulan)?>,
      datasets: [{
          label: "Target",
          backgroundColor: [
            'rgba(255,99,132,0.2)',
          ],
          borderColor: [
            'rgba(255,99,132,1)',
          ],
          borderWidth: 2,
          borderRadius : 6,
          tension: 0.2,
          data: <?=json_encode($targetTK)?>,
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
          borderColor: [
            'rgba(102, 16, 242, 1)',
          ],
          borderWidth: 2,
          borderRadius : 6,
          tension: 0.2,
          data: <?=json_encode($achievementTK)?>,
          datalabels: {
            color: "black",
            formatter: formatter,
          }
        },
      ],
    },
  };
  new Chart($('.chart-tk'), dataChartTK);

  // FREKUENSI PENGGUNA
  const dataChartFPGCompare = {
    type: "bar",
    maintainAspectRatio: false,
    responsive: true,  
    options: {
      plugins : {
        datalabels: { 
          anchor: 'end',
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
                grace: '2%',
                grid: {
                display: false
                }
            }
        }
    },
    data: {
      labels: <?=json_encode($bulan)?>,
      datasets: [{
          label: "Achievement <?=$tahun-1?>",
          backgroundColor: [
              'rgba(212, 212, 212, 0.2)',
            ],
            fill: true,
            borderColor: [
              'rgba(212,212,212,1)',
            ],
          borderWidth: 2,
          borderRadius : 6,
          tension: 0.2,
          data: <?=json_encode($achievementFPGLastYear)?>,
          datalabels: {
            color: "black",
            formatter: formatter,
          }
        },
        {
          label: "Achievement <?=$tahun?>",
          backgroundColor: [
            'rgba(102, 16, 242, 0.2)',
          ],
          borderColor: [
            'rgba(102, 16, 242, 1)',
          ],
          borderWidth: 2,
          borderRadius : 6,
          tension: 0.2,
          data: <?=json_encode($achievementFPG)?>,
          datalabels: {
            color: "black",
            formatter: formatter,
          }
        },
      ],
    },
  };
  new Chart($('.chart-fpg-compare'), dataChartFPGCompare);

  // FREKUENSI PERBAIKAN
  const dataChartFPBCompare = {
    type: "bar",
    maintainAspectRatio: false,
    responsive: true,  
    options: {
      plugins : {
        datalabels: { 
          anchor: 'end',
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
                grace: '2%',
                grid: {
                display: false
                }
            }
        }
    },
    data: {
      labels: <?=json_encode($bulan)?>,
      datasets: [{
          label: "Achievement <?=$tahun-1?>",
          backgroundColor: [
              'rgba(212, 212, 212, 0.2)',
            ],
            fill: true,
            borderColor: [
              'rgba(212,212,212,1)',
            ],
          borderWidth: 2,
          borderRadius : 6,
          tension: 0.2,
          data: <?=json_encode($achievementFPBLastYear)?>,
          datalabels: {
            color: "black",
            formatter: formatterNonPercentage,
          }
        },
        {
          label: "Achievement <?=$tahun?>",
          backgroundColor: [
            'rgba(102, 16, 242, 0.2)',
          ],
          borderColor: [
            'rgba(102, 16, 242, 1)',
          ],
          borderWidth: 2,
          borderRadius : 6,
          tension: 0.2,
          data: <?=json_encode($achievementFPB)?>,
          datalabels: {
            color: "black",
            formatter: formatterNonPercentage,
          }
        },
      ],
    },
  };
  new Chart($('.chart-fpb-compare'), dataChartFPBCompare);

  // TINGKAT KEPUASAN
  const dataChartTKCompare = {
    type: "bar",
    maintainAspectRatio: false,
    responsive: true,  
    options: {
      plugins : {
        datalabels: { 
          anchor: 'end',
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
                grace: '5%',
                grid: {
                display: false
                }
            }
        }
    },
    data: {
      labels: <?=json_encode($bulan)?>,
      datasets: [{
          label: "Achievement <?=$tahun-1?>",
          backgroundColor: [
              'rgba(212, 212, 212, 0.2)',
            ],
            fill: true,
            borderColor: [
              'rgba(212,212,212,1)',
            ],
          borderWidth: 2,
          borderRadius : 6,
          tension: 0.2,
          data: <?=json_encode($achievementTKLastYear)?>,
          datalabels: {
            color: "black",
            formatter: formatter,
          }
        },
        {
          label: "Achievement <?=$tahun?>",
          backgroundColor: [
            'rgba(102, 16, 242, 0.2)',
          ],
          borderColor: [
            'rgba(102, 16, 242, 1)',
          ],
          borderWidth: 2,
          borderRadius : 6,
          tension: 0.2,
          data: <?=json_encode($achievementTK)?>,
          datalabels: {
            color: "black",
            formatter: formatter,
          }
        },
      ],
    },
  };
  new Chart($('.chart-tk-compare'), dataChartTKCompare);
});
</script>