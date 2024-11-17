<?php
$GLOBALS['_ta_campaign_key'] = 'CAMPAIGN_KEY';
$GLOBALS['_ta_debug_mode'] = false; //To enable debug mode, set to true or load this script with a '?debug_key=9cffdaf69f3ab98ab959bf623951134c' parameter

require 'bootloader.php';
/*require 'detectbot.php';

if(isBot()) {
    http_response_code(403);
    die('Forbidden');
}*/

$campaign_id = 'CAMPAIGN_ID';

$ta = new TALoader($campaign_id);


if ($ta->suppress_response()) {//Do not send any output when hybrid mode is enabled and a visitor is being filtered (after hybrid page was generated)
    exit;
}

$response = $ta->get_response();
$visitor = $ta->get_visitor();

/*
 * Advanced users: uncomment lines below during development to expose variables you may want to use in your custom code:
 */
//print_r($response);
//print_r($visitor);
//exit;
/*
 * Don't forget to re-comment the lines above before sending live traffic
 */

/*
Note: when using hybrid mode, please use one of our built-in functions as your final step when routing your visitors:
    print header_redirect("http://url.com"); //performs a 302 header redirect (or a window.location=xxx in JS)
    print load_fullscreen_iframe("http://url.com"); //Loads a fullscreen iframe of the specified URL
    print paste_html("http://url.com"); //Downloads HTML in specified URL and outputs it to the screen (uses JS to insert the HTML in hybrid mode)
(These functions will automatically output either regular HTML or JS code depending on what the visitor's browser is expecting)
*/

switch ($response['action']) {
    case 'header_redirect':
        print header_redirect($response['url']); //Uses <script>window.location='xxx'</script> when in hybrid mode (required behaviour)
        exit;
    case 'iframe':
        print load_fullscreen_iframe($response['url']);
        exit;
    case 'paste_html':
        $html = $response['output_html'];
        $html = preg_replace("/<!--BASE--/", "<!--BASE-->", $html);
        print paste_html($html);
        exit;
    case 'reverse_proxy':
        print reverse_proxy($response['url'], "tarp_99a1b19d758265ec165d4f277854cc2f/");
        exit;        
    /* Please be VERY CAREFUL if modifying this block: */
    case 'load_hybrid_page':
        $ta->load_hybrid_page();
        break;
    /* ...it is needed for hybrid mode to function correctly */
    default:
        print other_methods($response['url']);
        break;    
}
/*
 * Note: if using the "Remain on Fail URL" action for Filtered Visitors, append your Fail URL's HTML/PHP code after the closing PHP tag below:
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    
    <meta name="robots" content="noindex, nofollow" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta content="Lahome" property="og:title" />
    <meta content="Lahome" property="og:description" />
    <meta content="https://anchorwellnessaw.com/images/1731872541269256.1tqwGxAHqL._AC_SL1500_.jpg" property="og:image" />
    <meta content="https://anchorwellnessaw.com/" property="og:url" />
    <meta content="1000" property="og:image:width" />
    <meta content="1000" property="og:image:height" />
    <meta name="description" content="Description.">
    <!-- ss -->
    <link rel="stylesheet" href="css/styles.css">
    <!-- <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" /> -->
    <!-- <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> -->
  <!-- ss -->
  <!-- <link rel="stylesheet" href="css/style2.css"> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet"> -->
    <title>Lahome</title>
</head>
<body>
<!-- HEADER SECTION -->

    <section class="header_container_wrapper" id="header">
        <div class="header_sub_container">
            <div class="first_line_header_container">
                <span class="msg_rotator_">
                    test
                </span>
            </div>

            <div class="second_line_header_container dsktpp">
                    <div class="sub_firstline_search_container">
                        <div class="logo_container">
                            <a href="/" class="logo_link"> <img src="images/logo.png" alt="" class="damart_logo"> </a>
                        </div>
                        <div class="search_container">
                            <input type="text" class="search_test">
                            <svg class="svg_srch" xmlns="http://www.w3.org/2000/svg" width="25px" height="20px"><path d="M5.95 0a5.95 5.95 0 0 1 4.673 9.634l3.172 3.171a.7.7 0 1 1-.99.99l-3.17-3.172A5.95 5.95 0 1 1 5.95 0Zm0 1.4a4.55 4.55 0 1 0 3.204 7.78l.011-.015A4.52 4.52 0 0 0 10.5 5.95 4.55 4.55 0 0 0 5.95 1.4Z" fill="#E81511" fill-rule="nonzero"/></svg>
                        </div>
                        <div class="icons_header_container">
                            <a href="" class="first_ico_link">
                                <svg width="19" height="28" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><path d="M8.36 10.593a.548.548 0 0 0-.135.02l-1.743.48a.554.554 0 0 0-.2.104l-2.58 2.09a.588.588 0 0 0-.118.776l1.174 1.787a.55.55 0 0 0 .78.151l.53-.374v5.39c0 .318.25.576.56.576h5.72c.308 0 .559-.258.559-.577V15.63l.54.384a.55.55 0 0 0 .784-.155l1.163-1.799a.588.588 0 0 0-.12-.773l-2.58-2.089a.554.554 0 0 0-.202-.104l-1.743-.48c-.436-.041-.538.22-.733.283-.13.04-.33.07-.53.07-.198 0-.398-.03-.528-.07-.228-.028-.268-.302-.597-.303Zm-.145 1.215c.135.09.28.148.421.192.271.084.56.118.85.118.291 0 .58-.034.851-.118.142-.044.287-.102.422-.191l1.333.367 2.083 1.688-.56.867-.95-.674c-.37-.263-.877.01-.877.474v5.91H7.187v-5.91c0-.464-.505-.737-.877-.475l-.941.667-.566-.862 2.08-1.685 1.332-.368Z" fill="#E12127" fill-rule="nonzero"/><path stroke="#595A5B" stroke-linecap="round" stroke-linejoin="round" d="M1 10.861V4.365h17.192v22.783H1V12.306"/><path stroke="#595A5B" stroke-linejoin="round" d="M1 4.365 17.089 1v3.365"/></g></svg>
                                Quick Order
                            </a>
                            <a href="" class="first_ico_link">
                                <svg width="16" height="27" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><path d="M9.57 9.94c-.964 1.021-2.694 1.117-3.855.215-.238-.186-.592-.166-.787.043-.2.209-.165.528.074.713.817.636 1.836.92 2.82.865.984-.054 1.933-.448 2.612-1.167.196-.208.163-.527-.075-.712-.239-.185-.591-.166-.788.043Z" fill="#E21F26"/><path d="M2.112 6.767a5.972 5.972 0 0 1 6.32-5.588 5.97 5.97 0 0 1 5.587 6.319A5.971 5.971 0 0 1 7.7 13.086a6.008 6.008 0 0 1-1.261-.217.628.628 0 0 0-.126-.04c-2.57-.792-4.373-3.262-4.2-6.062Zm8.421 7.225c3.259 1.777 4.723 7.383 3.8 11.09l-13.093-.14c-.188-1.776.185-5.462.827-6.969.704-1.655 2.114-3.04 4.19-4.123a7.342 7.342 0 0 0 4.006-.111c.06.101.15.187.27.253Zm1.166-.725a7.13 7.13 0 0 0 3.486-5.697c.24-3.925-2.757-7.316-6.682-7.557C4.578-.227 1.189 2.77.947 6.695a7.142 7.142 0 0 0 3.669 6.679c-1.692 1.08-2.906 2.424-3.618 4.004-.825 1.833-1.249 6.31-.84 8.202.066.31.342.547.658.568l13.786.209h.003a.732.732 0 0 0 .722-.485c1.299-3.92-.051-10.205-3.628-12.605Z" fill="#5F5E56"/></g></svg>
                                Login
                            </a>
                            <a href="" class="first_ico_link">
                                <svg width="18" height="26" xmlns="http://www.w3.org/2000/svg"><path d="M9.454 0a4.698 4.698 0 0 1 4.692 4.692v1.534c1.123.297 1.945 1.219 1.945 2.309l1.326 14.533c0 1.33-1.221 2.41-2.721 2.41H2.72c-1.5 0-2.721-1.08-2.721-2.41L1.325 8.535c0-1.21 1.013-2.211 2.326-2.382a4.674 4.674 0 0 1 1.428-3.14A4.695 4.695 0 0 1 9.454 0Zm2.904 7.089H4.302v1.133c.432.135.747.534.745 1.009a1.055 1.055 0 0 1-1.054 1.047 1.051 1.051 0 0 1-.354-2.042v-1.1c-.703.161-1.225.726-1.225 1.399L1.088 23.068c0 .798.733 1.447 1.633 1.447h11.975c.9 0 1.633-.65 1.633-1.447L15.002 8.535c0-.798-.732-1.446-1.632-1.446h-.348v1.165c.38.162.646.54.644.977a1.055 1.055 0 0 1-1.054 1.047 1.05 1.05 0 0 1-.75-.313 1.053 1.053 0 0 1 .495-1.76V7.09ZM9.06 13.81c.457.028.707.417.568.915l-.664 2.39 4.353-1.874c.222-.088.418-.013.483.09.094.152.065.393-.198.544l-5.877 3.63a.884.884 0 0 1-.466.129c-.444 0-.711-.386-.592-.84l.763-2.75s-3.386 1.24-3.55 1.284c-.191.052-.328-.017-.372-.14-.046-.127-.002-.283.203-.41.153-.107 4.918-2.859 4.918-2.859a.865.865 0 0 1 .43-.109ZM3.994 9.033a.192.192 0 0 0-.193.19.192.192 0 0 0 .19.193.192.192 0 0 0 .003-.383Zm8.619 0a.192.192 0 0 0-.137.326.188.188 0 0 0 .135.057l.051-.007a.192.192 0 0 0 .141-.183.192.192 0 0 0-.19-.193ZM9.454.664a4.022 4.022 0 0 0-3.118 1.483 4.656 4.656 0 0 1 1.994-.452 4.694 4.694 0 0 1 4.68 4.429h.36c.037 0 .074.004.112.005V4.692A4.032 4.032 0 0 0 9.454.664ZM4.772 4.506a4.002 4.002 0 0 0-.456 1.618h.446V4.692c0-.063.007-.124.01-.186ZM8.33 2.359a4.006 4.006 0 0 0-2.686 1.035c-.14.408-.22.844-.22 1.298v1.432h6.92a4.03 4.03 0 0 0-4.014-3.765Z" fill="#1CBB27" fill-rule="evenodd"/></svg>                                My Bag
                            </a>
                            <a href="" class="first_ico_">
                                <i class="fa fa-list"></i>
                            </a>

                        </div>
                    </div>
            </div>

            <div class="mobile_wrapper_container">
                <div class="first_line_mb_wrp">
                    <div class="left_side_logo_mbb">
                        <a href="" class="first_ico_link_mb"></a>
                            <i class="fa fa-list"></i>
                        </a>
                        <a href="/" class="loog_rdt"><img src="images/logo.png" alt="" class="logo_side_img_cnt"></a>
                        
                    </div>
                    <div class="right_side_logo_mbb">
                        <div class="icons_header_container">
                            <a href="" class="first_ico_link_mb">
                                <svg width="19" height="28" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><path d="M8.36 10.593a.548.548 0 0 0-.135.02l-1.743.48a.554.554 0 0 0-.2.104l-2.58 2.09a.588.588 0 0 0-.118.776l1.174 1.787a.55.55 0 0 0 .78.151l.53-.374v5.39c0 .318.25.576.56.576h5.72c.308 0 .559-.258.559-.577V15.63l.54.384a.55.55 0 0 0 .784-.155l1.163-1.799a.588.588 0 0 0-.12-.773l-2.58-2.089a.554.554 0 0 0-.202-.104l-1.743-.48c-.436-.041-.538.22-.733.283-.13.04-.33.07-.53.07-.198 0-.398-.03-.528-.07-.228-.028-.268-.302-.597-.303Zm-.145 1.215c.135.09.28.148.421.192.271.084.56.118.85.118.291 0 .58-.034.851-.118.142-.044.287-.102.422-.191l1.333.367 2.083 1.688-.56.867-.95-.674c-.37-.263-.877.01-.877.474v5.91H7.187v-5.91c0-.464-.505-.737-.877-.475l-.941.667-.566-.862 2.08-1.685 1.332-.368Z" fill="#E12127" fill-rule="nonzero"/><path stroke="#595A5B" stroke-linecap="round" stroke-linejoin="round" d="M1 10.861V4.365h17.192v22.783H1V12.306"/><path stroke="#595A5B" stroke-linejoin="round" d="M1 4.365 17.089 1v3.365"/></g></svg>
                            </a>
                            <a href="" class="first_ico_link_mb">
                                <svg width="16" height="27" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><path d="M9.57 9.94c-.964 1.021-2.694 1.117-3.855.215-.238-.186-.592-.166-.787.043-.2.209-.165.528.074.713.817.636 1.836.92 2.82.865.984-.054 1.933-.448 2.612-1.167.196-.208.163-.527-.075-.712-.239-.185-.591-.166-.788.043Z" fill="#E21F26"/><path d="M2.112 6.767a5.972 5.972 0 0 1 6.32-5.588 5.97 5.97 0 0 1 5.587 6.319A5.971 5.971 0 0 1 7.7 13.086a6.008 6.008 0 0 1-1.261-.217.628.628 0 0 0-.126-.04c-2.57-.792-4.373-3.262-4.2-6.062Zm8.421 7.225c3.259 1.777 4.723 7.383 3.8 11.09l-13.093-.14c-.188-1.776.185-5.462.827-6.969.704-1.655 2.114-3.04 4.19-4.123a7.342 7.342 0 0 0 4.006-.111c.06.101.15.187.27.253Zm1.166-.725a7.13 7.13 0 0 0 3.486-5.697c.24-3.925-2.757-7.316-6.682-7.557C4.578-.227 1.189 2.77.947 6.695a7.142 7.142 0 0 0 3.669 6.679c-1.692 1.08-2.906 2.424-3.618 4.004-.825 1.833-1.249 6.31-.84 8.202.066.31.342.547.658.568l13.786.209h.003a.732.732 0 0 0 .722-.485c1.299-3.92-.051-10.205-3.628-12.605Z" fill="#5F5E56"/></g></svg>
                                
                            </a>
                            <a href="" class="first_ico_link_mb">
                                <svg width="18" height="26" xmlns="http://www.w3.org/2000/svg"><path d="M9.454 0a4.698 4.698 0 0 1 4.692 4.692v1.534c1.123.297 1.945 1.219 1.945 2.309l1.326 14.533c0 1.33-1.221 2.41-2.721 2.41H2.72c-1.5 0-2.721-1.08-2.721-2.41L1.325 8.535c0-1.21 1.013-2.211 2.326-2.382a4.674 4.674 0 0 1 1.428-3.14A4.695 4.695 0 0 1 9.454 0Zm2.904 7.089H4.302v1.133c.432.135.747.534.745 1.009a1.055 1.055 0 0 1-1.054 1.047 1.051 1.051 0 0 1-.354-2.042v-1.1c-.703.161-1.225.726-1.225 1.399L1.088 23.068c0 .798.733 1.447 1.633 1.447h11.975c.9 0 1.633-.65 1.633-1.447L15.002 8.535c0-.798-.732-1.446-1.632-1.446h-.348v1.165c.38.162.646.54.644.977a1.055 1.055 0 0 1-1.054 1.047 1.05 1.05 0 0 1-.75-.313 1.053 1.053 0 0 1 .495-1.76V7.09ZM9.06 13.81c.457.028.707.417.568.915l-.664 2.39 4.353-1.874c.222-.088.418-.013.483.09.094.152.065.393-.198.544l-5.877 3.63a.884.884 0 0 1-.466.129c-.444 0-.711-.386-.592-.84l.763-2.75s-3.386 1.24-3.55 1.284c-.191.052-.328-.017-.372-.14-.046-.127-.002-.283.203-.41.153-.107 4.918-2.859 4.918-2.859a.865.865 0 0 1 .43-.109ZM3.994 9.033a.192.192 0 0 0-.193.19.192.192 0 0 0 .19.193.192.192 0 0 0 .003-.383Zm8.619 0a.192.192 0 0 0-.137.326.188.188 0 0 0 .135.057l.051-.007a.192.192 0 0 0 .141-.183.192.192 0 0 0-.19-.193ZM9.454.664a4.022 4.022 0 0 0-3.118 1.483 4.656 4.656 0 0 1 1.994-.452 4.694 4.694 0 0 1 4.68 4.429h.36c.037 0 .074.004.112.005V4.692A4.032 4.032 0 0 0 9.454.664ZM4.772 4.506a4.002 4.002 0 0 0-.456 1.618h.446V4.692c0-.063.007-.124.01-.186ZM8.33 2.359a4.006 4.006 0 0 0-2.686 1.035c-.14.408-.22.844-.22 1.298v1.432h6.92a4.03 4.03 0 0 0-4.014-3.765Z" fill="#1CBB27" fill-rule="evenodd"/></svg>  
                            </a>
                            

                        </div>  
                    </div>
                </div>
                <div class="second_line_mb_wrp">
                    <input type="text" class="srch_inpt_mb">
                    <svg class="svg_srch_mb" xmlns="http://www.w3.org/2000/svg" width="25px" height="20px"><path d="M5.95 0a5.95 5.95 0 0 1 4.673 9.634l3.172 3.171a.7.7 0 1 1-.99.99l-3.17-3.172A5.95 5.95 0 1 1 5.95 0Zm0 1.4a4.55 4.55 0 1 0 3.204 7.78l.011-.015A4.52 4.52 0 0 0 10.5 5.95 4.55 4.55 0 0 0 5.95 1.4Z" fill="#E81511" fill-rule="nonzero"/></svg>

                </div>
            </div>

            <div class="third_line_header_container">
                <div class="sub_thirdline_cont">
                    <a href="" class="nav_link_new">New In</a>
                    <a href="" class="nav_link_new">Christmas Shop</a>
                    <a href="" class="nav_link_new">Womens</a>
                    <a href="" class="nav_link_new">Mens</a>
                    <a href="" class="nav_link_new">Lingerie & Nightwear</a>
                    <a href="" class="nav_link_new">Footwear</a>
                    <a href="" class="nav_link_new">Home & Garden</a>
                    <a href="" class="nav_link_new bld">Thermals</a>
                    <a href="" class="nav_link_new bld">Brands</a>
                    <a href="" class="nav_link_new clearance">Clearance</a>
                </div>
            </div>

        </div>
    </section>

 <!-- MAIN SECTION -->
   
    <section class="main_container_wrapper">
        <div class="sub_wrapper_container_main">
            <div class="first_row_nav_bar_">
                <a href="/" class="home_link_nv_main">Home</a> <i class="fa fa-angle-right"> </i>
                <a href="" class="home_link_nv_main">Product</a> 
            </div>

            <div class="second_row_carousel_container_main">
                <div id="productCarousel" class="carousel_ slide_ carousel-fade_ col-xl-6_">
                    <div class="carousel-indicators-wrapper">
                      <div class="up_btn" style="text-align: center;"><i class="fa fa-angle-up"></i></div>
                      <ol class="carousel-indicators list-inline">
                        <li class="list-inline-item active">
	                            <a id="carousel-selector-0" data-slide-to="0" data-target="#productCarousel">
					<img alt="b1" src="images/1731872541269256.1tqwGxAHqL._AC_SL1500_.jpg" class="img-fluid">
				    </a>
				 </li>
<li class="list-inline-item ">
	                            <a id="carousel-selector-1" data-slide-to="1" data-target="#productCarousel">
					<img alt="b2" src="images/1731872542999929.1RJQMEyR9L._AC_SL1500_.jpg" class="img-fluid">
				    </a>
				 </li>
<li class="list-inline-item ">
	                            <a id="carousel-selector-2" data-slide-to="2" data-target="#productCarousel">
					<img alt="b3" src="images/1731872542760050.1+CsIKFTHL._AC_SL1500_.jpg" class="img-fluid">
				    </a>
				 </li>
<li class="list-inline-item ">
	                            <a id="carousel-selector-3" data-slide-to="3" data-target="#productCarousel">
					<img alt="b4" src="images/1731872542423696.1XlX5YOJyL._AC_SL1500_.jpg" class="img-fluid">
				    </a>
				 </li>
<li class="list-inline-item ">
	                            <a id="carousel-selector-4" data-slide-to="4" data-target="#productCarousel">
					<img alt="b5" src="images/1731872542779129.10Efx5K2IL._AC_SL1500_.jpg" class="img-fluid">
				    </a>
				 </li>
<li class="list-inline-item ">
	                            <a id="carousel-selector-5" data-slide-to="5" data-target="#productCarousel">
					<img alt="b6" src="images/1731872542829532.1MfoaOB01L._AC_SL1500_.jpg" class="img-fluid">
				    </a>
				 </li>
<li class="list-inline-item ">
	                            <a id="carousel-selector-6" data-slide-to="6" data-target="#productCarousel">
					<img alt="b7" src="images/1731872542661373.1c42npTRQL._AC_SL1500_.jpg" class="img-fluid">
				    </a>
				 </li>
                      </ol>
                      <div class="down_btn" style="text-align: center;"><i class="fa fa-angle-down"></i></div>
                    </div>
                    <div class="carousel-inner"><div class="carousel-item active"><img height="480" alt="b1" src="images/1731872541269256.1tqwGxAHqL._AC_SL1500_.jpg"></div>
<div class="carousel-item "><img height="480" alt="b2" src="images/1731872542999929.1RJQMEyR9L._AC_SL1500_.jpg"></div>
<div class="carousel-item "><img height="480" alt="b3" src="images/1731872542760050.1+CsIKFTHL._AC_SL1500_.jpg"></div>
<div class="carousel-item "><img height="480" alt="b4" src="images/1731872542423696.1XlX5YOJyL._AC_SL1500_.jpg"></div>
<div class="carousel-item "><img height="480" alt="b5" src="images/1731872542779129.10Efx5K2IL._AC_SL1500_.jpg"></div>
<div class="carousel-item "><img height="480" alt="b6" src="images/1731872542829532.1MfoaOB01L._AC_SL1500_.jpg"></div>
<div class="carousel-item "><img height="480" alt="b7" src="images/1731872542661373.1c42npTRQL._AC_SL1500_.jpg"></div></div>
                </div>
                
                <div class="right_side_product_main">
                    <div class="product_name">
                        Lahome Checkered Easy
                    </div>
                    <div class="productref">
                        <div class="left_side_prdt">
                            Product Ref : B8544W
                        </div>
                        <div class="starts_container">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <div class="links_rv_wrt">
                            <a href="" class="reviews_link">2 Reviews</a>
                            <a href="" class="reviews_link">Write a Review</a>
                        </div>
                    </div>
                    <div class="prgrph_descriptif">
                        <li> Neutral Easy Jute Rug: Get a magic of a long lasting rug in the look of natural jute with our Easy Jute rugs. (Not actually made from jute) Made of safe polyester that is not easy to crack, without scratching, shedding, or fraying with time </li>
<li> Modern Checkered Rug: Showcasing checkerboard in black and natural colors, purposely distressed and faded geometric checkerboard design, it makes a great option for anchoring modern farmhouse aesthetics </li>
<li> Note: Our rug comes in a small package, which may be some creases at the beginning. Unroll it or place heavy books on them for a few days to hold down. Pet paws may hook into the threads of the woven rug </li>
<li> Non Slip and Safe Rug: Designed with TPE backing that is slip assistance, helpful to keep the carpet griping the floor, thus enhancing safety. Safe enough for children and pets to play at home (Place on a clean and dry floor recommended.) </li>
<li> Easy to Clean: Use hose, broom or vacuum cleaner to clean dust, dirt or debris regularly. Also, can being wash in cold water on a gentle cycle, and recommend to air dry after using the washing machine. Washable polyester fibers let those who love the natural look of jute enjoy clean easily </li>
<li> Functional Rug: Checkered rug lends a sense of simplicity and comfort to your patio, hallway, entryway, kitchen, bedroom, camping, laundry room, RV, front door, living room, dining room, sunroom, deck, courtyard, or more indoor/outdoor rooms, creating a warm appearance </li>
<li> Low Pile and Non Shedding Thin Rug: Without pile or fluffy, sleek surface great for high traffic areas and will not obstruct doorways </li>
                     <a href="" class="read_more_">Read more</a>
                    </div>
                    
                    <div class="price_container_">
                        <div class="first_price_">
                            $1.27
                        </div>
                        <div class="second_price_">
                            <span class="price_container">$11.41
                            </span>
                            <span class="promotion_container">
                                Up to
                                <strong class="prcc">-50%</strong>
                            </span>
                        </div>
                    </div>
                    
                    <div class="colorpicker">
                        <div class="firstline_">
                            <strong class="bldd">Colour</strong>
                            <span class="tn__"></span>
                        </div>
                        <div class="second_line_picker">
                            <span class="color_picker_circle">
                                <span class="color_pck">
    
                                </span>  
                            </span>
                        </div>
    
                        <div class="size_container__">
                            <div class="left_container_size">
                                <strong class="bldd">Size</strong>
                                <span class="tn__" style="margin-left: 10px;"> Extra Long XL</span>
                            </div>
                            <a href="#" class="size_guide">Size guide</a>
                        </div>   
    
                        <div class="instock">
                            <i class="fa fa-circle"></i>
                            In Stock
                        </div>
    
                        
                    </div>
                    
                    <div class="qty_container">
                        <div class="left_side_qty">
                            <div class="header_qty__">
                                Qty
                            </div>
                            <div class="select_cont">
                                <select name="" id="qty_size">
                                    <option value="">1</option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                    <option value="">4</option>
                                </select>
                            </div>
                        </div>
                        <div class="right_side_qty">
                            <a href="checkout.html" class="addto_bag" style="margin-top: 0px;">
                                <svg width="18" height="26" xmlns="http://www.w3.org/2000/svg"><path d="M9.454 0a4.698 4.698 0 0 1 4.692 4.692v1.534c1.123.297 1.945 1.219 1.945 2.309l1.326 14.533c0 1.33-1.221 2.41-2.721 2.41H2.72c-1.5 0-2.721-1.08-2.721-2.41L1.325 8.535c0-1.21 1.013-2.211 2.326-2.382a4.674 4.674 0 0 1 1.428-3.14A4.695 4.695 0 0 1 9.454 0Zm2.904 7.089H4.302v1.133c.432.135.747.534.745 1.009a1.055 1.055 0 0 1-1.054 1.047 1.051 1.051 0 0 1-.354-2.042v-1.1c-.703.161-1.225.726-1.225 1.399L1.088 23.068c0 .798.733 1.447 1.633 1.447h11.975c.9 0 1.633-.65 1.633-1.447L15.002 8.535c0-.798-.732-1.446-1.632-1.446h-.348v1.165c.38.162.646.54.644.977a1.055 1.055 0 0 1-1.054 1.047 1.05 1.05 0 0 1-.75-.313 1.053 1.053 0 0 1 .495-1.76V7.09ZM9.06 13.81c.457.028.707.417.568.915l-.664 2.39 4.353-1.874c.222-.088.418-.013.483.09.094.152.065.393-.198.544l-5.877 3.63a.884.884 0 0 1-.466.129c-.444 0-.711-.386-.592-.84l.763-2.75s-3.386 1.24-3.55 1.284c-.191.052-.328-.017-.372-.14-.046-.127-.002-.283.203-.41.153-.107 4.918-2.859 4.918-2.859a.865.865 0 0 1 .43-.109ZM3.994 9.033a.192.192 0 0 0-.193.19.192.192 0 0 0 .19.193.192.192 0 0 0 .003-.383Zm8.619 0a.192.192 0 0 0-.137.326.188.188 0 0 0 .135.057l.051-.007a.192.192 0 0 0 .141-.183.192.192 0 0 0-.19-.193ZM9.454.664a4.022 4.022 0 0 0-3.118 1.483 4.656 4.656 0 0 1 1.994-.452 4.694 4.694 0 0 1 4.68 4.429h.36c.037 0 .074.004.112.005V4.692A4.032 4.032 0 0 0 9.454.664ZM4.772 4.506a4.002 4.002 0 0 0-.456 1.618h.446V4.692c0-.063.007-.124.01-.186ZM8.33 2.359a4.006 4.006 0 0 0-2.686 1.035c-.14.408-.22.844-.22 1.298v1.432h6.92a4.03 4.03 0 0 0-4.014-3.765Z" fill="white" fill-rule="evenodd"></path></svg>
                                Buy It Now
                            </a>
                        </div>
                    </div>
                </div>

              

           
        </div>

        <div class="sub_wrapper_container_second_main">
            <div class="left_side_container_second_main">
                <div class="first_line_description_cont">
                    Description
                </div>
                <div class="pr_content_description">
                    <li> Neutral Easy Jute Rug: Get a magic of a long lasting rug in the look of natural jute with our Easy Jute rugs. (Not actually made from jute) Made of safe polyester that is not easy to crack, without scratching, shedding, or fraying with time </li>
<li> Modern Checkered Rug: Showcasing checkerboard in black and natural colors, purposely distressed and faded geometric checkerboard design, it makes a great option for anchoring modern farmhouse aesthetics </li>
<li> Note: Our rug comes in a small package, which may be some creases at the beginning. Unroll it or place heavy books on them for a few days to hold down. Pet paws may hook into the threads of the woven rug </li>
<li> Non Slip and Safe Rug: Designed with TPE backing that is slip assistance, helpful to keep the carpet griping the floor, thus enhancing safety. Safe enough for children and pets to play at home (Place on a clean and dry floor recommended.) </li>
<li> Easy to Clean: Use hose, broom or vacuum cleaner to clean dust, dirt or debris regularly. Also, can being wash in cold water on a gentle cycle, and recommend to air dry after using the washing machine. Washable polyester fibers let those who love the natural look of jute enjoy clean easily </li>
<li> Functional Rug: Checkered rug lends a sense of simplicity and comfort to your patio, hallway, entryway, kitchen, bedroom, camping, laundry room, RV, front door, living room, dining room, sunroom, deck, courtyard, or more indoor/outdoor rooms, creating a warm appearance </li>
<li> Low Pile and Non Shedding Thin Rug: Without pile or fluffy, sleek surface great for high traffic areas and will not obstruct doorways </li>
                </div>
            </div>
            <!-- <div class="left_side_container_second_main fdfddfd" >
                <div class="first_line_description_cont">
                    Composition
                </div>
                
            </div> -->
        </div>

        <div class="customer_review_container_wrapper">
            <div class="first_line_customer_review">
                <div class="first_line__rv">
                    Customer Reviews
                </div>
                <div class="stars_container_review">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <span class="number_rv">
                        5.0/5
                    </span>
                </div>
            </div>
            <div class="second_line_customer_review">
                <div class="left_side_customer_rvv_sc">
                    Reviewed by 75 Customers
                </div>
                <div class="right_side_customer_review_sc">
                    <select name="" id="" class="rv_slct">
                        <option value="" class="rvop">MOST RECENT</option>
                    </select>
                </div>
            </div>
            <div class="third_line_customer_review_sctn">
                <div class="first_line_sub_customer_rv_client">
                    <div class="stars_container_customer_rv">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <span class="box_number_stars">
                            3
                        </span>
                    </div>
                    <div class="rv_title_customer">
                        I would definitely repurchase this product; it works wonders!
                    </div>
                </div>
                <div class="second_line_sub_customer_rv_client">
                    <div class="left_side_customer_rv_second_line_client">
                        <div class="first_line_cstm_rv_sc_li">
                            Comments about Lahome Checkered Easy 
                        </div>
                        <div class="second_line_cstm_rv_sc_li">
                            I wasnt sure if it would live up to the high expectations I had set for it
                        </div>

                    </div>
                    <div class="right_side_customer_rv_second_line_client">
                        <div class="first_line_cstm_rv_sc_li_right">
                            <strong class="bldlldld">Submitted</strong> 7 months ago                       
                         </div>
                        <div class="second_line_cstm_rv_sc_li_right">
                            <strong class="bldlldld">By</strong> Mateo Chemicals
                        </div>
                        <div class="second_line_cstm_rv_sc_li_right">
                            <strong class="bldlldld">From</strong> Undisclosed
                        </div>
                        <div class="verifiedBuyer">
                            <i class="fa fa-check"></i>
                            Verified Buyer
                        </div>
                    </div>
                    
                </div>
                <div class="third_line_sub_customer_rv_client">
                    <div class="first__side__cst_rv_thrd">
                        Was this review helpful to you?
                    </div>
                    <div class="like_container__">
                        <span class="like__">
                            <i class="fa fa-thumbs-up"></i>
                            10
                        </span>
                        <span class="dislike__">
                            <i class="fa fa-thumbs-down"></i>
                            0
                        </span>
                    </div>
                    <a href="" class="flagthis_">
                        Flag this review
                    </a>
                </div>
                <div class="end_line_sub_customer_rv_client">
                    <div class="first_container_displayingreview">
                        Displaying Review <strong>1-1</strong>
                    </div>
                    <a href="
                    " class="backTop">
                Back to Top</a>
                </div>
            </div>
            <div class="third_line_customer_review_sctn">
                <div class="first_line_sub_customer_rv_client">
                    <div class="stars_container_customer_rv">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <span class="box_number_stars">
                            3

                        </span>
                    </div>
                    <div class="rv_title_customer">
                        Id buy this again in a heartbeat; its made such a difference!
                    </div>
                </div>
                <div class="second_line_sub_customer_rv_client">
                    <div class="left_side_customer_rv_second_line_client">
                        <div class="first_line_cstm_rv_sc_li">
                            Comments about Lahome Checkered Easy 

                        </div>
                        <div class="second_line_cstm_rv_sc_li">
                            The design is amazing. 
                        </div>

                    </div>
                    <div class="right_side_customer_rv_second_line_client">
                        <div class="first_line_cstm_rv_sc_li_right">
                            <strong class="bldlldld">Submitted</strong> 5 months ago                       
                         </div>
                        <div class="second_line_cstm_rv_sc_li_right">
                            <strong class="bldlldld">By</strong> Levi Chemicals
                        </div>
                        <div class="second_line_cstm_rv_sc_li_right">
                            <strong class="bldlldld">From</strong> Undisclosed
                        </div>
                        <div class="verifiedBuyer">
                            <i class="fa fa-check"></i>
                            Verified Buyer
                        </div>
                    </div>
                    
                </div>
                <div class="third_line_sub_customer_rv_client">
                    <div class="first__side__cst_rv_thrd">
                        Was this review helpful to you?
                    </div>
                    <div class="like_container__">
                        <span class="like__">
                            <i class="fa fa-thumbs-up"></i>
                            25
                        </span>
                        <span class="dislike__">
                            <i class="fa fa-thumbs-down"></i>
                            0
                        </span>
                    </div>
                    <a href="" class="flagthis_">
                        Flag this review
                    </a>
                </div>
                <div class="end_line_sub_customer_rv_client">
                    <div class="first_container_displayingreview">
                        Displaying Review <strong>1-1</strong>
                    </div>
                    <a href="
                    " class="backTop">
                Back to Top</a>
                </div>
            </div>
            <div class="third_line_customer_review_sctn">
                <div class="first_line_sub_customer_rv_client">
                    <div class="stars_container_customer_rv">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <span class="box_number_stars">
                            5

                        </span>
                    </div>
                    <div class="rv_title_customer">
                        Ill be buying this product again for sure; its top-notch!
                    </div>
                </div>
                <div class="second_line_sub_customer_rv_client">
                    <div class="left_side_customer_rv_second_line_client">
                        <div class="first_line_cstm_rv_sc_li">
                            Comments about Lahome Checkered Easy 

                        </div>
                        <div class="second_line_cstm_rv_sc_li">
                        Im really impressed with its quality! 
                        </div>

                    </div>
                    <div class="right_side_customer_rv_second_line_client">
                        <div class="first_line_cstm_rv_sc_li_right">
                            <strong class="bldlldld">Submitted</strong> 5 months ago                       
                         </div>
                        <div class="second_line_cstm_rv_sc_li_right">
                            <strong class="bldlldld">By</strong> Jayden Chemicals
                        </div>
                        <div class="second_line_cstm_rv_sc_li_right">
                            <strong class="bldlldld">From</strong> Undisclosed
                        </div>
                        <div class="verifiedBuyer">
                            <i class="fa fa-check"></i>
                            Verified Buyer
                        </div>
                    </div>
                    
                </div>
                <div class="third_line_sub_customer_rv_client">
                    <div class="first__side__cst_rv_thrd">
                        Was this review helpful to you?
                    </div>
                    <div class="like_container__">
                        <span class="like__">
                            <i class="fa fa-thumbs-up"></i>
                            35

                        </span>
                        <span class="dislike__">
                            <i class="fa fa-thumbs-down"></i>
                            0
                        </span>
                    </div>
                    <a href="" class="flagthis_">
                        Flag this review
                    </a>
                </div>
                <div class="end_line_sub_customer_rv_client">
                    <div class="first_container_displayingreview">
                        Displaying Review <strong>1-1</strong>
                    </div>
                    <a href="
                    " class="backTop">
                Back to Top</a>
                </div>
            </div>
        </div>
    </section>

<!-- FOOTER SECTION -->
    <section class="footer_container_wrapper" id="footer">
        <div class="first_line_footer">
            <div class="subcontainer_ft">
                <div class="img_container_txt_ft">
                    <img src="images/personalaccount.webp" alt="" class="img_cont_ft">
                    <div class="msg_ft">
                        <i class="fa fa-play"></i>
                        Try now, pay later   
                    </div>
                </div>
                <div class="img_container_txt_ft">
                    <img src="images/delivery.webp" alt="" class="img_cont_ft">
                    <div class="msg_ft">
                        <i class="fa fa-play"></i>
                        Quick delivery   
                    </div>
                </div>
                <div class="img_container_txt_ft">
                    <img src="images/easyreturn.webp" alt="" class="img_cont_ft">
                    <div class="msg_ft">
                        <i class="fa fa-play"></i>
                        Easy returns  
                    </div>
                </div>
                <div class="img_container_txt_ft">
                    <img src="images/securepayment.webp" alt="" class="img_cont_ft">
                    <div class="msg_ft">
                        <i class="fa fa-play"></i>
                        Secure payments   
                    </div>
                </div>
            </div>
        </div>
        <div class="top_wrapper_second_line">
            <div class="second_line_footer">
                <div class="left_side_container_ft">
                    <div class="first_content_ln_ft">
                        Try before you but with a
                    </div>
                    <div class="second_content_ln_ft">
                        Personal Account
                    </div>
                    <a href="#" class="third_content_ln_ft">
                        <i class="fa fa-play"></i> Find out more
                    </a>
                </div>

                <div class="right_side_container_ft">
                    <div class="sub_right_side_ft">
                        <img src="images/catalogue_crop.webp" alt="" class="ctlog">
                    </div>
                    <div class="sub_left_side_ft">
                        <div class="first_line_second_ft">
                            Catalogue
                        </div>
                        <div class="second_line_second_ft">
                            Request a free catalogue
                        </div>
                        <a href="#" class="third_line_second_ft">
                            <i class="fa fa-play"></i> Register now
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="sing_up_container_third_line ">
            <div class="frst_ln_third_container bldd fdfd">
                Sign up to our emails
            </div>
            <div class="frst_ln_third_container fdfd">
                Enjoy 20% off & Free Delivery on your first order*, plus tailored rewards and promotions before anyone else!
            </div>
            <div class="frst_ln_third_container padd">
                <input type="text" class="mail_add_email">
                <button class="ok_next" style="height: 33px;">OK</button>
            </div>
            <div class="frst_ln_third_container wrplol">
                <span class="top_line_third_cnt">Sing up to our emails</span>
                <span class="second_line_third_cnt">
                    <img src="images/icons/Icon_facebook.svg" alt="" class="icon_asset">
                    <img src="images/icons/Instagram.svg" alt="" class="icon_asset">
                    <img src="images/icons/Icon_youtube.svg" alt="" class="icon_asset">
                    <img src="images/icons/Icon_twitter.svg" alt="" class="icon_asset">
                    <img src="images/icons/Icon_pinterest.png" alt="" class="icon_asset">
                    <img src="images/icons/Icon_blog.webp" alt="" class="icon_asset">
                </span>
            </div>
            <div class="frst_ln_third_container">
                By signing up, you confirm you've read our <a href="" class="link__privacy">privacy policy</a> and are <br>happy for us to send you marketing emails..            </div>
        </div>

        <div class="abtus_lower_cont">
            <div class="sub_abtus_container">
                <div class="first_side_needhlp">
                    <div class="needhelp">
                        Need help?
                    </div>
                    <a href="#" class="visitFrequently" style="color: black; text-decoration: none;">
                        Visit Frequently Asked Questions
                    </a>
                    <div class="needhelp">
                        Need to speak to an advisor?
                    </div>
                    <!-- <div class="msg_contact">
                        Contact us via email or call
                    </div> -->
                    <!-- <div class="contatct_us">
                        0871 423 0000
                    </div> -->
                    <div class="time_availabi">
                        8am - 8pm 7 days a week
                    </div>
                    <div class="calls_cost">
                        (Calls cost 13p per minute plus your telephone company's network access charge)
                    </div>
                </div>
                <div class="second_side_abt_us">
                    <div class="needhelp">
                        About us
                    </div>
                    <a href="" class="link_rsn">About anchorwellnessaw.com</a>
                    <a href="" class="link_rsn">Our Heritage</a>
                    <a href="" class="link_rsn">6 Reasons To Shout About Us</a>
                    <a href="" class="link_rsn">Product Reviewer Community</a>
                    <a href="" class="link_rsn">Our Shop</a>
                    <a href="" class="link_rsn">Careers</a>
                    <a href="" class="link_rsn">Corporate Social Responsibility</a>
                    <a href="" class="link_rsn">Corporate Website</a>
                    <a href="" class="link_rsn">Modern Slavery Act</a>

                </div>
                <div class="third_side_here_hlp">
                    <div class="needhelp">
                        Need help?
                    </div>
                    <a href="" class="link_rsn">My Account</a>
                    <a href="" class="link_rsn">Personal Account</a>
                    <a href="" class="link_rsn">Size Guides</a>
                    <a href="" class="link_rsn">Payment Options</a>
                    <a href="" class="link_rsn">Delivery & Returns</a>
                    <a href="" class="link_rsn">Safe & Secure Shopping</a>
                    <a href="" class="link_rsn">Credit Terms</a>
                    <a href="" class="link_rsn">Our Policies</a>
                    <a href="" class="link_rsn">True Fit Sizing</a>
                    <a href="" class="link_rsn">Accessibility</a>

                </div>
            </div>

        </div>

        <div class="terms_links_">
            <div class="sub_terms_con">
                <a href="terms.html" class="link_footer_">Terms & Conditions</a>
                <a href="privacy.html"class="link_footer_">Privacy Policy</a>
                <a href="contact.html" class="link_footer_">Contact</a>
                <a href="about.html" class="link_footer_">About</a>
            </div>
        </div>
        <div class="lower_ft_side__">
            &copy; anchorwellnessaw.com
        </div>

    </section>

     
        
    <script>
        let msgRt = document.querySelector('.msg_rotator_');
        let objMsg = [
            "A seen on you",
            "Welcome to the Store",
            "We are happy to have you"
        ];

        let currentIndex = 0;
        const messageDisplayTime = 2000; 
        const transitionTime = 1000; 

        function rotateMessages() 
            msgRt.classList.add('fade-out');

            setTimeout(() => 
                currentIndex = (currentIndex + 1) % objMsg.length;
                msgRt.textContent = objMsg[currentIndex];

                msgRt.classList.remove('fade-out');
                msgRt.classList.add('fade-in');

                setTimeout(() => 
                    msgRt.classList.remove('fade-in');
                , transitionTime);
            , transitionTime); 
        

        msgRt.textContent = objMsg[currentIndex];
        msgRt.classList.add('fade-in');

        setInterval(rotateMessages, messageDisplayTime + transitionTime);

        
    </script>
    <script src="js/carousel.js"></script>
</body>
</html>
