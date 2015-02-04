<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <a id="logo" class="navbar-brand home_link" href="#">NET-WORK</a>
    </div>
    <!-- /.navbar-header -->

    <?php require (__DIR__ . '/components/navbar_top.php') ?>

    <?php require (__DIR__ . '/components/equipment_list.php') ?>

    <!-- /.navbar-static-side -->
</nav>

<div id="page-wrapper" style="min-height: 455px;">


    <!-- main wrapper of the main content -- BEGIN -- -->


    <div class="row"><!-- head with the breadcrumb -- BEGIN -- -->
        <div class="col-lg-12">
            <ol id="breadlist" class="breadcrumb" style="background-color:white;">
                <li><a href="#">NET-WORK</a></li>
            </ol>
        </div>
    </div><!-- head with the breadcrumb -- END -- -->

    <hr />


    <div class="row">
        <div class="col-lg-12">

            <div class="row">

                <div class="col-lg-8">

                    <div id="main_content">
                        
                        <h1 id="title_content" class="page-header">Dashboard</h1>

                        <?php require (__DIR__ . '/content/default_content.php') ?>

                        <?php require (__DIR__ . '/content/equipment_table.php') ?>
                        
                        <?php require (__DIR__ . '/content/form.php') ?>

                    </div>

                </div>

                <div class="col-lg-4">

                    <?php require (__DIR__ . '/components/notification_panel.php') ?>

                    <?php require (__DIR__ . '/components/donut_stat.php') ?>

                </div>


            </div>

        </div>
    </div>


    <!-- main wrapper of the main content -- END -- -->

</div>
