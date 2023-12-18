
<!DOCTYPE html>
<html lang="en">
<head>

<?= $this->include('layouts-hopital/title-meta.php'); ?>
<?= $this->include('layouts-hopital/head-css.php'); ?>
</head>

<body id="body" class="dark-sidebar">

<?= $this->include('layouts-hopital/left-sidebar'); ?>
<?= $this->include('layouts-hopital/topbar'); ?>





<div class="page-wrapper">

    <!-- Page Content-->
    <div class="page-content-tab">

        <?= $this->include('layouts-hopital/home'); ?>

        <!--end Rightbar-->



        <!--Start Footer-->

        <?= $this->include('layouts-hopital/footer'); ?>
        <!-- end Footer -->
        
    </div>
    <!-- end page content -->
</div>
<!-- end page-wrapper -->

<!-- Javascript  -->

<script src="../assets/plugins/apexcharts/apexcharts.min.js"></script>
<script src="../assets/pages/analytics-index.init.js"></script>


<!-- App js -->
<script src="../assets/js/app.js"></script>

</body>
<!--end body-->
</html>