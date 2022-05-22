<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>MO-GRID</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/adminlte.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="dashboard.php">MO-GRID</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="login.php" data-toggle="modal" data-bs-target="#logout">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                    <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="dashboard.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">PVMon</div>
                            <a class="nav-link" href="node_1.php"  aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-solar-panel"></i></div>
                                Node 1
                            </a>
                            <a class="nav-link" href="node_2.php"  aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-solar-panel"></i></div>
                                Node 2
                            </a>
                            <a class="nav-link" href="#"  aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-solar-panel"></i></div>
                                Node 3
                            </a>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="net_mon.php"  aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-wifi"></i></div>
                                NetMon
                            </a>
                            <div class="sb-sidenav-menu-heading">Other</div>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        UPT
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <div class="content-header">
                          <div class="container-fluid">
                            <div class="row mb-2">
                              <div class="col-sm-6">
                                <h1 class="m-0">Node 3</h1>
                              </div><!-- /.col -->
                              <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <button class="btn btn-primary text-white" data-bs-toggle="modal" data-bs-target="#exportCSV"><i class="fa fa-print"></i> Export CSV</button> 
                            </div>
                          </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">VOLTAGE</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <span id="cek-tegangan">0</span>
                                            <span>V</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-info text-white mb-4">
                                    <div class="card-body">CURRENT</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                         <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <span id="cek-arus">0</span>
                                            <span>A</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">POWER</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                       <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <span id="cek-daya">0</span>
                                            <span>W</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">RSSI</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <span id="cek-rssi">0</span>
                                            <span>dBm</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card mb-4 card-primary">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Chart Voltage
                                        <div class="card-tools">
                                          <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                          </button>
                                          <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                          </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div id="grafik-tegangan"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="card mb-4 card-info">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Chart Current
                                        <div class="card-tools">
                                          <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                          </button>
                                          <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                          </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div id="grafik-arus" width="100%" height="40"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="card mb-4 card-success">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Chart Power
                                         <div class="card-tools">
                                          <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                          </button>
                                          <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                          </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                         <div id="grafik-daya" width="100%" height="40"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="card mb-4 card-danger">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Chart RSSI
                                        <div class="card-tools">
                                          <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                          </button>
                                          <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                          </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div id="grafik-rssi" width="100%" height="40"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; PKL UPT 2021</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exportCSV" tabindex="-1" aria-labelledby="exportCSV" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="eksportCSV">Eksport CSV</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body" target="_blank">
                <div class="container box">
                        <br>
                            <div class="table-responsive">
                                <div class="row">
                                 <form method="post" class="form-group" action="load/node_3/export_filter.php">
                                  <div class="input-daterange" id="input-daterange">
                                    <table>
                                        <tr>
                                            <td>
                                                <div class="form-group">Start Date</div>
                                            </td>
                                            <td align="center" width="15%">
                                                <div class="form-group">:</div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="date" name="start_date" class="form-control" required>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-group">End Date</div>
                                            </td>
                                            <td align="center" width="15%">
                                                <div class="form-group">:</div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="date" name="end_date" class="form-control" required>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                  </div>
                                <div class="col-md-2">
                                    <input type="submit" name="export" value="Export" class="btn btn-info" />
                                </div>
                            </form>
                        </div>
                     </div>
                  </div>
              </div>
              <div class="modal-footer">
                <form method="post" action="load/node_3/export.php">  
                   <input type="submit" name="export" value="Export All" class="btn btn-primary" />  
                </form> 
              </div>
            </div>
          </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        <script src="js/scripts.js"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/adminlte.min.js"></script>
        <!-- load grafik -->
        <script type="text/javascript">
                $(document).ready( function(){
                  setInterval( function(){
                    $("#grafik-tegangan").load("load/node_3/grafik_tegangan.php");
                }, 1000 );
              });
        </script>
        <script type="text/javascript">
                $(document).ready(function(){

                  setInterval(function(){
                    $("#grafik-arus").load("load/node_3/grafik_arus.php");
                }, 1000 );
              });
        </script>
        <script type="text/javascript">
                $(document).ready(function(){

                  setInterval(function(){
                    $("#grafik-daya").load("load/node_3/grafik_daya.php");
                }, 1000 );
              });
        </script>
        <script type="text/javascript">
                $(document).ready(function(){

                  setInterval(function(){
                    $("#grafik-rssi").load("load/node_3/grafik_rssi.php");
                }, 1000 );
              });
        </script>
        <!-- load data -->
        <script type="text/javascript">
                $(document).ready( function(){

                  setInterval( function(){
                    $("#cek-arus").load("load/node_3/cek_arus.php");
                }, 1000 );
              });
        </script>
        <script type="text/javascript">
                $(document).ready( function(){

                  setInterval( function(){
                    $("#cek-daya").load("load/node_3/cek_daya.php");
                }, 1000 );
              });
        </script>
        <script type="text/javascript">
                $(document).ready( function(){

                  setInterval( function(){
                    $("#cek-tegangan").load("load/node_3/cek_tegangan.php");
                }, 1000 );
              });
        </script>
        <script type="text/javascript">
                $(document).ready( function(){

                  setInterval( function(){
                    $("#cek-rssi").load("load/node_3/cek_rssi.php");
                }, 1000 );
              });
        </script>
    </body>
</html>
