<?php

    session_start();

    if(!isset($_SESSION["role"]) && $_SESSION["role"] != '0')
    {
        header('location:login.php');
    }
    // elseif(!isset($_SESSION["role"]) && $_SESSION["role"] != 'Staff')
    // {
    //     header('location:login.php');
    // }

?>

<!doctype html>
<html lang="en" dir="ltr">

    <head>
        		
		<!-- META DATA -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="Sash – Bootstrap 5  Admin & Dashboard Template">
		<meta name="author" content="Spruko Technologies Private Limited">
		<meta name="keywords" content="admin,admin dashboard,admin panel,admin template,bootstrap,clean,dashboard,flat,jquery,modern,responsive,premium admin templates,responsive admin,ui,ui kit.">

		<!-- FAVICON -->
		<link rel="shortcut icon" type="image/x-icon" href="assets/images/brand/favicon.ico" />

		<!-- TITLE -->
		<title>Dashboard</title>

		<!-- BOOTSTRAP CSS -->
		<link id="style" href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

		<!-- STYLE CSS -->
		<link href="assets/css/style.css" rel="stylesheet" />
		<link href="assets/css/dark-style.css" rel="stylesheet" />
		<link href="assets/css/transparent-style.css" rel="stylesheet">
		<link href="assets/css/skin-modes.css" rel="stylesheet" />

		<!--- FONT-ICONS CSS -->
		<link href="assets/css/icons.css" rel="stylesheet" />

		<!-- COLOR SKIN CSS -->
		<link id="theme" rel="stylesheet" type="text/css" media="all" href="assets/colors/color1.css" />

		<!-- INTERNAL SWITCHER CSS -->
		<link href="assets/switcher/css/switcher.css" rel="stylesheet" />
		<link href="assets/switcher/demo.css" rel="stylesheet" />


        <link rel="stylesheet" href="assets/fontawesome-free-6.2.0-web/css/all.css">

        <link rel="stylesheet" href="assets/DataTable/DataTables-1.12.1/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="assets/DataTable/DataTables-1.12.1/css/dataTables.bootstrap5.min.css">


        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">

        <style>
    #bEdit
    {
        background: #6c5ffc !important;
        color: #fff !important;
        border-color: #6c5ffc !important;
    }
    #bDelete
    {
        background: #E82646 !important;
        color: #fff !important;
        border-color: #E82646 !important;
    }
  
    @media screen and (max-width: 577px)
   {
       .mybox
       {
           height:70px;
           /*margin-left:480px !important*/
        }
   }
    
     @media screen and (max-width: 991px)
   {
       .mylogo
       {
           position:relative;
           left:295px;
       }
    }
      @media screen and (max-width: 830px)
   {
       .mylogo
       {
           position:relative;
           left:225px;
           font-size:28px;
       }
    }
       @media screen and (max-width: 720px)
   {
       .mylogo
       {
           position:relative;
           left:170px;
       }
    }
       @media screen and (max-width: 620px)
   {
       .mylogo
       {
           position:relative;
           left:130px;
       }
    }
         @media screen and (max-width: 540px)
   {
       .mylogo
       {
           position:relative;
           left:80px;
       }
    }
           @media screen and (max-width: 480px)
   {
       .mylogo
       {
           position:relative;
           left:30px;
       }
    }
    @media screen and (max-width: 420px)
   {
       .mylogo
       {
           position:relative;
           left:25px;
           font-size:26px;
       }
    }
      @media screen and (max-width: 370px)
   {
       .mylogo
       {
           position:relative;
           left:-5px;
           font-size:24px;
       }
    }
      @media screen and (max-width: 330px)
   {
       .mylogo
       {
           position:relative;
           left:-20px;
       }
    }
       @media screen and (max-width: 280px)
   {
       .mylogo
       {
           position:relative;
           left:-35px;
           font-size:22px;
       }
    }
       @media screen and (max-width: 255px)
   {
       .mylogo
       {
           position:relative;
           left:-40px;
           font-size:20px;
       }
    }
    @media screen and (max-width: 240px)
   {
       .mylogo
       {
           position:relative;
           left:-45px;
           font-size:18px;
       }
    }
    
    
    
    
    .crosscontainer {
  display: inline-block;
  cursor: pointer;
}

.bar1, .bar2, .bar3 {
  width: 20px;
  height: 1.8px;
  background-color: #6c5ffc;
  margin: 6px 0;
  transition: 0.4s;
}

.change .bar1 {
  transform: translate(0, 9px) rotate(-45deg);
}

.change .bar2 {opacity: 0;}

.change .bar3 {
  transform: translate(0, -7px) rotate(45deg);
}


        #modal
        {
            background:rgba(0,0,0,0.7);
            position:fixed;
            left:0;
            top:0;
            height:100%;
            width:100%;
            z-index:100;
            display:none;
                
        }
        #modal-form
        {
            background:#fff;
            width:45%;
            position:relative;
            top:20%;
            left:30%;
            padding:30px;
            border-radius:8px;
        }
        #modal-form h2
        {
            margin:0,0,15px;
            padding-bottom:10px;
            border-bottom:1px solid #000;
        }
        #close-btn
        {
            background:red;
            color:white;
            width:30px;
            height:30px;
            line-height:30px;
            text-align:center;
            position:absolute;
            top:-15px;
            right:-15px;
            cursor:pointer;
            border-radius:7px;
        }
   
</style>

    </head>

    <body class="app sidebar-mini ltr light-mode">

        <!-- SWITCHER -->
                
        <div class="switcher-wrapper">
            <div class="demo_changer">
                <div class="form_holder sidebar-right1">
                    <div class="row">
                        <div class="predefined_styles">
                            <!--<div class="swichermainleft text-center">-->
                            <!--    <div class="p-3 d-grid gap-2">-->
                            <!--        <a href="https://php.spruko.com/sash/" class="btn ripple btn-primary mt-0">View Demo</a>-->
                            <!--        <a href="https://themeforest.net/item/sash-php-admin-dashboard-template/38192327" class="btn ripple btn-secondary">Buy Now</a>-->
                            <!--        <a href="https://themeforest.net/user/spruko/portfolio" class="btn ripple btn-pink">Our Portfolio</a>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <div class="swichermainleft">
                                <h4>Navigation Style</h4>
                                <div class="skin-body">
                                    <div class="switch_section">
                                        <div class="switch-toggle d-flex">
                                            <span class="me-auto">Vertical Menu</span>
                                            <p class="onoffswitch2"><input type="radio" name="onoffswitch15" id="myonoffswitch34" class="onoffswitch2-checkbox" checked>
                                                <label for="myonoffswitch34" class="onoffswitch2-label"></label>
                                            </p>
                                        </div>
                                        <div class="switch-toggle d-flex mt-2">
                                            <span class="me-auto">Horizontal Click Menu</span>
                                            <p class="onoffswitch2"><input type="radio" name="onoffswitch15" id="myonoffswitch35" class="onoffswitch2-checkbox">
                                                <label for="myonoffswitch35" class="onoffswitch2-label"></label>
                                            </p>
                                        </div>
                                        <div class="switch-toggle d-flex mt-2">
                                            <span class="me-auto">Horizontal Hover Menu</span>
                                            <p class="onoffswitch2"><input type="radio" name="onoffswitch15" id="myonoffswitch111" class="onoffswitch2-checkbox">
                                                <label for="myonoffswitch111" class="onoffswitch2-label"></label>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swichermainleft">
                                <h4>LTR and RTL VERSIONS</h4>
                                <div class="skin-body">
                                    <div class="switch_section">
                                        <div class="switch-toggle d-flex">
                                            <span class="me-auto">LTR Version</span>
                                            <p class="onoffswitch2"><input type="radio" name="onoffswitch7" id="myonoffswitch23" class="onoffswitch2-checkbox" checked>
                                                <label for="myonoffswitch23" class="onoffswitch2-label"></label>
                                            </p>
                                        </div>
                                        <div class="switch-toggle d-flex mt-2">
                                            <span class="me-auto">RTL Version</span>
                                            <p class="onoffswitch2"><input type="radio" name="onoffswitch7" id="myonoffswitch24" class="onoffswitch2-checkbox">
                                                <label for="myonoffswitch24" class="onoffswitch2-label"></label>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swichermainleft">
                                <h4>Light Theme Style</h4>
                                <div class="skin-body">
                                    <div class="switch_section">
                                        <div class="switch-toggle d-flex">
                                            <span class="me-auto">Light Theme</span>
                                            <p class="onoffswitch2"><input type="radio" name="onoffswitch1" id="myonoffswitch1" class="onoffswitch2-checkbox" checked>
                                                <label for="myonoffswitch1" class="onoffswitch2-label"></label>
                                            </p>
                                        </div>
                                        <div class="switch-toggle d-flex">
                                            <span class="me-auto">Light Primary</span>
                                            <div class="">
                                                <input class="w-30p h-30 input-color-picker color-primary-light" value="#6c5ffc" id="colorID" oninput="changePrimaryColor()" type="color" data-id="bg-color" data-id1="bg-hover" data-id2="bg-border" data-id7="transparentcolor" name="lightPrimary">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swichermainleft">
                                <h4>Dark Theme Style</h4>
                                <div class="skin-body">
                                    <div class="switch_section">
                                        <div class="switch-toggle d-flex mt-2">
                                            <span class="me-auto">Dark Theme</span>
                                            <p class="onoffswitch2"><input type="radio" name="onoffswitch1" id="myonoffswitch2" class="onoffswitch2-checkbox">
                                                <label for="myonoffswitch2" class="onoffswitch2-label"></label>
                                            </p>
                                        </div>
                                        <div class="switch-toggle d-flex mt-2">
                                            <span class="me-auto">Dark Primary</span>
                                            <div class="">
                                                <input class="w-30p h-30 input-dark-color-picker color-primary-dark" value="#6c5ffc" id="darkPrimaryColorID" oninput="darkPrimaryColor()" type="color" data-id="bg-color" data-id1="bg-hover" data-id2="bg-border" data-id3="primary" data-id8="transparentcolor"
                                                    name="darkPrimary">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swichermainleft">
                                <h4>Transparent Theme Style</h4>
                                <div class="skin-body">
                                    <div class="switch_section">
                                        <div class="switch-toggle d-flex mt-2">
                                            <span class="me-auto">Transparent Theme</span>
                                            <p class="onoffswitch2"><input type="radio" name="onoffswitch1" id="myonoffswitchTransparent" class="onoffswitch2-checkbox">
                                                <label for="myonoffswitchTransparent" class="onoffswitch2-label"></label>
                                            </p>
                                        </div>
                                        <div class="switch-toggle d-flex mt-2">
                                            <span class="me-auto">Transparent Primary</span>
                                            <div class="">
                                                <input class="w-30p h-30 input-transparent-color-picker color-primary-transparent" value="#6c5ffc" id="transparentPrimaryColorID" oninput="transparentPrimaryColor()" type="color" data-id="bg-color" data-id1="bg-hover" data-id2="bg-border" data-id3="primary"
                                                    data-id4="primary" data-id9="transparentcolor" name="tranparentPrimary">
                                            </div>
                                        </div>
                                        <div class="switch-toggle d-flex mt-2">
                                            <span class="me-auto">Transparent Background</span>
                                            <div class="">
                                                <input class="w-30p h-30 input-transparent-color-picker color-bg-transparent" value="#362bb1" id="transparentBgColorID" oninput="transparentBgColor()" type="color" data-id5="body" data-id6="theme" data-id9="transparentcolor" name="transparentBackground">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swichermainleft">
                                <h4>Transparent Bg-Image Style</h4>
                                <div class="skin-body switch_section">
                                    <div class="switch-toggle d-flex">
                                        <span class="me-auto">Bg-Image Primary</span>
                                        <div class="">
                                            <input class="w-30p h-30 input-transparent-color-picker color-primary-transparent" value="#6c5ffc" id="transparentBgImgPrimaryColorID" oninput="transparentBgImgPrimaryColor()" type="color" data-id="bg-color" data-id1="bg-hover" data-id2="bg-border" data-id3="primary" data-id4="primary"  data-id9="transparentcolor" name="tranparentPrimary">
                                        </div>
                                    </div>
                                    <div class="switch-toggle d-flex mt-2">
                                        <a class="bg-img1" href="javascript:void(0);" onclick="bgImage(this)"><img src="assets/images/media/bg-img1.jpg"  alt="Bg-Image" id="bgimage1"></a>
                                        <a class="bg-img2" href="javascript:void(0);" onclick="bgImage(this)"><img src="assets/images/media/bg-img2.jpg"  alt="Bg-Image"  id="bgimage2"></a>
                                        <a class="bg-img3" href="javascript:void(0);" onclick="bgImage(this)"><img src="assets/images/media/bg-img3.jpg"  alt="Bg-Image" id="bgimage3"></a>
                                        <a class="bg-img4" href="javascript:void(0);" onclick="bgImage(this)"><img src="assets/images/media/bg-img4.jpg"  alt="Bg-Image" id="bgimage4"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="swichermainleft">
                                <h4>Menu Styles</h4>
                                <div class="skin-body">
                                    <div class="switch_section">
                                        <div class="switch-toggle lightMenu d-flex">
                                            <span class="me-auto">Light Menu</span>
                                            <p class="onoffswitch2"><input type="radio" name="onoffswitch2" id="myonoffswitch3" class="onoffswitch2-checkbox" checked>
                                                <label for="myonoffswitch3" class="onoffswitch2-label"></label>
                                            </p>
                                        </div>
                                        <div class="switch-toggle colorMenu d-flex mt-2">
                                            <span class="me-auto">Color Menu</span>
                                            <p class="onoffswitch2"><input type="radio" name="onoffswitch2" id="myonoffswitch4" class="onoffswitch2-checkbox">
                                                <label for="myonoffswitch4" class="onoffswitch2-label"></label>
                                            </p>
                                        </div>
                                        <div class="switch-toggle darkMenu d-flex mt-2">
                                            <span class="me-auto">Dark Menu</span>
                                            <p class="onoffswitch2"><input type="radio" name="onoffswitch2" id="myonoffswitch5" class="onoffswitch2-checkbox">
                                                <label for="myonoffswitch5" class="onoffswitch2-label"></label>
                                            </p>
                                        </div>
                                        <div class="switch-toggle gradientMenu d-flex mt-2">
                                            <span class="me-auto">Gradient Menu</span>
                                            <p class="onoffswitch2"><input type="radio" name="onoffswitch2" id="myonoffswitch19" class="onoffswitch2-checkbox">
                                                <label for="myonoffswitch19" class="onoffswitch2-label"></label>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swichermainleft">
                                <h4>Header Styles</h4>
                                <div class="skin-body">
                                    <div class="switch_section">
                                        <div class="switch-toggle lightHeader d-flex">
                                            <span class="me-auto">Light Header</span>
                                            <p class="onoffswitch2"><input type="radio" name="onoffswitch3" id="myonoffswitch6" class="onoffswitch2-checkbox" checked>
                                                <label for="myonoffswitch6" class="onoffswitch2-label"></label>
                                            </p>
                                        </div>
                                        <div class="switch-toggle  colorHeader d-flex mt-2">
                                            <span class="me-auto">Color Header</span>
                                            <p class="onoffswitch2"><input type="radio" name="onoffswitch3" id="myonoffswitch7" class="onoffswitch2-checkbox">
                                                <label for="myonoffswitch7" class="onoffswitch2-label"></label>
                                            </p>
                                        </div>
                                        <div class="switch-toggle darkHeader d-flex mt-2">
                                            <span class="me-auto">Dark Header</span>
                                            <p class="onoffswitch2"><input type="radio" name="onoffswitch3" id="myonoffswitch8" class="onoffswitch2-checkbox">
                                                <label for="myonoffswitch8" class="onoffswitch2-label"></label>
                                            </p>
                                        </div>

                                        <div class="switch-toggle darkHeader d-flex mt-2">
                                            <span class="me-auto">Gradient Header</span>
                                            <p class="onoffswitch2"><input type="radio" name="onoffswitch3" id="myonoffswitch20" class="onoffswitch2-checkbox">
                                                <label for="myonoffswitch20" class="onoffswitch2-label"></label>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swichermainleft">
                                <h4>Layout Width Styles</h4>
                                <div class="skin-body">
                                    <div class="switch_section">
                                        <div class="switch-toggle d-flex">
                                            <span class="me-auto">Full Width</span>
                                            <p class="onoffswitch2"><input type="radio" name="onoffswitch4" id="myonoffswitch9" class="onoffswitch2-checkbox" checked>
                                                <label for="myonoffswitch9" class="onoffswitch2-label"></label>
                                            </p>
                                        </div>
                                        <div class="switch-toggle d-flex mt-2">
                                            <span class="me-auto">Boxed</span>
                                            <p class="onoffswitch2"><input type="radio" name="onoffswitch4" id="myonoffswitch10" class="onoffswitch2-checkbox">
                                                <label for="myonoffswitch10" class="onoffswitch2-label"></label>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swichermainleft">
                                <h4>Layout Positions</h4>
                                <div class="skin-body">
                                    <div class="switch_section">
                                        <div class="switch-toggle d-flex">
                                            <span class="me-auto">Fixed</span>
                                            <p class="onoffswitch2"><input type="radio" name="onoffswitch5" id="myonoffswitch11" class="onoffswitch2-checkbox" checked>
                                                <label for="myonoffswitch11" class="onoffswitch2-label"></label>
                                            </p>
                                        </div>
                                        <div class="switch-toggle d-flex mt-2">
                                            <span class="me-auto">Scrollable</span>
                                            <p class="onoffswitch2"><input type="radio" name="onoffswitch5" id="myonoffswitch12" class="onoffswitch2-checkbox">
                                                <label for="myonoffswitch12" class="onoffswitch2-label"></label>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swichermainleft leftmenu-styles">
                                <h4>Sidemenu layout Styles</h4>
                                <div class="skin-body">
                                    <div class="switch_section">
                                        <div class="switch-toggle d-flex">
                                            <span class="me-auto">Default Menu</span>
                                            <p class="onoffswitch2"><input type="radio" name="onoffswitch6" id="myonoffswitch13" class="onoffswitch2-checkbox default-menu" checked>
                                                <label for="myonoffswitch13" class="onoffswitch2-label"></label>
                                            </p>
                                        </div>
                                        <!--<div class="switch-toggle d-flex mt-2">-->
                                        <!--    <span class="me-auto">Icon with Text</span>-->
                                        <!--    <p class="onoffswitch2"><input type="radio" name="onoffswitch6" id="myonoffswitch14" class="onoffswitch2-checkbox">-->
                                        <!--        <label for="myonoffswitch14" class="onoffswitch2-label"></label>-->
                                        <!--    </p>-->
                                        <!--</div>-->
                                        <div class="switch-toggle d-flex mt-2">
                                            <span class="me-auto">Icon Overlay</span>
                                            <p class="onoffswitch2"><input type="radio" name="onoffswitch6" id="myonoffswitch15" class="onoffswitch2-checkbox">
                                                <label for="myonoffswitch15" class="onoffswitch2-label"></label>
                                            </p>
                                        </div>
                                        <div class="switch-toggle d-flex mt-2">
                                            <span class="me-auto">Closed Sidemenu</span>
                                            <p class="onoffswitch2"><input type="radio" name="onoffswitch6" id="myonoffswitch16" class="onoffswitch2-checkbox">
                                                <label for="myonoffswitch16" class="onoffswitch2-label"></label>
                                            </p>
                                        </div>
                                        <!--<div class="switch-toggle d-flex mt-2">-->
                                        <!--    <span class="me-auto">Hover Submenu</span>-->
                                        <!--    <p class="onoffswitch2"><input type="radio" name="onoffswitch6" id="myonoffswitch17" class="onoffswitch2-checkbox">-->
                                        <!--        <label for="myonoffswitch17" class="onoffswitch2-label"></label>-->
                                        <!--    </p>-->
                                        <!--</div>-->
                                        <!--<div class="switch-toggle d-flex mt-2">-->
                                        <!--    <span class="me-auto">Hover Submenu Style 1</span>-->
                                        <!--    <p class="onoffswitch2"><input type="radio" name="onoffswitch6" id="myonoffswitch18" class="onoffswitch2-checkbox">-->
                                        <!--        <label for="myonoffswitch18" class="onoffswitch2-label"></label>-->
                                        <!--    </p>-->
                                        <!--</div>-->
                                    </div>
                                </div>
                            </div>
                            <div class="swichermainleft">
                                <h4>Reset All Styles</h4>
                                <div class="skin-body">
                                    <div class="switch_section my-4">
                                        <button class="btn btn-danger btn-block" onclick="localStorage.clear();
                                            document.querySelector('html').style = '';
                                            names() ;
                                            resetData() ;" type="button">Reset All
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>        <!-- END SWITCHER -->

        <!-- GLOBAL-LOADER -->
        <div id="global-loader">
            <img src="assets/images/loader.svg" class="loader-img" alt="Loader">
        </div>
        <!-- /GLOBAL-LOADER -->

        <!-- PAGE -->
        <div class="page">
            <div class="page-main">

                <!-- APP-HEADER -->
                
			<div class="app-header header sticky">
                <div class="container-fluid main-container">
                    <div class="d-flex">
                        <a aria-label="Hide Sidebar" data-bs-toggle="sidebar" href="javascript:void(0)">
                             &nbsp;&nbsp;
                            <div class="crosscontainer" onclick="myFunction(this)">
                              <div class="bar1"></div>
                              <div class="bar2"></div>
                              <div class="bar3"></div>
                            </div>
                        </a>
                        <!-- sidebar-toggle-->
                        
                        <a href="index.php" class="logo-name" style="position:relative;left:120px">
                            <!--<img src="assets/images/brand/logo.png" class="header-brand-img desktop-logo" alt="logo">-->
                            <!--<img src="assets/images/brand/logo-3.png" class="header-brand-img light-logo1"-->
                            <!--    alt="logo">-->
                            <h1 class="header-brand-img light-logo1 mylogo" style="margin-left:-35px;font-weight: bold;">Grid</h1>
                        </a>
                        
                        <!-- LOGO -->
                        <!--<div class="main-header-center ms-3 d-none d-lg-block">-->
                        <!--    <input type="text" class="form-control" id="typehead" placeholder="Search for results..." autocomplete="off">-->
                        <!--    <button class="btn px-0 pt-2"><i class="fa fa-search" aria-hidden="true"></i></button>-->
                        <!--</div>-->
                        <div class="d-flex order-lg-2 ms-auto header-right-icons">
                            <div class="dropdown d-none">
                                <a href="javascript:void(0)" class="nav-link icon" data-bs-toggle="dropdown">
                                    <i class="fa fa-search"></i>
                                </a>
                                <div class="dropdown-menu header-search dropdown-menu-start">
                                    <div class="input-group w-100 p-2">
                                        <input type="text" class="form-control" placeholder="Search....">
                                        <div class="input-group-text btn btn-primary">
                                            <i class="fa fa-search" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- SEARCH -->
                            <button class="navbar-toggler navresponsive-toggler d-lg-none ms-auto" type="button"
                                data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4"
                                aria-controls="navbarSupportedContent-4" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon fa-solid fa-ellipsis-vertical"></span>
                            </button>
                            <div class="navbar navbar-collapse responsive-navbar p-0">
                                <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                                    <div class="d-flex order-lg-2 mybox">
                                        <!--<div class="dropdown d-lg-none d-flex">-->
                                        <!--    <a href="javascript:void(0)" class="nav-link icon" data-bs-toggle="dropdown">-->
                                        <!--        <i class="fa fa-search"></i>-->
                                        <!--    </a>-->
                                        <!--    <div class="dropdown-menu header-search dropdown-menu-start">-->
                                        <!--        <div class="input-group w-100 p-2">-->
                                        <!--            <input type="text" class="form-control" placeholder="Search....">-->
                                        <!--            <div class="input-group-text btn btn-primary">-->
                                        <!--                <i class="fa fa-search" aria-hidden="true"></i>-->
                                        <!--            </div>-->
                                        <!--        </div>-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                        <!--<div class="d-flex country">-->
                                        <!--    <a class="nav-link icon text-center" data-bs-target="#country-selector"-->
                                        <!--        data-bs-toggle="modal">-->
                                        <!--        <i class="fa fa-globe"></i><span-->
                                        <!--            class="fs-16 ms-2 d-none d-xl-block">English</span>-->
                                        <!--    </a>-->
                                        <!--</div>-->
                                        <!-- COUNTRY -->
                                        <div class="d-flex country">
                                            <a class="nav-link icon theme-layout nav-link-bg layout-setting">
                                                <span class="dark-layout"><i class="fa fa-moon"></i></span>
                                                <span class="light-layout"><i class="fa fa-sun"></i></span>
                                            </a>
                                        </div>
                                        <!-- Theme-Layout -->
                                        <!--<div class="dropdown  d-flex shopping-cart">-->
                                        <!--    <a class="nav-link icon text-center" data-bs-toggle="dropdown">-->
                                        <!--        <i class="fa fa-shopping-cart"></i><span class="badge bg-secondary header-badge">4</span>-->
                                        <!--    </a>-->
                                        <!--    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">-->
                                        <!--        <div class="drop-heading border-bottom">-->
                                        <!--            <div class="d-flex">-->
                                        <!--                <h6 class="mt-1 mb-0 fs-16 fw-semibold text-dark"> My Shopping Cart</h6>-->
                                        <!--                <div class="ms-auto">-->
                                        <!--                    <span class="badge bg-danger-transparent header-badge text-danger fs-14">Hurry Up!</span>-->
                                        <!--                </div>-->
                                        <!--            </div>-->
                                        <!--        </div>-->
                                        <!--        <div class="header-dropdown-list message-menu">-->
                                        <!--            <div class="dropdown-item d-flex p-4">-->
                                        <!--                <a href="cart.php" class="open-file"></a>-->
                                        <!--                <span-->
                                        <!--                    class="avatar avatar-xl br-5 me-3 align-self-center cover-image"-->
                                        <!--                    data-bs-image-src="assets/images/pngs/4.jpg"></span>-->
                                        <!--                <div class="wd-50p">-->
                                        <!--                    <h5 class="mb-1">Flower Pot for Home Decor</h5>-->
                                        <!--                    <span>Status: <span class="text-success">In Stock</span></span>-->
                                        <!--                    <p class="fs-13 text-muted mb-0">Quantity: 01</p>-->
                                        <!--                </div>-->
                                        <!--                <div class="ms-auto text-end d-flex fs-16">-->
                                        <!--                    <span class="fs-16 text-dark d-none d-sm-block px-4">-->
                                        <!--                        $438-->
                                        <!--                    </span>-->
                                        <!--                    <a href="javascript:void(0)" class="fs-16 btn p-0 cart-trash">-->
                                        <!--                        <i class="fa fa-trash-2 border text-danger brround d-block p-2"></i>-->
                                        <!--                    </a>-->
                                        <!--                </div>-->
                                        <!--            </div>-->
                                        <!--            <div class="dropdown-item d-flex p-4">-->
                                        <!--                <a href="cart.php" class="open-file"></a>-->
                                        <!--                <span-->
                                        <!--                    class="avatar avatar-xl br-5 me-3 align-self-center cover-image"-->
                                        <!--                    data-bs-image-src="assets/images/pngs/6.jpg"></span>-->
                                        <!--                <div class="wd-50p">-->
                                        <!--                    <h5 class="mb-1">Black Digital Camera</h5>-->
                                        <!--                    <span>Status: <span class="text-danger">Out Stock</span></span>-->
                                        <!--                    <p class="fs-13 text-muted mb-0">Quantity: 06</p>-->
                                        <!--                </div>-->
                                        <!--                <div class="ms-auto text-end d-flex">-->
                                        <!--                    <span class="fs-16 text-dark d-none d-sm-block px-4">-->
                                        <!--                        $867-->
                                        <!--                    </span>-->
                                        <!--                    <a href="javascript:void(0)" class="fs-16 btn p-0 cart-trash">-->
                                        <!--                        <i class="fa fa-trash-2 border text-danger brround d-block p-2"></i>-->
                                        <!--                    </a>-->
                                        <!--                </div>-->
                                        <!--            </div>-->
                                        <!--            <div class="dropdown-item d-flex p-4">-->
                                        <!--                <a href="cart.php" class="open-file"></a>-->
                                        <!--                <span-->
                                        <!--                    class="avatar avatar-xl br-5 me-3 align-self-center cover-image"-->
                                        <!--                    data-bs-image-src="assets/images/pngs/8.jpg"></span>-->
                                        <!--                <div class="wd-50p">-->
                                        <!--                    <h5 class="mb-1">Stylish Rockerz 255 Ear Pods</h5>-->
                                        <!--                    <span>Status: <span class="text-success">In Stock</span></span>-->
                                        <!--                    <p class="fs-13 text-muted mb-0">Quantity: 05</p>-->
                                        <!--                </div>-->
                                        <!--                <div class="ms-auto text-end d-flex">-->
                                        <!--                    <span class="fs-16 text-dark d-none d-sm-block px-4">-->
                                        <!--                        $323-->
                                        <!--                    </span>-->
                                        <!--                    <a href="javascript:void(0)" class="fs-16 btn p-0 cart-trash">-->
                                        <!--                        <i class="fa fa-trash-2 border text-danger brround d-block p-2"></i>-->
                                        <!--                    </a>-->
                                        <!--                </div>-->
                                        <!--            </div>-->
                                        <!--            <div class="dropdown-item d-flex p-4">-->
                                        <!--                <a href="cart.php" class="open-file"></a>-->
                                        <!--                <span-->
                                        <!--                    class="avatar avatar-xl br-5 me-3 align-self-center cover-image"-->
                                        <!--                    data-bs-image-src="assets/images/pngs/1.jpg"></span>-->
                                        <!--                <div class="wd-50p">-->
                                        <!--                    <h5 class="mb-1">Women Party Wear Dress</h5>-->
                                        <!--                    <span>Status: <span class="text-success">In Stock</span></span>-->
                                        <!--                    <p class="fs-13 text-muted mb-0">Quantity: 05</p>-->
                                        <!--                </div>-->
                                        <!--                <div class="ms-auto text-end d-flex">-->
                                        <!--                    <span class="fs-16 text-dark d-none d-sm-block px-4">-->
                                        <!--                        $867-->
                                        <!--                    </span>-->
                                        <!--                    <a href="javascript:void(0)" class="fs-16 btn p-0 cart-trash">-->
                                        <!--                        <i class="fa fa-trash-2 border text-danger brround d-block p-2"></i>-->
                                        <!--                    </a>-->
                                        <!--                </div>-->
                                        <!--            </div>-->
                                        <!--            <div class="dropdown-item d-flex p-4">-->
                                        <!--                <a href="cart.php" class="open-file"></a>-->
                                        <!--                <span-->
                                        <!--                    class="avatar avatar-xl br-5 me-3 align-self-center cover-image"-->
                                        <!--                    data-bs-image-src="assets/images/pngs/3.jpg"></span>-->
                                        <!--                <div class="wd-50p">-->
                                        <!--                    <h5 class="mb-1">Running Shoes for men</h5>-->
                                        <!--                    <span>Status: <span class="text-success">In Stock</span></span>-->
                                        <!--                    <p class="fs-13 text-muted mb-0">Quantity: 05</p>-->
                                        <!--                </div>-->
                                        <!--                <div class="ms-auto text-end d-flex">-->
                                        <!--                    <span class="fs-16 text-dark d-none d-sm-block px-4">-->
                                        <!--                        $456-->
                                        <!--                    </span>-->
                                        <!--                    <a href="javascript:void(0)" class="fs-16 btn p-0 cart-trash">-->
                                        <!--                        <i class="fa fa-trash-2 border text-danger brround d-block p-2"></i>-->
                                        <!--                    </a>-->
                                        <!--                </div>-->
                                        <!--            </div>-->
                                        <!--        </div>-->
                                        <!--        <div class="dropdown-divider m-0"></div>-->
                                        <!--        <div class="dropdown-footer">-->
                                        <!--            <a class="btn btn-primary btn-pill w-sm btn-sm py-2" href="checkout.php"><i class="fa fa-check-circle"></i> Checkout</a>-->
                                        <!--            <span class="float-end p-2 fs-17 fw-semibold">Total: $6789</span>-->
                                        <!--        </div>-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                        <!-- CART -->
                                        <div class="dropdown d-flex" style="background:color:red">
                                            <a class="nav-link icon full-screen-link nav-link-bg">
                                                <i class="fa fa-minimize fullscreen-button"></i>
                                            </a>
                                        </div>
                                        <!-- FULL-SCREEN -->
                                        <!--<div class="dropdown  d-flex notifications">-->
                                        <!--    <a class="nav-link icon" data-bs-toggle="dropdown"><i-->
                                        <!--            class="fa fa-bell"></i><span class=" pulse"></span>-->
                                        <!--    </a>-->
                                            <!--<div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">-->
                                            <!--    <div class="drop-heading border-bottom">-->
                                            <!--        <div class="d-flex">-->
                                            <!--            <h6 class="mt-1 mb-0 fs-16 fw-semibold text-dark">Notifications-->
                                            <!--            </h6>-->
                                            <!--        </div>-->
                                            <!--    </div>-->
                                            <!--    <div class="notifications-menu">-->
                                            <!--        <a class="dropdown-item d-flex" href="notify-list.php">-->
                                            <!--            <div class="me-3 notifyimg  bg-primary brround box-shadow-primary">-->
                                            <!--                <i class="fa fa-mail"></i>-->
                                            <!--            </div>-->
                                            <!--            <div class="mt-1 wd-80p">-->
                                            <!--                <h5 class="notification-label mb-1">New Application received-->
                                            <!--                </h5>-->
                                            <!--                <span class="notification-subtext">3 days ago</span>-->
                                            <!--            </div>-->
                                            <!--        </a>-->
                                            <!--        <a class="dropdown-item d-flex" href="notify-list.php">-->
                                            <!--            <div class="me-3 notifyimg  bg-secondary brround box-shadow-secondary">-->
                                            <!--                <i class="fa fa-check-circle"></i>-->
                                            <!--            </div>-->
                                            <!--            <div class="mt-1 wd-80p">-->
                                            <!--                <h5 class="notification-label mb-1">Project has been-->
                                            <!--                    approved</h5>-->
                                            <!--                <span class="notification-subtext">2 hours ago</span>-->
                                            <!--            </div>-->
                                            <!--        </a>-->
                                            <!--        <a class="dropdown-item d-flex" href="notify-list.php">-->
                                            <!--            <div class="me-3 notifyimg  bg-success brround box-shadow-success">-->
                                            <!--                <i class="fa fa-shopping-cart"></i>-->
                                            <!--            </div>-->
                                            <!--            <div class="mt-1 wd-80p">-->
                                            <!--                <h5 class="notification-label mb-1">Your Product Delivered-->
                                            <!--                </h5>-->
                                            <!--                <span class="notification-subtext">30 min ago</span>-->
                                            <!--            </div>-->
                                            <!--        </a>-->
                                            <!--        <a class="dropdown-item d-flex" href="notify-list.php">-->
                                            <!--            <div class="me-3 notifyimg bg-pink brround box-shadow-pink">-->
                                            <!--                <i class="fa fa-user-plus"></i>-->
                                            <!--            </div>-->
                                            <!--            <div class="mt-1 wd-80p">-->
                                            <!--                <h5 class="notification-label mb-1">Friend Requests</h5>-->
                                            <!--                <span class="notification-subtext">1 day ago</span>-->
                                            <!--            </div>-->
                                            <!--        </a>-->
                                            <!--    </div>-->
                                            <!--    <div class="dropdown-divider m-0"></div>-->
                                            <!--    <a href="notify-list.php"-->
                                            <!--        class="dropdown-item text-center p-3 text-muted">View all-->
                                            <!--        Notification</a>-->
                                            <!--</div>-->
                                        <!--</div>-->
                                        <!-- NOTIFICATIONS -->
                                        <!--<div class="dropdown  d-flex message">-->
                                        <!--    <a class="nav-link icon text-center" data-bs-toggle="dropdown">-->
                                        <!--        <i class="fa-regular fa-message"></i><span class="pulse-danger"></span>-->
                                        <!--    </a>-->
                                        <!--    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">-->
                                        <!--        <div class="drop-heading border-bottom">-->
                                        <!--            <div class="d-flex">-->
                                        <!--                <h6 class="mt-1 mb-0 fs-16 fw-semibold text-dark">You have 5-->
                                        <!--                    Messages</h6>-->
                                        <!--                <div class="ms-auto">-->
                                        <!--                    <a href="javascript:void(0)" class="text-muted p-0 fs-12">make all unread</a>-->
                                        <!--                </div>-->
                                        <!--            </div>-->
                                        <!--        </div>-->
                                        <!--        <div class="message-menu message-menu-scroll">-->
                                        <!--            <a class="dropdown-item d-flex" href="chat.php">-->
                                        <!--                <span-->
                                        <!--                    class="avatar avatar-md brround me-3 align-self-center cover-image"-->
                                        <!--                    data-bs-image-src="assets/images/users/1.jpg"></span>-->
                                        <!--                <div class="wd-90p">-->
                                        <!--                    <div class="d-flex">-->
                                        <!--                        <h5 class="mb-1">Peter Theil</h5>-->
                                        <!--                        <small class="text-muted ms-auto text-end">-->
                                        <!--                            6:45 am-->
                                        <!--                        </small>-->
                                        <!--                    </div>-->
                                        <!--                    <span>Commented on file Guest list....</span>-->
                                        <!--                </div>-->
                                        <!--            </a>-->
                                        <!--            <a class="dropdown-item d-flex" href="chat.php">-->
                                        <!--                <span-->
                                        <!--                    class="avatar avatar-md brround me-3 align-self-center cover-image"-->
                                        <!--                    data-bs-image-src="assets/images/users/15.jpg"></span>-->
                                        <!--                <div class="wd-90p">-->
                                        <!--                    <div class="d-flex">-->
                                        <!--                        <h5 class="mb-1">Abagael Luth</h5>-->
                                        <!--                        <small class="text-muted ms-auto text-end">-->
                                        <!--                            10:35 am-->
                                        <!--                        </small>-->
                                        <!--                    </div>-->
                                        <!--                    <span>New Meetup Started......</span>-->
                                        <!--                </div>-->
                                        <!--            </a>-->
                                        <!--            <a class="dropdown-item d-flex" href="chat.php">-->
                                        <!--                <span-->
                                        <!--                    class="avatar avatar-md brround me-3 align-self-center cover-image"-->
                                        <!--                    data-bs-image-src="assets/images/users/12.jpg"></span>-->
                                        <!--                <div class="wd-90p">-->
                                        <!--                    <div class="d-flex">-->
                                        <!--                        <h5 class="mb-1">Brizid Dawson</h5>-->
                                        <!--                        <small class="text-muted ms-auto text-end">-->
                                        <!--                            2:17 pm-->
                                        <!--                        </small>-->
                                        <!--                    </div>-->
                                        <!--                    <span>Brizid is in the Warehouse...</span>-->
                                        <!--                </div>-->
                                        <!--            </a>-->
                                        <!--            <a class="dropdown-item d-flex" href="chat.php">-->
                                        <!--                <span-->
                                        <!--                    class="avatar avatar-md brround me-3 align-self-center cover-image"-->
                                        <!--                    data-bs-image-src="assets/images/users/4.jpg"></span>-->
                                        <!--                <div class="wd-90p">-->
                                        <!--                    <div class="d-flex">-->
                                        <!--                        <h5 class="mb-1">Shannon Shaw</h5>-->
                                        <!--                        <small class="text-muted ms-auto text-end">-->
                                        <!--                            7:55 pm-->
                                        <!--                        </small>-->
                                        <!--                    </div>-->
                                        <!--                    <span>New Product Realease......</span>-->
                                        <!--                </div>-->
                                        <!--            </a>-->
                                        <!--            <a class="dropdown-item d-flex" href="chat.php">-->
                                        <!--                <span-->
                                        <!--                    class="avatar avatar-md brround me-3 align-self-center cover-image"-->
                                        <!--                    data-bs-image-src="assets/images/users/3.jpg"></span>-->
                                        <!--                <div class="wd-90p">-->
                                        <!--                    <div class="d-flex">-->
                                        <!--                        <h5 class="mb-1">Cherry Blossom</h5>-->
                                        <!--                        <small class="text-muted ms-auto text-end">-->
                                        <!--                            7:55 pm-->
                                        <!--                        </small>-->
                                        <!--                    </div>-->
                                        <!--                    <span>You have appointment on......</span>-->
                                        <!--                </div>-->
                                        <!--            </a>-->

                                        <!--        </div>-->
                                        <!--        <div class="dropdown-divider m-0"></div>-->
                                        <!--        <a href="chat.php" class="dropdown-item text-center p-3 text-muted">See all-->
                                        <!--            Messages</a>-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                        <!-- MESSAGE-BOX -->
                                        <!--<div class="dropdown d-flex header-settings">-->
                                        <!--    <a href="javascript:void(0);" class="nav-link icon"-->
                                        <!--        data-bs-toggle="sidebar-right" data-target=".sidebar-right">-->
                                        <!--        <i class="fa fa-align-right"></i>-->
                                        <!--    </a>-->
                                        <!--</div>-->
                                        <!-- SIDE-MENU -->
                                        <div class="dropdown d-flex profile-1">
                                            <a href="javascript:void(0)" data-bs-toggle="dropdown" class="nav-link leading-none d-flex">
                                                <!--<img src="assets/images/users/21.jpg" alt="profile-user"-->
                                                <!--    class="avatar  profile-user brround cover-image">-->
                                                    <i class="fa fa-user avatar  profile-user brround cover-image" style="font-size:19px" aria-hidden="true"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                <div class="drop-heading">
                                                    <div class="text-center">
                                                    <?php

                                                            if(isset($_SESSION["role"]) && $_SESSION["role"] == '0')
                                                            {
                                                                ?>
                                                                <h5 class="text-dark mb-0 fs-14 fw-semibold"><?php echo $_SESSION["name"] ?></h5>
                                                                <small class="text-muted">Super Admin</small>
                                                                <?php
                                                            }
                                                            elseif(isset($_SESSION["role"]) && $_SESSION["role"] == '3')
                                                            {
                                                                ?>
                                                                <h5 class="text-dark mb-0 fs-14 fw-semibold"><?php echo $_SESSION["name"] ?></h5>
                                                                <small class="text-muted">Vendor</small>
                                                                <?php
                                                            }
                                                           
                                                            
                                                            

                                                    ?>
                                                 
                                                    </div>
                                                </div>
                                                <!--<div class="dropdown-divider m-0"></div>-->
                                                <!--<a class="dropdown-item" href="profile.php">-->
                                                <!--    <i class="dropdown-icon fa fa-user"></i> Profile-->
                                                <!--</a>-->
                                                <!--<a class="dropdown-item" href="email-inbox.php">-->
                                                <!--    <i class="dropdown-icon fa fa-mail"></i> Inbox-->
                                                <!--    <span class="badge bg-danger rounded-pill float-end">5</span>-->
                                                <!--</a>-->
                                                <!--<a class="dropdown-item" href="lockscreen.php">-->
                                                <!--    <i class="dropdown-icon fa fa-lock"></i> Lockscreen-->
                                                <!--</a>-->
                                                <a class="dropdown-item" href="logout.php">
                                                    <i class="dropdown-icon fa fa-alert-circle"></i> Sign out
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="demo-icon nav-link icon">
                                <i class="fa fa-cog fa-spin text_primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>                <!-- /APP-HEADER -->

                <!--APP-SIDEBAR-->
                
			<div class="sticky">
                <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
                <div class="app-sidebar">
                    <div class="side-header">
                        <a class="header-brand1" href="index.php">
                            <!--<img src="assets/images/brand/logo.png" class="header-brand-img desktop-logo" alt="logo">-->
                            <!--<img src="assets/images/brand/logo-1.png" class="header-brand-img toggle-logo" alt="logo">-->
                            <!--<img src="assets/images/brand/logo-2.png" class="header-brand-img light-logo" alt="logo">-->
                            <!--<img src="assets/images/brand/logo-3.png" class="header-brand-img light-logo1" alt="logo">-->
                            <h2 class="header-brand-img desktop-logo" style="margin-left:-12px;font-weight: bold;color:white"> Grid</h2>
                            <h6 class="header-brand-img toggle-logo" style="margin-left:-35px;font-weight: bold;">Grid</h6>
                            <h6 class="header-brand-img light-logo" style="margin-left:-12px;font-weight: bold;"> Grid</h6>
                            <h2 class="header-brand-img light-logo1" style="margin-left:-35px;font-weight: bold;">Grid</h2>
                        </a>
                        <!-- LOGO -->
                    </div>






                    <div class="main-sidemenu">
                        <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"><path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"/></svg></div>
                        <ul class="side-menu">
                            <li class="sub-category">
                                <h3>Main</h3>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item has-link" data-bs-toggle="slide" href="index.php"><i class="side-menu__icon fa fa-home"></i><span class="side-menu__label">Analytics</span></a>
                            </li>


                             <!-- my list -->

                             <li class="sub-category">
                                <h3>Create</h3>
                            </li>
                            
                            <?php 
                            
                                if(isset($_SESSION["role"]) && $_SESSION["role"] == '0')
                                {
                                    ?>
                                        <li class="slide">
                                            <a class="side-menu__item" href="add_vendor.php"><i class="side-menu__icon fas fa-user-plus"></i><span class="side-menu__label">Add Vendor</span></a>
                                        </li>
                                    <?php
                                }
                            
                            ?>
                            
                            <!--<hr style="border:1px solid black" />-->
                       
                            <li class="slide">
                                <a class="side-menu__item" href="add_company.php"><i class="side-menu__icon fas fa-user-plus"></i><span class="side-menu__label">Add Company Profile</span></a>
                            </li>
        
                        
                            <li class="slide">
                                <a class="side-menu__item" href="add_business_customer.php"><i class="side-menu__icon fas fa-user-tie"></i><span class="side-menu__label">Add Bussiness Customer</span></a>
                            </li>
                            
                            <li class="slide">
                                <a class="side-menu__item" href="add_individual_customer.php"><i class="side-menu__icon fa fa-user"></i><span class="side-menu__label">Add Individual Customer</span></a>
                            </li>
                            
                            <li class="slide">
                                <a class="side-menu__item" href="add_guard.php"><i class="side-menu__icon fa-solid fa-user-shield"></i><span class="side-menu__label">Add Guard</span></a>
                            </li>
                            
                            
                            <li class="slide">
                                <a class="side-menu__item" href="add_bank.php"><i class="side-menu__icon fa fa-bank"></i><span class="side-menu__label">Add Bank</span></a>
                            </li>

                            
                             <li class="sub-category">
                                <h3>View The Details</h3>
                            </li>
                            
                            <li class="slide">
                                <a class="side-menu__item" href="sent_notification.php"><i class="side-menu__icon fa-solid fa-bell"></i><span class="side-menu__label">Sent Notification</span></a>
                            </li>
                            
                            
                             <?php 
                            
                                if(isset($_SESSION["role"]) && $_SESSION["role"] == '0')
                                {
                                    ?>
                                        <li class="slide">
                                            <a class="side-menu__item" href="manage_vendor.php"><i class="side-menu__icon fa-solid fa-pen-to-square"></i><span class="side-menu__label">Manage Vendor</span></a>
                                        </li>
                                    <?php
                                }
                            
                            ?>
                            
                            
                            <li class="slide">
                                <a class="side-menu__item" href="manage_company_profile.php"><i class="side-menu__icon fa-solid fa-pen-to-square"></i><span class="side-menu__label">Manage Company Profile</span></a>
                            </li>
                        
                            <li class="slide">
                                <a class="side-menu__item" href="manage_comapny.php"><i class="side-menu__icon fa-solid fa-pen-to-square"></i><span class="side-menu__label">Manage Company</span></a>
                            </li>
                            
                             <li class="slide">
                                <a class="side-menu__item" href="manage_individual.php"><i class="side-menu__icon fa-solid fa-pen-to-square"></i><span class="side-menu__label">Manage Individual</span></a>
                            </li>
                            
                            <li class="slide">
                                <a class="side-menu__item" href="manage_guard.php"><i class="side-menu__icon fa-solid fa-pen-to-square"></i><span class="side-menu__label">Manage Guard</span></a>
                            </li>
         
                            <li class="slide">
                                <a class="side-menu__item" href="manage_bank.php"><i class="side-menu__icon fa-solid fa-pen-to-square"></i><span class="side-menu__label">Manage Banks</span></a>
                            </li>
                            
                            <li class="slide">
                                <a class="side-menu__item" href="manage_petrol_service_request.php"><i class="side-menu__icon fa-solid fa-pen-to-square"></i><span class="side-menu__label">Manage Petrol Request</span></a>
                            </li>
                            
                            <li class="slide">
                                <a class="side-menu__item" href="manage_standing_service_request.php"><i class="side-menu__icon fa-solid fa-pen-to-square"></i><span class="side-menu__label">Manage Standing Request</span></a>
                            </li>
                            
                              <!--end-->
    
                            


                             <!-- my list -->



                            <!--<li class="sub-category">-->
                            <!--    <h3>UI Kit</h3>-->
                            <!--</li>-->
                            <!--<li class="slide">-->
                            <!--    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i class="side-menu__icon fa fa-slack"></i><span class="side-menu__label">Apps</span><i class="angle fa fa-chevron-right"></i></a>-->
                            <!--    <ul class="slide-menu">-->
                            <!--        <li class="side-menu-label1"><a href="javascript:void(0)">Apps</a></li>-->
                            <!--        <li><a href="cards.php" class="slide-item"> Cards design</a></li>-->
                            <!--        <li><a href="calendar.php" class="slide-item"> Default calendar</a></li>-->
                            <!--        <li><a href="calendar2.php" class="slide-item"> Full calendar</a></li>-->
                            <!--        <li><a href="chat.php" class="slide-item"> Chat</a></li>-->
                            <!--        <li><a href="notify.php" class="slide-item"> Notifications</a></li>-->
                            <!--        <li><a href="sweetalert.php" class="slide-item"> Sweet alerts</a></li>-->
                            <!--        <li><a href="rangeslider.php" class="slide-item"> Range slider</a></li>-->
                            <!--        <li><a href="scroll.php" class="slide-item"> Content Scroll bar</a></li>-->
                            <!--        <li><a href="loaders.php" class="slide-item"> Loaders</a></li>-->
                            <!--        <li><a href="counters.php" class="slide-item"> Counters</a></li>-->
                            <!--        <li><a href="rating.php" class="slide-item"> Rating</a></li>-->
                            <!--        <li><a href="timeline.php" class="slide-item"> Timeline</a></li>-->
                            <!--        <li><a href="treeview.php" class="slide-item"> Treeview</a></li>-->
                            <!--        <li><a href="chart.php" class="slide-item"> Charts</a></li>-->
                            <!--        <li><a href="footers.php" class="slide-item"> Footers</a></li>-->
                            <!--        <li><a href="users-list.php" class="slide-item"> User List</a></li>-->
                            <!--        <li><a href="search.php" class="slide-item">Search</a></li>-->
                            <!--        <li><a href="crypto-currencies.php" class="slide-item"> Crypto-currencies</a></li>-->
                            <!--        <li><a href="widgets.php" class="slide-item"> Widgets</a></li>-->

                            <!--    </ul>-->
                            <!--</li>-->

                            <!--<li class="slide">-->
                            <!--    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i-->
                            <!--            class="side-menu__icon fa fa-package"></i><span-->
                            <!--            class="side-menu__label">Bootstrap</span><i-->
                            <!--            class="angle fa fa-chevron-right"></i></a>-->
                            <!--    <ul class="slide-menu mega-slide-menu"> -->
                            <!--        <li class="side-menu-label1"><a href="javascript:void(0)">Bootstrap</a></li>-->
                            <!--        <div class="mega-menu">-->
                            <!--            <div class=""> -->
                            <!--                <ul> -->
                            <!--                    <li><a href="alerts.php" class="slide-item"> Alerts</a></li>-->
                            <!--                    <li><a href="buttons.php" class="slide-item"> Buttons</a></li>-->
                            <!--                    <li><a href="colors.php" class="slide-item"> Colors</a></li>-->
                            <!--                    <li><a href="avatarsquare.php" class="slide-item"> Avatar Square</a></li>-->
                            <!--                    <li><a href="avatar-radius.php" class="slide-item"> Avatar Radius</a></li>-->
                            <!--                    <li><a href="avatar-round.php" class="slide-item"> Avatar Rounded</a></li>-->
                            <!--                    <li><a href="dropdown.php" class="slide-item"> Dropdowns</a></li>-->
                            <!--                </ul>-->
                            <!--            </div> -->
                            <!--            <div class=""> -->
                            <!--                <ul> -->
                            <!--                    <li><a href="listgroup.php" class="slide-item"> List Group</a></li>-->
                            <!--                    <li><a href="tags.php" class="slide-item"> Tags</a></li>-->
                            <!--                    <li><a href="pagination.php" class="slide-item"> Pagination</a></li>-->
                            <!--                    <li><a href="navigation.php" class="slide-item"> Navigation</a></li>-->
                            <!--                    <li><a href="typography.php" class="slide-item"> Typography</a></li>-->
                            <!--                    <li><a href="breadcrumbs.php" class="slide-item"> Breadcrumbs</a></li>-->
                            <!--                    <li><a href="badge.php" class="slide-item"> Badges / Pills</a></li>-->
                            <!--                </ul> -->
                            <!--            </div> -->
                            <!--            <div class=""> -->
                            <!--                <ul> -->
                            <!--                    <li><a href="panels.php" class="slide-item"> Panels</a></li>-->
                            <!--                    <li><a href="thumbnails.php" class="slide-item"> Thumbnails</a></li>-->
                            <!--                    <li><a href="offcanvas.php" class="slide-item"> Offcanvas</a></li>-->
                            <!--                    <li><a href="toast.php" class="slide-item"> Toast</a></li>-->
                            <!--                    <li><a href="scrollspy.php" class="slide-item"> Scrollspy</a></li>-->
                            <!--                    <li><a href="mediaobject.php" class="slide-item"> Media Object</a></li>-->
                            <!--                </ul> -->
                            <!--            </div> -->
                            <!--            <div class=""> -->
                            <!--                <ul> -->
                            <!--                    <li><a href="accordion.php" class="slide-item"> Accordions </a></li>-->
                            <!--                    <li><a href="tabs.php" class="slide-item"> Tabs</a></li>-->
                            <!--                    <li><a href="modal.php" class="slide-item"> Modal</a></li>-->
                            <!--                    <li><a href="tooltipandpopover.php" class="slide-item"> Tooltip and popover</a></li>-->
                            <!--                    <li><a href="progress.php" class="slide-item"> Progress</a></li>-->
                            <!--                    <li><a href="carousel.php" class="slide-item"> Carousels</a></li>-->
                            <!--                </ul> -->
                            <!--            </div> -->
                            <!--        </div>-->
                            <!--    </ul>-->
                            <!--</li>-->
                            <!--<li>-->
                            <!--    <a class="side-menu__item has-link" href="landing-page.php" target="_blank"><i-->
                            <!--            class="side-menu__icon fa fa-zap"></i><span-->
                            <!--            class="side-menu__label">Landing Page</span><span class="badge bg-green br-5 side-badge blink-text pb-1">New</span></a>-->
                            <!--</li>-->
                            <!--<li class="sub-category">-->
                            <!--    <h3>Pre-build Pages</h3>-->
                            <!--</li>-->
                            <!--<li class="slide">-->
                            <!--    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i class="side-menu__icon fa fa-layers"></i><span class="side-menu__label">Pages</span><i class="angle fa fa-chevron-right"></i></a>-->
                            <!--    <ul class="slide-menu">-->
                            <!--        <li class="side-menu-label1"><a href="javascript:void(0)">Pages</a></li>-->
                            <!--        <li><a href="profile.php" class="slide-item"> Profile</a></li>-->
                            <!--        <li><a href="editprofile.php" class="slide-item"> Edit Profile</a></li>-->
                            <!--        <li><a href="notify-list.php" class="slide-item"> Notifications List</a></li>-->
                            <!--        <li><a href="email-compose.php" class="slide-item"> Mail-Compose</a></li>-->
                            <!--        <li><a href="email-inbox.php" class="slide-item"> Mail-Inbox</a></li>-->
                            <!--        <li><a href="email-read.php" class="slide-item"> Mail-Read</a></li>-->
                            <!--        <li><a href="gallery.php" class="slide-item"> Gallery</a></li>-->
                            <!--        <li class="sub-slide">-->
                            <!--            <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span class="sub-side-menu__label">Forms</span><i class="sub-angle fa fa-chevron-right"></i></a>-->
                            <!--            <ul class="sub-slide-menu">-->
                            <!--                <li><a href="form-elements.php" class="sub-slide-item"> Form Elements</a></li>-->
                            <!--                <li><a href="form-layouts.php" class="sub-slide-item"> Form Layouts</a></li>-->
                            <!--                <li><a href="form-advanced.php" class="sub-slide-item"> Form Advanced</a></li>-->
                            <!--                <li><a href="form-editor.php" class="sub-slide-item"> Form Editor</a></li>-->
                            <!--                <li><a href="form-wizard.php" class="sub-slide-item"> Form Wizard</a></li>-->
                            <!--                <li><a href="form-validation.php" class="sub-slide-item"> Form Validation</a></li>-->
                            <!--                <li><a href="form-input-spinners.php" class="sub-slide-item"> Form Input Spinners</a></li>-->
                            <!--            </ul>-->
                            <!--        </li>-->
                            <!--        <li class="sub-slide">-->
                            <!--            <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span class="sub-side-menu__label">Tables</span><i class="sub-angle fa fa-chevron-right"></i></a>-->
                            <!--            <ul class="sub-slide-menu">-->
                            <!--                <li><a href="tables.php" class="sub-slide-item">Default table</a></li>-->
                            <!--                <li><a href="datatable.php" class="sub-slide-item"> Data Tables</a></li>-->
                            <!--                <li><a href="edit-table.php" class="sub-slide-item"> Edit Tables</a></li>-->
                            <!--                <li><a href="extension-tables.php" class="sub-slide-item"> Extension Tables</a></li>-->
                            <!--            </ul>-->
                            <!--        </li>-->
                            <!--        <li class="sub-slide">-->
                            <!--            <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span class="sub-side-menu__label">Extension</span><i class="sub-angle fa fa-chevron-right"></i></a>-->
                            <!--            <ul class="sub-slide-menu">-->
                            <!--                <li><a href="about.php" class="sub-slide-item"> About Company</a></li>-->
                            <!--                <li><a href="services.php" class="sub-slide-item"> Services</a></li>-->
                            <!--                <li><a href="faq.php" class="sub-slide-item"> FAQS</a></li>-->
                            <!--                <li><a href="terms.php" class="sub-slide-item"> Terms</a></li>-->
                            <!--                <li><a href="invoice.php" class="sub-slide-item"> Invoice</a></li>-->
                            <!--                <li><a href="pricing.php" class="sub-slide-item"> Pricing Tables</a></li>-->
                            <!--                <li><a href="settings.php" class="sub-slide-item"> Settings</a></li>-->
                            <!--                <li><a href="blog.php" class="sub-slide-item"> Blog</a></li>-->
                            <!--                <li><a href="blog-details.php" class="sub-slide-item"> Blog Details</a></li>-->
                            <!--                <li><a href="blog-post.php" class="sub-slide-item"> Blog Post</a></li>-->
                            <!--                <li><a href="empty.php" class="sub-slide-item"> Empty Page</a></li>-->
                            <!--                <li><a href="construction.php" class="sub-slide-item"> Under Construction</a></li>-->
                            <!--            </ul>-->
                            <!--        </li>-->
                            <!--        <li><a href="switcher-1.php" class="slide-item"> Switcher</a></li>-->
                            <!--    </ul>-->
                            <!--</li>-->
                            <!--<li class="slide">-->
                            <!--    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i class="side-menu__icon fa fa-shopping-bag"></i><span class="side-menu__label">E-Commerce</span><i class="angle fa fa-chevron-right"></i></a>-->
                            <!--    <ul class="slide-menu">-->
                            <!--        <li class="side-menu-label1"><a href="javascript:void(0)">E-Commerce</a></li>-->
                            <!--        <li><a href="shop.php" class="slide-item"> Shop</a></li>-->
                            <!--        <li><a href="shop-description.php" class="slide-item"> Product Details</a></li>-->
                            <!--        <li><a href="cart.php" class="slide-item"> Shopping Cart</a></li>-->
                            <!--        <li><a href="add-product.php" class="slide-item"> Add Product</a></li>-->
                            <!--        <li><a href="wishlist.php" class="slide-item"> Wishlist</a></li>-->
                            <!--        <li><a href="checkout.php" class="slide-item"> Checkout</a></li>-->
                            <!--    </ul>-->
                            <!--</li>-->
                            <!--<li class="slide">-->
                            <!--    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i class="side-menu__icon fa fa-folder"></i><span class="side-menu__label">File Manager</span><span class="badge bg-pink side-badge">4</span><i class="angle fa fa-chevron-right hor-angle"></i></a>-->
                            <!--    <ul class="slide-menu">-->
                            <!--        <li class="side-menu-label1"><a href="javascript:void(0)">File Manager</a></li>-->
                            <!--        <li><a href="file-manager.php" class="slide-item"> File Manager</a></li>-->
                            <!--        <li><a href="filemanager-list.php" class="slide-item"> File Manager List</a></li>-->
                            <!--        <li><a href="filemanager-details.php" class="slide-item"> File Details</a></li>-->
                            <!--        <li><a href="file-attachments.php" class="slide-item"> File Attachments</a></li>-->
                            <!--    </ul>-->
                            <!--</li>-->
                            <!--<li class="sub-category">-->
                            <!--    <h3>Misc Pages</h3>-->
                            <!--</li>-->
                            <!--<li class="slide">-->
                            <!--    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i class="side-menu__icon fa fa-users"></i><span class="side-menu__label">Authentication</span><i class="angle fa fa-chevron-right"></i></a>-->
                            <!--    <ul class="slide-menu">-->
                            <!--        <li class="side-menu-label1"><a href="javascript:void(0)">Authentication</a></li>-->
                            <!--        <li><a href="login.php" class="slide-item"> Login</a></li>-->
                            <!--        <li><a href="register.php" class="slide-item"> Register</a></li>-->
                            <!--        <li><a href="forgot-password.php" class="slide-item"> Forgot Password</a></li>-->
                            <!--        <li><a href="lockscreen.php" class="slide-item"> Lock screen</a></li>-->
                            <!--        <li class="sub-slide">-->
                            <!--            <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span class="sub-side-menu__label">Error Pages</span><i class="sub-angle fa fa-chevron-right"></i></a>-->
                            <!--            <ul class="sub-slide-menu">-->
                            <!--                <li><a href="400.php" class="sub-slide-item"> 400</a></li>-->
                            <!--                <li><a href="401.php" class="sub-slide-item"> 401</a></li>-->
                            <!--                <li><a href="403.php" class="sub-slide-item"> 403</a></li>-->
                            <!--                <li><a href="404.php" class="sub-slide-item"> 404</a></li>-->
                            <!--                <li><a href="500.php" class="sub-slide-item"> 500</a></li>-->
                            <!--                <li><a href="503.php" class="sub-slide-item"> 503</a></li>-->
                            <!--            </ul>-->
                            <!--        </li>-->
                            <!--    </ul>-->
                            <!--</li>-->
                            <!--<li class="slide">-->
                            <!--    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">-->
                            <!--        <i class="side-menu__icon fa fa-cpu"></i>-->
                            <!--        <span class="side-menu__label">Submenu items</span><i class="angle fa fa-chevron-right"></i></a>-->
                            <!--    <ul class="slide-menu">-->
                            <!--        <li class="side-menu-label1"><a href="javascript:void(0)">Submenu items</a></li>-->
                            <!--        <li><a href="javascript:void(0)" class="slide-item">Submenu-1</a></li>-->
                            <!--        <li class="sub-slide">-->
                            <!--            <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span class="sub-side-menu__label">Submenu-2</span><i class="sub-angle fa fa-chevron-right"></i></a>-->
                            <!--            <ul class="sub-slide-menu">-->
                            <!--                <li><a class="sub-slide-item" href="javascript:void(0)">Submenu-2.1</a></li>-->
                            <!--                <li><a class="sub-slide-item" href="javascript:void(0)">Submenu-2.2</a></li>-->
                            <!--                <li class="sub-slide2">-->
                            <!--                    <a class="sub-side-menu__item2" href="javascript:void(0)" data-bs-toggle="sub-slide2"><span class="sub-side-menu__label2">Submenu-2.3</span><i class="sub-angle2 fa fa-chevron-right"></i></a>-->
                            <!--                    <ul class="sub-slide-menu2">-->
                            <!--                        <li><a href="javascript:void(0)" class="sub-slide-item2">Submenu-2.3.1</a></li>-->
                            <!--                        <li><a href="javascript:void(0)" class="sub-slide-item2">Submenu-2.3.2</a></li>-->
                            <!--                        <li><a href="javascript:void(0)" class="sub-slide-item2">Submenu-2.3.3</a></li>-->
                            <!--                    </ul>-->
                            <!--                </li>-->
                            <!--                <li><a class="sub-slide-item" href="javascript:void(0)">Submenu-2.4</a></li>-->
                            <!--                <li><a class="sub-slide-item" href="javascript:void(0)">Submenu-2.5</a></li>-->
                            <!--            </ul>-->
                            <!--        </li>-->
                            <!--    </ul>-->
                            <!--</li>-->
                            <!--<li class="sub-category">-->
                            <!--    <h3>General</h3>-->
                            <!--</li>-->

                            <!--<li class="slide">-->
                            <!--    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i class="side-menu__icon fa fa-map-pin"></i><span class="side-menu__label">Maps</span><i class="angle fa fa-chevron-right"></i></a>-->
                            <!--    <ul class="slide-menu">-->
                            <!--        <li class="side-menu-label1"><a href="javascript:void(0)">Maps</a></li>-->
                            <!--        <li><a href="maps1.php" class="slide-item">Leaflet Maps</a></li>-->
                            <!--        <li><a href="maps2.php" class="slide-item">Mapel Maps</a></li>-->
                            <!--        <li><a href="maps.php" class="slide-item">Vector Maps</a></li>-->
                            <!--    </ul>-->
                            <!--</li>-->
                            <!--<li class="slide">-->
                            <!--    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i class="side-menu__icon fa fa-bar-chart-2"></i><span class="side-menu__label">Charts</span><span class="badge bg-secondary side-badge">6</span><i class="angle fa fa-chevron-right hor-angle"></i></a>-->
                            <!--    <ul class="slide-menu">-->
                            <!--        <li class="side-menu-label1"><a href="javascript:void(0)">Charts</a></li>-->
                            <!--        <li><a href="chart-chartist.php" class="slide-item">Chart Js</a></li>-->
                            <!--        <li><a href="chart-flot.php" class="slide-item"> Flot Charts</a></li>-->
                            <!--        <li><a href="chart-echart.php" class="slide-item"> ECharts</a></li>-->
                            <!--        <li><a href="chart-morris.php" class="slide-item"> Morris Charts</a></li>-->
                            <!--        <li><a href="chart-nvd3.php" class="slide-item"> Nvd3 Charts</a></li>-->
                            <!--        <li><a href="charts.php" class="slide-item"> C3 Bar Charts</a></li>-->
                            <!--        <li><a href="chart-line.php" class="slide-item"> C3 Line Charts</a></li>-->
                            <!--        <li><a href="chart-donut.php" class="slide-item"> C3 Donut Charts</a></li>-->
                            <!--        <li><a href="chart-pie.php" class="slide-item"> C3 Pie charts</a></li>-->
                            <!--    </ul>-->
                            <!--</li>-->
                            <!--<li class="slide">-->
                            <!--    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i class="side-menu__icon fa fa-wind"></i><span class="side-menu__label">Icons</span><i class="angle fa fa-chevron-right"></i></a>-->
                            <!--    <ul class="slide-menu">-->
                            <!--        <li class="side-menu-label1"><a href="javascript:void(0)">Icons</a></li>-->
                            <!--        <li><a href="icons.php" class="slide-item"> Font Awesome</a></li>-->
                            <!--        <li><a href="icons2.php" class="slide-item"> Material Design Icons</a></li>-->
                            <!--        <li><a href="icons3.php" class="slide-item"> Simple Line Icons</a></li>-->
                            <!--        <li><a href="icons4.php" class="slide-item"> Feather Icons</a></li>-->
                            <!--        <li><a href="icons5.php" class="slide-item"> Ionic Icons</a></li>-->
                            <!--        <li><a href="icons6.php" class="slide-item"> Flag Icons</a></li>-->
                            <!--        <li><a href="icons7.php" class="slide-item"> pe7 Icons</a></li>-->
                            <!--        <li><a href="icons8.php" class="slide-item"> Themify Icons</a></li>-->
                            <!--        <li><a href="icons9.php" class="slide-item">Typicons Icons</a></li>-->
                            <!--        <li><a href="icons10.php" class="slide-item">Weather Icons</a></li>-->
                            <!--        <li><a href="icons11.php" class="slide-item">Bootstrap Icons</a></li>-->
                            <!--    </ul>-->
                            <!--</li>-->
                        </ul>
                        <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"><path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"/></svg></div>
                    </div>




                </div>
                <!--/APP-SIDEBAR-->
            </div>                <!--/APP-SIDEBAR-->
            
            
            <script>
function myFunction(x) {
  x.classList.toggle("change");
}
</script>