<?php 
if(!function_exists('getCurrentViewIndex')){ 
	function getCurrentViewIndex(){
		$fetchAllViewIndex = array('overview','t','b','l','r','mw');
		$viewIndex = (isset($_REQUEST['view']) && in_array($_REQUEST['view'], $fetchAllViewIndex)) ? $_REQUEST['view'] : 'overview';
		return $viewIndex;
	}
}
if(!function_exists('getTabURL')){ 
	function getTabURL($viewIndex = null){
		if (!$viewIndex) $viewIndex = 'overview';
		return 'admin.php?page=thethe-sliding-panels&amp;view=' . $viewIndex;
	}
}
?>

<div id="thethefly">
  <div class="wrap">
    <h2 id="thethefly-panel-title"> <span id="thethefly-panel-icon" class="icon48">&nbsp;</span> TheThe Fly Sliding Panels</h2>
    <div id="thethefly-panel-frame">
      <div id="menu-management-liquid">
        <div id="menu-management"> 
          <!-- tabs -->
          <div class="nav-tabs-wrapper">
            <div class="nav-tabs">
              <?php
$view = getCurrentViewIndex();
if ($view == 'overview') echo "<span class='nav-tab nav-tab-active'>Overview</span>"; else echo "<a href='". getTabURL('overview') ."' class='nav-tab hide-if-no-js'>Overview</a>"; 
if ($view == 't') echo "<span class='nav-tab nav-tab-active'>Top Panel</span>"; else echo "<a href='". getTabURL('t') ."' class='nav-tab hide-if-no-js'>Top Panel</a>"; 
if ($view == 'b') echo "<span class='nav-tab nav-tab-active'>Bottom Panel</span>"; else echo "<a href='". getTabURL('b') ."' class='nav-tab hide-if-no-js'>Bottom Panel</a>"; 
if ($view == 'l') echo "<span class='nav-tab nav-tab-active'>Left Panel</span>"; else echo "<a href='". getTabURL('l') ."' class='nav-tab hide-if-no-js'>Left Panel</a>"; 
if ($view == 'r') echo "<span class='nav-tab nav-tab-active'>Right Panel</span>"; else echo "<a href='". getTabURL('r') ."' class='nav-tab hide-if-no-js'>Right Panel</a>"; 
if ($view == 'mw') echo "<span class='nav-tab nav-tab-active'>Modal Window</span>"; else echo "<a href='". getTabURL('mw') ."' class='nav-tab hide-if-no-js'>Modal Window</a>"; 
?>
            </div>
          </div>
          <!-- /tabs -->
          
          <?php 
$tabDesc = '';
switch ($view) {
	case 'l': $tabDesc = 'Left Panel Settings';break;
	case 'r': $tabDesc = 'Right Panel Settings';break;
	case 'mw': $tabDesc = 'Modal Window Settings';break;
	case 'b': $tabDesc = 'Bottom Panel Settings';break;
	case 't': $tabDesc = 'Top Panel Settings';break;
	default: $tabDesc = 'TheThe Sliding Panels Overview';
}?>
          <div class='menu-edit tab-overview'>
            <div id='nav-menu-header'>
              <div class='major-publishing-actions'> <span><?php echo $tabDesc; ?></span>
                <div class="sep">&nbsp;</div>
              </div>
              <!-- END .major-publishing-actions --> 
            </div>
            <!-- END #nav-menu-header -->
            <div id='post-body'>
              <div id='post-body-content'>
                <?php
					if($view == 'overview'){
						include 'view-tab-'.$view.'.php';
					} else {
					?>
                <form method="post" action="">
                  <?php
					include 'inc.submit-buttons.php';
					include 'view-tab-'.$view.'.php';
					include 'inc.submit-buttons.php';
				  ?>
                </form>
                <?php } ?>
              </div>
              <!-- /#post-body-content --> 
            </div>
            <!-- /#post-body --> 
            <div id="nav-menu-footer">
              <div class="major-publishing-actions">&nbsp;</div>
            </div>            
          </div>
          <!-- /.menu-edit --> 
          
        </div>
      </div>
      <!-- sidebar -->
      <div id="thethefly-admin-sidebar" class="metabox-holder">
        <div class="meta-box-sortables">
          <?php include 'inc.sidebar.donate.php';?>
          <?php include 'inc.sidebar.newsletter.php';?>
          <?php include 'inc.sidebar.themes.php';?>
          <?php include 'inc.sidebar.plugins.php';?>
          <?php include 'inc.sidebar.help.php';?>          
        </div>
      </div>
      <!-- /sidebar -->
      <div class="clear"></div>
    </div>
  </div>
</div>
