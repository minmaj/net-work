<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <a class="navbar-brand" href="#" onclick="showhomecontent()">NET-WORK</a>
    </div>
    <!-- /.navbar-header -->

    <?php require (__DIR__ . '/components/navbar_top.php') ?>

    <?php require (__DIR__ . '/components/equipment_list.php') ?>

    <!-- /.navbar-static-side -->
</nav>

<div id="page-wrapper" style="min-height: 455px;">
    <div class="row">
        <div class="col-lg-12">
            <ol id="breadlist" class="breadcrumb" style="background-color:white;">
                <li><a href="#">NET-WORK</a></li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <hr />
            <div class="col-lg-12">
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div id="homecontent">
                        <h1 class="page-header">Dashboard</h1>

                        <?php require (__DIR__ . '/components/default_content.php') ?>

                    </div>
                    
                    <?php require (__DIR__ . '/components/equipment_table.php') ?>
                    
                    

                </div>

                <div class="col-lg-4">

                    <?php require (__DIR__ . '/components/notification_panel.php') ?>

                    <?php require (__DIR__ . '/components/donut_stat.php') ?>

                    <!-- /.panel .chat-panel -->
                </div>

                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->


        </div>
    </div>
</div>
