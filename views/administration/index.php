<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <a id="logo" class="navbar-brand home_link" href="#">NET-WORK</a>
        <ul class="nav navbar-nav">
            <li><a id="synoptique" href="#">Accéder au synoptique</a></li>
        </ul>
    </div>
    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a id="run_simulation" class="dropdown-toggle" href="#">
                <span id="default_simulation_msg">Lancer une simulation <i class="fa fa-play fa-fw"></i></span>
                <span id="running_simulation_msg" style="display: none;">Simulation en cours...</span>
            </a>
        </li>
    </ul>
    <!-- /.navbar-header -->

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

                        <?php require (__DIR__ . '/content/synoptique_content.php') ?>

                        <?php require (__DIR__ . '/content/form.php') ?>

                        <?php require (__DIR__ . '/components/modal_detail.php') ?>

                        <?php require (__DIR__ . '/components/modal_edit.php') ?>

                        <?php require (__DIR__ . '/components/modal_delete.php') ?>

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
