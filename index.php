<?php 

require './Admin/helpers/dbConnection.php';
require './Admin/helpers/helpers.php';

# Fetch Articales .... 


$sql = "select articales.*,category.title as catTitle , users.name from articales 
join category on category.id = articales.cat_id    
join users  on users.id = articales.addedby ";
$data = mysqli_query($con,$sql);


// function printdata($input){
//   while($fData = mysqli_fetch_assoc($input)){
//     echo $fData['id'];
//   }
// }



require 'layouts/header.php';
?>


<body>

<!-- page wrapper start -->

<div class="page-wrapper">

<!-- preloader start -->

<div id="ht-preloader">
  <div class="loader clear-loader">
    <div class="loader-text">Loading</div>
    <div class="loader-dots"> <span></span>
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
</div>

<!-- preloader end -->

<?php 
  
  // while($test = mysqli_fetch_assoc($data)){
  //   echo $test['id'];
  // }



      //  print_r(mysqli_fetch_assoc($data));
      //  exit();


       //  $fundata = printdata($data);


?>






<!--header start-->

<header id="site-header" class="header">
  <div id="header-wrap">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <!-- Navbar -->
          <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand logo" href="index-2.html">
              <img id="logo-img" class="img-center" src="assets/images/logo.png" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation"> <span></span>
              <span></span>
              <span></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav ml-auto mr-auto">
                <!-- Home -->
                <li class="nav-item dropdown" data-toggle="hover"> <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Home</a>
                  <div class="dropdown-menu">
                    <ul class="list-unstyled">
                      <li><a href="index-2.html">Home 1</a>
                      </li>
                      <li><a href="index-3.html">Home 2</a>
                      </li>
                      <li><a href="index-4.html">Home 3</a>
                      </li>
                      <li><a href="index-5.html">Home 4</a>
                      </li>
                      <li><a href="index-6.html">Home 5</a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="nav-item dropdown" data-toggle="hover"> <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
                  <div class="dropdown-menu">
                    <ul class="list-unstyled">
                      <li><a href="about-us.html">About Us 1</a>
                      </li>
                      <li><a href="about-us-2.html">About Us 2</a>
                      </li>
                      <li><a href="team.html">Team</a>
                      </li>
                      <li><a href="team-single.html">Team Single</a>
                      </li>
                      <li><a href="faq.html">Faq</a>
                      </li>
                      <li class="dropdown dropdown-submenu" data-toggle="hover"> <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Case Studies
                    </a>
                        <ul class="dropdown-menu">
                          <li><a href="case-studies-grid-2.html">Case Studies Column 2</a>
                          </li>
                          <li><a href="case-studies-grid-3.html">Case Studies Column 3</a>
                          </li>
                          <li><a href="case-studies-fullwidth.html">Case Studies FullWidth</a>
                          </li>
                          <li><a href="case-studies-single.html">Case Studies Single</a>
                          </li>
                        </ul>
                      </li>
                      <li class="dropdown dropdown-submenu" data-toggle="hover"> <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      feature
                    </a>
                        <ul class="dropdown-menu">
                          <li><a href="shortcode-accordions.html">Accordion</a>
                          </li>
                          <li><a href="shortcode-blog-post.html">Blog Post</a>
                          </li>
                          <li><a href="shortcode-counter.html">Counter</a>
                          </li>
                          <li><a href="shortcode-feature-box.html">Featured Box</a>
                          </li>
                          <li><a href="shortcode-pricing.html">Pricing Table</a>
                          </li>
                          <li><a href="shortcode-team.html">Team</a>
                          </li>
                          <li><a href="shortcode-testimonial.html">Testimonials</a>
                          </li>
                        </ul>
                      </li>
                      <li><a href="coming-soon.html">Coming Soon</a>
                      </li>
                      <li><a href="error-404.html">Error 404</a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="nav-item dropdown" data-toggle="hover"> <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Services</a>
                  <div class="dropdown-menu">
                    <ul class="list-unstyled">
                      <li><a href="service.html">Service 1</a>
                      </li>
                      <li><a href="service-2.html">Service 2</a>
                      </li>
                      <li><a href="service-single.html">Service Single</a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="nav-item dropdown" data-toggle="hover"> <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Project</a>
                  <div class="dropdown-menu">
                    <ul class="list-unstyled">
                      <li><a href="project-grid-2.html">Project Grid 2</a>
                      </li>
                      <li><a href="project-grid-3.html">Project Grid 3</a>
                      </li>
                      <li> <a href="project-fullwidth.html">Project FullWidth</a>
                      </li>
                      <li> <a href="project-details.html">Project Details</a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="nav-item dropdown" data-toggle="hover"> <a class="nav-link active dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">News</a>
                  <div class="dropdown-menu">
                    <ul class="list-unstyled">
                      <li><a href="blog-classic.html">Blog Classic</a>
                      </li>
                      <li><a href="blog-grid-2.html">Blog Grid 2</a>
                      </li>
                      <li><a href="blog-grid-3.html">Blog Grid 3</a>
                      </li>
                      <li><a href="blog-left-sidebar.html">Blog left sidebar</a>
                      </li>
                      <li><a href="blog-right-sidebar.html">Blog right sidebar</a>
                      </li>
                      <li><a href="blog-details.html">Blog Single</a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="nav-item dropdown" data-toggle="hover"> <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Contact</a>
                  <div class="dropdown-menu">
                    <ul class="list-unstyled">
                      <li><a href="contact.html">Contact us 1</a>
                      </li>
                      <li><a href="contact-2.html">Contact us 2</a>
                      </li>
                    </ul>
                  </div>
                </li>
              </ul>
            </div>
            <div class="right-nav align-items-center d-flex justify-content-end list-inline"> <a class="btn btn-white btn-sm" href="login.html">Login</a>
              <div class="search">
                <div class="search-content">
                  <div class="search-button"> <i class="fas fa-search"></i>
                  </div>
                  <form id="search-form" class="search-form">
                    <input type="search" class="search-input" placeholder="Search Here...">
                  </form>
                </div>
              </div> <a href="#" class="ht-nav-toggle"><span></span></a>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </div>
</header>

<nav id="ht-main-nav"> <a href="#" class="ht-nav-toggle active"><span></span></a>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <img class="img-fluid side-logo mb-3" src="images/logo.png" alt="">
        <p class="mb-5">Loptus - Digital Marketing Agency Responsive HTML5 Template is Most PowerFull template 2018 For Everyone, Start working with an company that provide everything you need to generate awareness.</p>
        <div class="form-info">
          <h4 class="title">Contact info</h4>
          <ul class="contact-info list-unstyled mt-4">
            <li class="mb-4"><i class="flaticon-location"></i><span>Address:</span>
              <p>423B, Road Wordwide Country, USA</p>
            </li>
            <li class="mb-4"><i class="flaticon-call"></i><span>Phone:</span><a href="tel:+912345678900">+91-234-567-8900</a>
            </li>
            <li><i class="flaticon-email"></i><span>Email</span><a href="mailto:themeht23@gmail.com"> themeht23@gmail.com</a>
            </li>
          </ul>
        </div>
        <div class="social-icons social-colored mt-5">
          <ul class="list-inline">
            <li class="mb-2 social-facebook"><a href="#"><i class="fab fa-facebook-f"></i></a>
            </li>
            <li class="mb-2 social-twitter"><a href="#"><i class="fab fa-twitter"></i></a>
            </li>
            <li class="mb-2 social-linkedin"><a href="#"><i class="fab fa-linkedin-in"></i></a>
            </li>
            <li class="mb-2 social-gplus"><a href="#"><i class="fab fa-google-plus-g"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</nav>

<!--header end-->


<!--page title start-->

<section class="page-title o-hidden text-center grey-bg bg-contain animatedBackground" data-bg-img="images/pattern/05.png">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-12">
        <h1 class="title">Blog Grid 3</h1>
        <nav aria-label="breadcrumb" class="page-breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index-2.html">Home</a>
            </li>
            <li class="breadcrumb-item"><a href="#">Blog</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Blog Grid 3</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <div class="page-title-pattern"><img class="img-fluid" src="images/bg/06.png" alt=""></div>
</section>

<!--page title end-->


<!--body content start-->

<div class="page-content">

<!--blog start-->

<section>
  <div class="container">
    <div class="row">
    <!-- col-lg-4 col-md-6      col-lg-4 col-md-6 sm-mt-5        col-lg-4 col-md-6 md-mt-5 -->
    

   <?php 

        $classes =  ['col-lg-4 col-md-6','col-lg-4 col-md-6 sm-mt-5','col-lg-4 col-md-6 md-mt-5'];
        $i = 0;
       //  $art = [];
        while($FData = mysqli_fetch_assoc($data)){
         //  $art[] = $FData;
           if($i == 3){
             $i = 0;
           }

   ?>

    <div class="<?php echo $classes[$i];?>">   
        <div class="post">
          <div class="post-image">
            <img class="img-fluid h-100 w-100" src="<?php echo url('Articales/uploads/'.$FData['image'])?>" alt="">
          </div>
          <div class="post-desc">
            <div class="post-date"> <?php echo date('d');?> <span><?php echo date('M,Y');?> || <?php echo $FData['catTitle'];?></span>
            </div>
            <div class="post-title">
              <h5><a href="blog-details.html"><?php echo $FData['title'];?></a></h5>
            </div>
            <p><?php echo substr($FData['content'],0,30);?></p>
            <div class="post-author">
              <div class="post-author-img">
                <img class="img-fluid" src="assets/images/thumbnail/01.png" alt="">
              </div> <span><?php echo $FData['name'];?></span>
            </div>
          </div>
        </div>
      </div>


       <?php 
         $i++;
            }




            // foreach($art as $sData){

            //   echo $sData['title'].'<br>';
            // }

         ?>



    












    </div>
  </div>
</section>

<!--blog end-->


<!--counter start-->

<section class="grey-bg">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-6">
        <div class="counter style-2">
          <img class="img-center" src="images/counter/01.png" alt=""> <span class="count-number" data-to="2304" data-speed="10000">2304</span>
          <h5>Project Done</h5>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-6 xs-mt-5">
        <div class="counter style-2">
          <img class="img-center" src="images/counter/02.png" alt=""> <span class="count-number" data-to="2304" data-speed="10000">2304</span>
          <h5>Success Rate</h5>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-6 sm-mt-5">
        <div class="counter style-2">
          <img class="img-center" src="images/counter/03.png" alt=""> <span class="count-number" data-to="2304" data-speed="10000">2304</span>
          <h5>Awards</h5>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-6 sm-mt-5">
        <div class="counter style-2">
          <img class="img-center" src="images/counter/04.png" alt=""> <span class="count-number" data-to="2304" data-speed="10000">2304</span>
          <h5>Happy Client</h5>
        </div>
      </div>
    </div>
  </div>
</section>

<!--counter end-->



<!--client logo start-->

<section>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="ht-clients d-flex flex-wrap align-items-center text-center">
          <div class="clients-logo">
            <img class="img-center" src="images/client/07.png" alt="">
          </div>
          <div class="clients-logo">
            <img class="img-center" src="images/client/08.png" alt="">
          </div>
          <div class="clients-logo">
            <img class="img-center" src="images/client/09.png" alt="">
          </div>
          <div class="clients-logo">
            <img class="img-center" src="images/client/10.png" alt="">
          </div>
          <div class="clients-logo">
            <img class="img-center" src="images/client/11.png" alt="">
          </div>
          <div class="clients-logo">
            <img class="img-center" src="images/client/12.png" alt="">
          </div>
          <div class="clients-logo">
            <img class="img-center" src="images/client/12.png" alt="">
          </div>
          <div class="clients-logo">
            <img class="img-center" src="images/client/12.png" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!--client logo end-->

</div>






<!--body content end--> 
<?php 

// echo $fundata;

 require 'layouts/footer.php';
?>