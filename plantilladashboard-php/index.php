<?php
include 'includes/header.php';
?>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php
        include 'includes/navbar.php';
        ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <?php
                include 'includes/topbar.php';
                include 'dashboard.php';
                ?>
            </div>
            <!-- End of Main Content -->
            <?php
            include 'includes/footer.php';
            ?>
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <?php
    include 'includes/scrolltop.php';
    include 'includes/logout.php';
    include 'includes/scripts.php';
    ?>

</body>

</html>