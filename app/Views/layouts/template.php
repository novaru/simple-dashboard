<!doctype html>
<html lang="en" dir="ltr">

<head>
    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sash – Bootstrap 5  Admin & Dashboard Template">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords" content="admin,admin dashboard,admin panel,admin template,bootstrap,clean,dashboard,flat,jquery,modern,responsive,premium admin templates,responsive admin,ui,ui kit.">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('/'); ?>assets/images/brand/favicon.ico" />

    <!-- TITLE -->
    <title><?= esc($title) ?></title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="<?= base_url('/'); ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="<?= base_url('/'); ?>assets/css/style.css" rel="stylesheet" />
    <link href="<?= base_url('/'); ?>assets/css/dark-style.css" rel="stylesheet" />
    <link href="<?= base_url('/'); ?>assets/css/transparent-style.css" rel="stylesheet">
    <link href="<?= base_url('/'); ?>assets/css/skin-modes.css" rel="stylesheet" />

    <!--- FONT-ICONS CSS -->
    <link href="<?= base_url('/'); ?>assets/css/icons.css" rel="stylesheet" />

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="<?= base_url('/'); ?>assets/colors/color1.css" />

</head>

<body class="app sidebar-mini ltr light-mode">
    <?= $this->renderSection('content'); ?>

    <!-- JQUERY JS -->
    <script src="<?= base_url('/'); ?>assets/js/jquery.min.js"></script>

    <!-- BOOTSTRAP JS -->
    <script src="<?= base_url('/'); ?>assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="<?= base_url('/'); ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- SPARKLINE JS-->
    <script src="<?= base_url('/'); ?>assets/js/jquery.sparkline.min.js"></script>

    <!-- Sticky js -->
    <script src="<?= base_url('/'); ?>assets/js/sticky.js"></script>

    <!-- CHART-CIRCLE JS-->
    <script src="<?= base_url('/'); ?>assets/js/circle-progress.min.js"></script>

    <!-- PIETY CHART JS-->
    <script src="<?= base_url('/'); ?>assets/plugins/peitychart/jquery.peity.min.js"></script>
    <script src="<?= base_url('/'); ?>assets/plugins/peitychart/peitychart.init.js"></script>

    <!-- SIDEBAR JS -->
    <script src="<?= base_url('/'); ?>assets/plugins/sidebar/sidebar.js"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="<?= base_url('/'); ?>assets/plugins/p-scroll/perfect-scrollbar.js"></script>
    <script src="<?= base_url('/'); ?>assets/plugins/p-scroll/pscroll.js"></script>
    <script src="<?= base_url('/'); ?>assets/plugins/p-scroll/pscroll-1.js"></script>

    <!-- INTERNAL CHARTJS CHART JS-->
    <script src="<?= base_url('/'); ?>assets/plugins/chart/Chart.bundle.js"></script>
    <script src="<?= base_url('/'); ?>assets/plugins/chart/rounded-barchart.js"></script>
    <script src="<?= base_url('/'); ?>assets/plugins/chart/utils.js"></script>

    <!-- INTERNAL SELECT2 JS -->
    <script src="<?= base_url('/'); ?>assets/plugins/select2/select2.full.min.js"></script>

    <!-- INTERNAL Data tables js-->
    <script src="<?= base_url('/'); ?>assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('/'); ?>assets/plugins/datatable/js/dataTables.bootstrap5.js"></script>
    <script src="<?= base_url('/'); ?>assets/plugins/datatable/dataTables.responsive.min.js"></script>

    <!-- INTERNAL APEXCHART JS -->
    <script src="<?= base_url('/'); ?>assets/js/apexcharts.js"></script>
    <script src="<?= base_url('/'); ?>assets/plugins/apexchart/irregular-data-series.js"></script>

    <!-- INTERNAL Flot JS -->
    <script src="<?= base_url('/'); ?>assets/plugins/flot/jquery.flot.js"></script>
    <script src="<?= base_url('/'); ?>assets/plugins/flot/jquery.flot.fillbetween.js"></script>
    <script src="<?= base_url('/'); ?>assets/plugins/flot/chart.flot.sampledata.js"></script>
    <script src="<?= base_url('/'); ?>assets/plugins/flot/dashboard.sampledata.js"></script>

    <!-- INTERNAL Vector js -->
    <script src="<?= base_url('/'); ?>assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="<?= base_url('/'); ?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

    <!-- SIDE-MENU JS-->
    <script src="<?= base_url('/'); ?>assets/plugins/sidemenu/sidemenu.js"></script>

    <!-- TypeHead js -->
    <script src="<?= base_url('/'); ?>assets/plugins/bootstrap5-typehead/autocomplete.js"></script>
    <script src="<?= base_url('/'); ?>assets/js/typehead.js"></script>

    <!-- INTERNAL INDEX JS -->
    <script src="<?= base_url('/'); ?>assets/js/index1.js"></script>

    <!-- Color Theme js -->
    <script src="<?= base_url('/'); ?>assets/js/themeColors.js"></script>

    <!-- CUSTOM JS -->
    <script src="<?= base_url('/'); ?>assets/js/custom.js"></script>
</body>

</html>
