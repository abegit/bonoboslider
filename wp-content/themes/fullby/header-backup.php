<!DOCTYPE html>
<html  <?php language_attributes();?>>
  <head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php wp_title('&raquo;','true','right'); ?><?php bloginfo('name'); ?></title>
    <meta name="description" content="<?php echo get_option('fullby_description'); ?>" />
    
    <!-- Favicon -->
    <link rel="icon" href="<?php bloginfo('stylesheet_directory'); ?>/img/favicon.png" type="image/x-icon"> 

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/font-awesome/css/font-awesome.min.css">

    <!-- Custom styles for this template -->
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/style.css?v=1" rel="stylesheet">
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/fonts.css" rel="stylesheet">
  
    <!-- animate -->
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/css/animate.css" rel="stylesheet">

    <!-- Google web Font -->
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,100' rel='stylesheet' type='text/css'>

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    
    <!-- Analitics -->
	<?php if (get_option('fullby_analytics') <> "") { echo get_option('fullby_analytics'); } ?>
    
	<?php wp_head(); ?> 

  <script src="http://www.google.com/jsapi"></script>
  <style>
  #map {position: relative; width: 100%; height: 290px; display: block; overflow: hidden;}
  #map #grid {background:url('http://dev.bonoboville.com/wp-content/themes/fullby/img/grid.gif');}
  #map .layer {position: absolute; text-align: center; }
  /*#map div {position: absolute; width:100%; height:100%;}*/
</style>
</head>
<body <?php body_class(); ?>>
    <div class="navbar navbar-inverse">
    	<div id="details" class="hidden">
    		<div class="row">
					<h2>Use This</h2>
		</div>
</div>
     <div class="row">
        <div class="navbar-header">
        	<div id="mainmenu" class="collapse navbar-collapse col-md-3">
<!-- <div id="hello" style="position:absolute;right:0; top:0; color:#fff; text-transform:uppercase; cursor:pointer; height:30px; line-height:30px; display:block;"><i class="icon-menu"></i> menu</div> -->
          <?php /* Primary navigation */
			wp_nav_menu( array(
			  'theme_location' => 'primary',
			  'container' => false,
			  'menu_class' => 'nav navbar-nav alignright',
			  //Process nav menu using our custom nav walker
			  'walker' => new wp_bootstrap_navwalker())
			);
			?>

				<div class="search-cont col-md-3 alignright" style="clear:both; max-height:30px;">
					<?php // display_search_box(DISPLAY_RESULTS_CUSTOM); ?>	
				</div>

        </div>
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainmenu">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <button type="button" class="navbar-toggle for-submenu" data-toggle="collapse" data-target="#submenu">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php if (bp_is_directory() && bp_is_activity_component()){
          			echo '#';
					} else {
				  echo home_url(); }; ?>">
		 	<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/bonoboville-skinny-logo.png"></a>
        
        
        <!--/.nav-collapse -->
                <div  id="submenu" class="collapse navbar-collapse">
          <?php /* Primary navigation */
			wp_nav_menu( array(
			  'theme_location' => 'secondary',
			  'container' => false,
			  'menu_class' => 'nav navbar-nav',
			  //Process nav menu using our custom nav walker
			  'walker' => new wp_bootstrap_navwalker())
			);
			?>

	        
        </div>
        </div><!--/.nav-collapse -->

    </div>
    </div>
     <!-- <div class="row spacer"></div> -->
    <?php if (bp_is_activity_directory()) { ?>
    
    		
	    	 <div class="row featured loading">
	    	 	<div class="slider">
					<?php $specialPosts = new WP_Query();
					$specialPosts->query('tag=featured&showposts=4'); ?>
					
					<?php if ($specialPosts->have_posts()) : while($specialPosts->have_posts()) : $specialPosts->the_post(); ?>

					    <?php $specialPosts = new WP_Query();
					$specialPosts->query('tag=featured&showposts=4'); ?>
					
					<?php if ($specialPosts->have_posts()) : while($specialPosts->have_posts()) : $specialPosts->the_post(); ?>

					    <div class="col-sm-4 col-xs-6 col-md-3 item-featured item">
					    
					    	
							<a href="<?php the_permalink(); ?>">

					    		<div class="caption">
						    		<div class="cat"><span><?php $category = get_the_category(); echo $category[0]->cat_name; ?></span></div>
						    		<div class="date"><i class="fa fa-clock-o"></i> <?php the_time('j M , Y') ?> &nbsp;
						    		
						    			<?php 
										$video = get_post_meta($post->ID, 'fullby_video', true );
										
										if($video != '') { ?>
						             			
						             		<i class="fa fa-video-camera"></i> Video
						             			
						             	<?php } else if (strpos($post->post_content,'[gallery') !== false) { ?>
						             			
						             		<i class="fa fa-th"></i> Gallery

					             		<?php } else {?>

					             		<?php } ?>

						    		
						    		</div>
						    		
						    		<h2 class="title"><?php the_title(); ?></h2>
						    		
					    		</div>

				                <?php $video = get_post_meta($post->ID, 'fullby_video', true );
					  
								if($video != '') {?>
					
									 <img class="yt-featured" src="http://img.youtube.com/vi/<?php echo $video ?>/hqdefault.jpg" class="grid-cop"/>
										
								<?php 				                 
				           
				             	} else if ( has_post_thumbnail() ) { ?>
									<?php the_post_thumbnail('quad', array('class' => 'quad')); ?>
				                <?php } ?>
						    	
						    </a>
						
						</div>
					
					<?php endwhile;  else : ?>

						<p>Sorry, no posts matched your criteria.</p>

					<?php endif; ?>	
					
			<div class="item" id="map">
				<div class="layer" style="width:1920px; height:400px;" id="grid"> </div>
				<img src="http://placehold.it/200" class="layer">
				<div class="layer" style="width:400px; height:400px; text-align:center;"><p>hello</p></div>
			</div>
				 	<?php wp_reset_query(); ?> 
					<?php $nextNewPosts = new WP_Query();
					$nextNewPosts->query('tag=featured&showposts=4'); ?>
					
					<?php if ($nextNewPosts->have_posts()) : while($nextNewPosts->have_posts()) : $nextNewPosts->the_post(); ?>

					    <div class="col-sm-4 col-xs-6 col-md-3 item-featured item">
					    
					    	
							<a href="<?php the_permalink(); ?>">

					    		<div class="caption">
						    		<div class="cat"><span><?php $category = get_the_category(); echo $category[0]->cat_name; ?></span></div>
						    		<div class="date"><i class="fa fa-clock-o"></i> <?php the_time('j M , Y') ?> &nbsp;
						    		
						    			<?php 
										$video = get_post_meta($post->ID, 'fullby_video', true );
										
										if($video != '') { ?>
						             			
						             		<i class="fa fa-video-camera"></i> Video
						             			
						             	<?php } else if (strpos($post->post_content,'[gallery') !== false) { ?>
						             			
						             		<i class="fa fa-th"></i> Gallery

					             		<?php } else {?>

					             		<?php } ?>

						    		
						    		</div>
						    		
						    		<h2 class="title"><?php the_title(); ?></h2>
						    		
					    		</div>

				                <?php $video = get_post_meta($post->ID, 'fullby_video', true );
					  
								if($video != '') {?>
					
									 <img class="yt-featured" src="http://img.youtube.com/vi/<?php echo $video ?>/hqdefault.jpg" class="grid-cop"/>
										
								<?php 				                 
				           
				             	} else if ( has_post_thumbnail() ) { ?>
									<?php the_post_thumbnail('quad', array('class' => 'quad')); ?>
				                <?php } ?>
						    	
						    </a>
						
						</div>
					
					<?php endwhile;  else : ?>

						<p>Sorry, no posts matched your criteria.</p>

					<?php endif; ?>	

					
			</div> <!-- end wrap -->
			</div> <!-- end loading -->
			<div id="sliderNav" class="text-center"><span class="btn btn-primary next" style="cursor: pointer;">Next</span>
<span class="btn btn-primary prev" style="cursor: pointer;"> Prev</span>
</div>


	<?php }  ?>
	
	<!-- <div class="navbar navbar-inverse navbar-sub">
     	<div class="row">
        <div class="navbar-header">
        		<div id="mainmenu" class="collapse navbar-collapse col-md-3">
          <?php /* Primary navigation */
			// wp_nav_menu( array(
			  // 'theme_location' => 'third',
			  // 'container' => false,
			  // 'menu_class' => 'nav navbar-nav alignright',
			  // Process nav menu using our custom nav walker
			  // 'walker' => new wp_bootstrap_navwalker())
			// );
			?>
				<div class="search-cont col-md-3 alignright" style="clear:both; max-height:30px;">
					<?php display_search_box(DISPLAY_RESULTS_CUSTOM); ?>	
				</div>

        </div>


        </div>
	</div>
	</div> -->