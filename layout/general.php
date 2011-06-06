<?php
// This file is part of the Tango sunrise theme for Moodle 2.0
//
// Tango sunrise is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  
//

/**
 * Tango sunrise theme template
 * 
 * @author Jeremy FitzPatrick
 * @copyright (C) 2011 Jeremy FitzPatrick
 * @author John Stabinger (Brick theme 2010)
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @package theme
 * @category theme
 */

$hasheading = ($PAGE->heading);
$hasnavbutton = ($PAGE->button);
$hasnavbar = (empty($PAGE->layout_options['nonavbar']) && $PAGE->has_navbar());
$hasfooter = (empty($PAGE->layout_options['nofooter']));
$hassidepost = $PAGE->blocks->region_has_content('side-post', $OUTPUT);
$showsidepost = ($hassidepost && !$PAGE->blocks->region_completely_docked('side-post', $OUTPUT));

$custommenu = $OUTPUT->custom_menu();
$hascustommenu = (empty($PAGE->layout_options['nocustommenu']) && !empty($custommenu));


$bodyclasses = array();
if ($showsidepost) {
    $bodyclasses[] = 'side-post-only';
} else if (!$showsidepost) {
    $bodyclasses[] = 'content-only';
}

echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes() ?>>
<head>
    <title><?php echo $PAGE->title ?></title>
    <link rel="shortcut icon" href="<?php echo $OUTPUT->pix_url('favicon', 'theme')?>" />
    <?php echo $OUTPUT->standard_head_html() ?>
    
    <?php if(!empty($PAGE->theme->settings->ga)) { ?>
    <script type="text/javascript">
    var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
    document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
	
	</script>
  <?php } ?>

</head>

<body id="<?php echo $PAGE->bodyid ?>" class="<?php echo $PAGE->bodyclasses.' '.join(' ', $bodyclasses) ?>">
<?php echo $OUTPUT->standard_top_of_body_html() ?>

				
<!-- START OF HEADER -->

<div id="headerwrap">
    <div id="site-title">
    <?php if (!empty($PAGE->theme->settings->logo)) { 
             echo '<a href="' . $CFG->wwwroot . '" title="Home">';
             echo '<img src="' . $PAGE->theme->settings->logo . '" valign="center" alt="Home" />';
             echo '</a>';
    }
             echo $GLOBALS['SITE']->fullname;
     ?>
    </div>  
    
    
    <?php if ($hascustommenu) { ?>
            <div id="custommenu"><?php echo $custommenu; ?></div>
        <?php } ?>

			<div id="loggedinas">
			<?php if ($hasheading) { 
            	// TODO: move lang menu to profile 
            	//echo $OUTPUT->lang_menu();
            	echo "<span class='btn'><input type='button' class='help' value='Help'/></span>";
            	$user = session_get_realuser();
            	if($user->id > 1){
            		//echo "<span class='btn'>";
            		
            		
            		//echo "<input type='button' class='logged-in' value='Logged in'/></span>";
            		echo $OUTPUT->user_picture($user, array('size'=>23, 'link'=>false));
            		echo '<img class="usermask logged-in" src="'. $OUTPUT->pix_url('mask', 'theme') . '" />';
            		
            		echo "<div id='login-info-wrapper'><input type='button' class='close' value='X' />";
            		echo $OUTPUT->login_info();
            		echo "</div>";
            	} else {
            		echo "<span class='btn'><input type='button' class='not logged-in' value='Log in' /></span>";
            		//echo $OUTPUT->user_picture($user, array('size'=>23, 'link'=>false));
            		echo "<div id='login-info-wrapper'><input type='button' class='close' value='X' />";
            		
            		 // send login somewhere else and stitch the fields together b4 redirecting to real login
            		 // make sure this does not interfere with success redirect
            		 $this->content->text .= "\n".'<form class="loginform" id="login" method="post" action="'.get_login_url().'">';
            		 /*
            		 $this->content->text .= '<div class="c1 fld institution"><label for="login_dhb">'.get_string('institution').'</label>';
                     $this->content->text .= '<select name="dhb" id="login_dhb">';
                     $this->content->text .= '<option value="">Choose..</option>';
                     $this->content->text .= '<option value="waikatodhb">Waikato District Health Board</option>';
                     $this->content->text .= '<option value="lakesdhb">Lakes District Health Board</option>';
            		 $this->content->text .= '</select></div>';
                     */

            $this->content->text .= '<div class="c1 fld username"><label for="login_username">'.get_string('username').'</label>';
            $this->content->text .= '<input type="text" name="username" id="login_username" value="'.s($username).'" /></div>';

            $this->content->text .= '<div class="c1 fld password"><label for="login_password">'.get_string('password').'</label>';
            $this->content->text .= '<input type="password" name="password" id="login_password" value="" /></div>';

            $this->content->text .= '<div class="c1 btn"><input type="submit" value="'.get_string('login').'" /></div>';

            $this->content->text .= "</form>\n";
            echo  $this->content->text;
            		echo "</div>";
            	}
            	 
            	echo $PAGE->headingmenu;
            } ?>
            
             


	</div>
		
</div>
<!-- END OF HEADER -->

	<h1 id="page-title"><?php echo $PAGE->heading ?></h1>
	<?php if ($hasnavbar) { ?>
            <div class="navbar">
            <div class="wrapper">
                <div class="breadcrumb"><?php echo $OUTPUT->navbar(); ?></div>
                <?php if ($hasnavbutton) { ?>
                   <div class="navbutton"><?php echo $PAGE->button; ?></div>
                <?php } ?>
            </div>
            </div>
        <?php } ?>
	<div id="page">
		<div id="wrapper" class="clearfix">

<!-- START OF CONTENT -->

			<div id="page-content-wrapper" class="wrapper clearfix">
		    	<div id="page-content">
    		    	<div id="region-main-box">
        		    	<div id="region-post-box">
            
	            	    	<div id="region-main-wrap">
    	            	    	<div id="region-main">
        	            	    	<div class="region-content">
        	            	          
        	            	            
	            	    
            	            	    	<?php echo core_renderer::MAIN_CONTENT_TOKEN ?>
	                	        	
	                	        	</div>
    	                		</div>
	    	            	</div>
                
		                	<?php if ($hassidepost) { ?>
    
    		            	<div id="region-post" class="block-region">
        		            	<div class="region-content">
    
            		            	<?php echo $OUTPUT->blocks_for_region('side-post') ?>
            		             
                		    	</div>
	                		</div>
	    	          
	    	            	<?php } ?>
                
    	    	    	</div>
	    	    	</div>
	    		</div>
    		</div>

<!-- END OF CONTENT -->

	
		</div>
	</div>

<!-- START OF FOOTER -->

<?php if ($hasfooter) { ?>
	<div id="page-footer" class="wrapper">
		<p class="helplink"><?php echo page_doc_link(get_string('moodledocslink')) ?></p>
		<?php
      //  echo $OUTPUT->login_info();
		// echo $OUTPUT->home_link();
        echo $OUTPUT->standard_footer_html();
		?>
		
	</div>
<?php } ?>


<div id="smokescreen"></div>

<div id="theme-popup"><div class="control"><input type="button" class="close" value="X" /></div><div class="content"><?php echo $PAGE->theme->settings->popup ?></div></div>

<?php echo $OUTPUT->standard_end_of_body_html() ?>
<?php // include ('moodlebar/moodle_bar.php'); ?>

<?php if(!empty($PAGE->theme->settings->ga)) { ?>

<script type="text/javascript">
var pageTracker = _gat._getTracker("<?php echo $PAGE->theme->settings->ga ?>");
  pageTracker._trackPageview("<?php echo "/" . $PAGE->pagetype . "/" . $PAGE->title ?>");
</script>

<?php  } ?>
</body>
</html>