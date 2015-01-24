<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>RadioSuzy1</title>
    <meta name="viewport" content="width=device-width" />
    
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700|PT+Sans+Caption|Paytone+One' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?php echo plugins_url( '/assets/style.css', dirname(__FILE__) );?>">
<link rel="stylesheet" href="<?php echo plugins_url( '/assets/icos.css', dirname(__FILE__) );?>">
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script type="text/javascript" src="<?php echo plugins_url( '/assets/js/gfeedfetcher.js', dirname(__FILE__) );?>"></script>
</head>

<body>
    <div id="header"><div class="container">
       <a href="http://drsusanblock.tv/main/"><img src="<?php echo plugins_url( '/assets/images/dsb-iframe.png', dirname(__FILE__) );?>"></a>
        <ul id="nav">
        <!-- <li><a href="#" onclick="myFunction()">Open Player <i class="ico-publish"></i> </a></li> -->
        <li style="width:100% !important; clear:both;"></li>
    </ul>
   </div></div>




<div id="content">
    <!--  end radio -->

    <div class="home">
        <div style="padding:30px 0;max-width:960px; margin:0 auto;">
            <h3>Need To Talk?</h3>
            <a href="tel:3105680066">Call Us (310) 568-0066</a><br>
        <ul class="actions">
            <li>House Keeping
            <div class="message">this is the info i want you to read.</div></li>
            <li>Join Bonoboville
            <div class="message">this is the info i want you to read.</div></li>
            <li>Attend a Show
            <div class="message">this is the info i want you to read.</div></li>
            <li>Sponsors
            <div class="message">this is the info i want you to read.</div></li>
        </ul>
        </div>
    </div>

    <div class="radio">
    <div class="container">
        <div id="info">
            <div id="artwork" style="position:relative; display:inline-block;">
                <a href="#" onclick="playPause()" id="play"><i class="ico-play"></i></a>
                
                <div id="img" style="background:url('http://bloggamy.com/wp-content/uploads/2014/09/Sex-Craft_Amor_DrSuzy-Tv-180x180.jpg') no-repeat scroll center center / cover; "></div>
                <div id="advertisement" style="background:url('') repeat scroll center center / contain  rgba(0, 0, 0, 0);height:100%;width:100%;"></div>
                <div id="warningGradientOuterBarG">
                    <div id="warningGradientFrontBarG" class="warningGradientAnimationG">
                        <div class="warningGradientBarLineG"></div>
                        <div class="warningGradientBarLineG"></div>
                        <div class="warningGradientBarLineG"></div>
                        <div class="warningGradientBarLineG"></div>
                        <div class="warningGradientBarLineG"></div>
                        <div class="warningGradientBarLineG"></div>
                    </div>
                </div>
                <div style="clear:both"></div>
            </div>
            <!-- <div id="artist">
                <h1 id="hd">Listen Now</h1>
                <h2 id="dc"><a href="http://bloggamy.com" target="_new">Sky Dive Sex!</a></h2>
                <h2 id="dcc" style="display:none;"></h2>
                <h3 id="ex"><a href="http://bloggamy.com" target="_new">DSB Radio</a></h3>
                     </div> -->
                 <div id="embedcode"  style="display:none;">
                    <h1>Embed Code</h1>
                    <textarea readonly style="background: #000; color: #444; border-radius: 10px; font-size: 18px; max-width: 100%; min-width: 50%;"><iframe width="640px" height="240px" style="-webkit-border-radius: 4px; -webkit-box-shadow: 0 4px 0 #707070; -moz-border-radius: 4px; -moz-box-shadow: 0 4px 0 #707070; -o-border-radius: 4px; -o-box-shadow: 0 4px 0 #707070; border-radius: 4px; box-shadow: 0 4px 0 #707070; display: block;" frameborder="0" src="http://drsusanblock.tv/hey/player.html"></iframe></textarea></div>
            <div class='nav'>        
            <div class='next'><i class="ico-next"></i></div>
            <div class='prev unselectable'><i class="ico-previous"></i></div>
            <div id='more'><i class="ico-sharable"></i></div>

        </div>
            <div class="playlist"> <div id="artist">
                
            </div> 
        </div>

        <script type="text/javascript">
            var newcss=new gfeedfetcher("artist", "", "");
            newcss.addFeed("Bloggamy", "http://drsusanblockinstitute.com/category/phone-sex-therapy/feed/") //Specify "label" plus URL to RSS feed
            newcss.displayoptions("description label") //show the specified additional fields
            newcss.addregexp(/(\[CDATA\[)|(\]\])/g, '', 'descriptionfield')
            newcss.definetemplate("<h1 id='hd'>{label}{description}</h1><h2 id='dc'><div class='artistTXT' url='{url}'>{title}</div></h2><h2 id='dcc' style='display:none;'></h2><h3 id='ex'><a href='http://bloggamy.com' target='_new'>DSB Radio</a></h3>")
            newcss.setentrycontainer("div", "item") //Display each entry as a DIV (div element)
            newcss.filterfeed(20, "date") //Show 5 entries, sort by date
            newcss.init() //Always call this last 

            </script>





        </div>
        <div id="player"></div>
        <div id="playerAd" style="display:none;"></div>
    </div>

</div>

    

    <div class="bonobo">
    <iframe name="bonobo" frameborder="0" width="100%" height="100vh" src="1"></iframe></div>

<div class="institute">
<iframe name="insitute" frameborder="0" width="100%" height="100vh" src="1"></iframe></div>


</div>
<!--  end content -->







<div id="footer"><div class="container">
    <ul id="sites">
        <li data-uri="1"><img src="<?php echo plugins_url( '/assets/images/ico-bloggamy.png', dirname(__FILE__) );?>" alt=""></li>
        <li data-uri="2"><img src="<?php echo plugins_url( '/assets/images/ico-tv.png', dirname(__FILE__) );?>" alt=""></li>
        <li data-uri="3"><img src="<?php echo plugins_url( '/assets/images/ico-institute.png', dirname(__FILE__) );?>" alt=""></li>
        <li data-uri="4"><img src="<?php echo plugins_url( '/assets/images/ico-marketplace.png', dirname(__FILE__) );?>" alt=""></li>
        <li style="width:100% !important; clear:both;"></li>
    </ul>

</div>
</div> <!-- end of footer -->



</body>
<script>
    // playlist for songs
    var urls = new Array();
        urls[0] = '<?php echo pg_enc(); ?>';
        urls[1] = 'http://drsusanblock.com:8000/stream';
        urls[2] = 'http://drsusanblock.com:8000/stream';
        urls[3] = 'http://drsusanblock.com:8000/stream';
        urls[4] = 'http://drsusanblock.com:8000/stream';
        urls[5] = 'http://drsusanblock.com:8000/stream';
        urls[6] = 'http://drsusanblock.com:8000/stream';
        urls[7] = 'http://drsusanblock.com:8000/stream';
        urls[8] = 'http://drsusanblock.com:8000/stream';
        urls[9] = 'http://drsusanblock.com:8000/stream';
        urls[10] = 'http://drsusanblock.com:8000/stream';
        urls[11] = 'http://drsusanblock.com:8000/stream';
        urls[12] = 'http://drsusanblock.com:8000/stream';
        urls[13] = 'http://drsusanblock.com:8000/stream';
        urls[14] = 'http://drsusanblock.com:8000/stream';
        urls[15] = 'http://drsusanblock.com:8000/stream';
        urls[16] = 'http://drsusanblock.com:8000/stream';
        urls[17] = 'http://drsusanblock.com:8000/stream';
        urls[18] = 'http://drsusanblock.com:8000/stream';
        urls[19] = 'http://drsusanblock.com:8000/stream';
        urls[20] = 'http://drsusanblock.com:8000/stream';
        urls[20] = 'http://drsusanblock.com:8000/stream';
        urls[21] = 'http://drsusanblock.com:8000/stream';
        urls[22] = 'http://drsusanblock.com:8000/stream';
        urls[23] = 'http://drsusanblock.com:8000/stream';
        urls[24] = 'http://drsusanblock.com:8000/stream';
        urls[25] = 'http://drsusanblock.com:8000/stream';
        urls[26] = 'http://drsusanblock.com:8000/stream';
        urls[27] = 'http://drsusanblock.com:8000/stream';
        urls[28] = 'http://drsusanblock.com:8000/stream';
        urls[29] = 'http://drsusanblock.com:8000/stream';
        urls[30] = 'http://drsusanblock.com:8000/stream';
        urls[31] = 'http://drsusanblock.com:8000/stream';
        urls[32] = 'http://drsusanblock.com:8000/stream';
        urls[33] = 'http://drsusanblock.com:8000/stream';
        urls[34] = 'http://drsusanblock.com:8000/stream';
        urls[35] = 'http://drsusanblock.com:8000/stream';
        urls[36] = 'http://drsusanblock.com:8000/stream';
        urls[37] = 'http://drsusanblock.com:8000/stream';
        urls[38] = 'http://drsusanblock.com:8000/stream';
        urls[39] = 'http://drsusanblock.com:8000/stream';
        urls[40] = 'http://drsusanblock.com:8000/stream';

    // playlist for ads
    var adUrls = new Array();
        adUrls[0] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) );?>';
        adUrls[1] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) );?>';
        adUrls[2] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) );?>';
        adUrls[3] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) );?>';
        adUrls[4] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) );?>';
        adUrls[5] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) );?>';
        adUrls[6] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) );?>';
        adUrls[7] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) );?>';
        adUrls[8] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) );?>';
        adUrls[9] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) );?>';
        adUrls[10] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) );?>';
        adUrls[11] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) );?>';
        adUrls[12] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) );?>';
        adUrls[13] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) );?>';
        adUrls[14] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) );?>';
        adUrls[15] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) );?>';
        adUrls[16] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) );?>';
        adUrls[17] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) );?>';
        adUrls[18] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) );?>';
        adUrls[19] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) );?>';
        adUrls[20] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) );?>';
        adUrls[21] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) );?>';
        adUrls[22] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) );?>';
        adUrls[23] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) );?>';
        adUrls[24] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) );?>';
        adUrls[25] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) );?>';
        adUrls[26] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) );?>';
        adUrls[27] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) );?>';
        adUrls[28] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) );?>';
        adUrls[29] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) );?>';
        adUrls[30] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) );?>';
        adUrls[31] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) );?>';
        adUrls[32] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) );?>';
        adUrls[33] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) );?>';
        adUrls[34] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) );?>';
        adUrls[35] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) );?>';
        adUrls[36] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) );?>';
        adUrls[37] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) );?>';
        adUrls[38] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) );?>';
        adUrls[39] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) );?>';
        adUrls[40] = '<?php echo plugins_url( '/assets/songs/paul.mp3', dirname(__FILE__) );?>';    
</script>
<script>
// function myFunction() {
//     var myWindow = window.open("./player.html", "BonoboRadio", "width=640, height=240");
// }
function artistLink(which) {
    var myWindow = window.open( which , 'theFrame');
}

</script>
<script type="text/javascript" src="<?php echo plugins_url( '/assets/js/script.js', dirname(__FILE__) );?>"></script>
</html>