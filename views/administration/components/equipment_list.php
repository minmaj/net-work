<!-- navbar liste des équipements -->
<div class="navbar-default sidebar" role="navigation">
  <div class="sidebar-nav navbar-collapse">
    <ul class="nav in" id="side-menu">
      <?php foreach ($viewModel->get("typeEquipements") as $typeEquipement) { ?>
          <li>
            <a href="#" data-categorie="<?php echo $typeEquipement->getLibelle(); ?>" >
                <?php echo utf8_encode($typeEquipement->getHtmlDisplay()); ?> 
              <span class="badge">
                  <?php echo $typeEquipement->getOccurence() ?>
              </span>
            </a>
          </li>
          <?php
      }
      ?>
    </ul>
    <hr />
    <div class="panel panel-primary" style="margin: 8px;">
      <div class="panel-heading">
        <div class="row">
          <div class="col-xs-3">
            <i class="fa fa-github fa-2x"></i>
          </div>
          <div class="col-xs-9 text-right" style="padding-top:5px">
            <div>
              A propos de nous!
            </div>
          </div>
        </div>
      </div>
      <a href="https://github.com/kazuia">
        <div class="panel-footer">
          <span class="pull-left">

            Kazuia

          </span>
          <span class="pull-right">
            <i class="fa fa-arrow-circle-right"></i>
          </span>
          <div class="clearfix"></div>
      </a>
      <a href="https://github.com/minmaj">

        <span class="pull-left">

          Minmaj

        </span>
        <span class="pull-right">
          <i class="fa fa-arrow-circle-right"></i>
        </span>
        <div class="clearfix"></div>
      </a>
      <a href="https://github.com/youvann">        
        <span class="pull-left">

          Youvann

        </span>
        <span class="pull-right">
          <i class="fa fa-arrow-circle-right"></i>
        </span>
        <div class="clearfix"></div>
      </a>
      <br/>

      <a href="https://github.com/minmaj/net-work">
        <span class="pull-left">

          Contribuez !

        </span>
        <span class="pull-right">
          <i class="fa fa-arrow-circle-right"></i>
        </span>
        <div class="clearfix"></div>
      </a>
    </div>
    </a>
  </div>
</div>
<!-- /.sidebar-collapse -->
</div>

