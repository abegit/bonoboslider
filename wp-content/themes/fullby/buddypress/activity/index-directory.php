<?php get_header(); ?>
<div class="wrap buddyb row" id="content">
	<div class="col-md-9 single">
          <?php display_gsc_results(); ?>
		<div class="col-md-9 single-in">
			<?php if (have_posts()) :?><?php while(have_posts()) : the_post(); ?> 
				<div class="sing-cont">
					<div class="sing-spacer">
						<?php the_content('Leggi...');?>
					</div>
				</div>					 					
			<?php endwhile; ?>
	        <?php else : ?>
	                <p>Sorry, no posts matched your criteria.</p>
	        <?php endif; ?> 
		</div>	
        <div class="col-md-3">
            <div class="sec-sidebar sidebar well"> <?php get_sidebar( 'primary' ); ?> </div>
         </div>
	</div>			
	<div class="col-md-3"> <div class="sidebar well"><?php get_sidebar( 'secondary' ); ?></div></div>
</div>		
<script type="text/javascript">

    var $dd = jQuery.noConflict();

        $dd(document).ready(function() {
            createDropDown();


            $dd(".selectwrap .dropdown dt").click(function() {
                //inside select wrapper only toggle ul inside wrapper
                $dd(this).closest('.selectwrap').find("dd ul").toggle();
            });

            $dd(document).bind('click', function(e) {
                var $ddclicked = $dd(e.target);
                //if you click and the parent does not have dropdown then hide dropdowns
                if (! $ddclicked.parents().hasClass("dropdown"))
                    $dd(".dropdown dd ul").hide();
            });

            $dd(".dropdown dd ul li a").click(function() {
                var text = $dd(this).html();
                var selfie = $dd(this).closest(".dropdown").attr('class').split(' ')[1];
                $dd('.dropdown.' + selfie + ' dt a').html(text);
                $dd('.dropdown.' + selfie + ' dd ul').hide();
                $dd('.dropdown.' + selfie + ' dd ul').hide();

                var source = $dd('select#' + selfie);
                source.val($dd(this).find("span.value").html())
                return false;
            });
        });

function createDropDown(){
    $dd("select").each(function() {
        var source = $dd(this);
        var selected = source.find("option[selected]");
        var options = $dd("option", source);
        var self = $dd(this).attr('id');
        $dd(this).wrap( '<div class="selectwrap ' + self + '"></div>')
        $dd(this).after('<dl class="dropdown ' + self + '"></dl>')
        $dd('.dropdown.' + self).append('<dt><a href="#">' + selected.text() + 
            '<span class="value">' + selected.val() + 
            '</span></a></dt>')
        $dd('.dropdown.' + self).append('<dd><ul class="dropdown-menu"></ul></dd>')
        options.each(function(){
            $dd('.dropdown.' + self + ' dd ul').append('<li><a href="#">' + 
                $dd(this).text() + '<span class="value">' + 
                $dd(this).val() + '</span></a></li>');
        });
    });
}
</script>

<?php get_footer(); ?>