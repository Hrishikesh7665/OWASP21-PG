<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <link rel='stylesheet'
      href='./css/bootstrap.css'>
   <link rel='stylesheet' href='./css/mdb.min.css'>
   <script src="js/html5.js"></script>
   <script src="js/json2.js"></script>
   <link rel="stylesheet" href="./style.css">
</head>

<body onload="process()">
   <!-- partial:index.partial.html -->
   <header>

      <!--Navbar-->
      <nav class="navbar navbar-toggleable-md navbar-dark">
         <div class="container">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
               data-target="#navbarNav1" aria-controls="navbarNav1" aria-expanded="false"
               aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">
               <strong>XSS-Shop</strong>
            </a>
            <div class="collapse navbar-collapse" id="navbarNav1">
               <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                     <a class="nav-link">Home <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link">Features</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link">Pricing</a>
                  </li>
                  <li class="nav-item dropdown btn-group">
                     <a class="nav-link dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">More info</a>
                     <div class="dropdown-menu dropdown" aria-labelledby="dropdownMenu1">
                        <a class="dropdown-item">Contact</a>
                        <a class="dropdown-item">Billing adress</a>
                        <a class="dropdown-item">Discounts</a>
                     </div>
                  </li>
               </ul>
               <form class="form-inline waves-effect waves-light" onsubmit="return validateMyForm();">
                  <input class="form-control" type="text" placeholder="Search" id="title" name="title">
               </form>
            </div>
         </div>
      </nav>
      <!--/.Navbar-->

   </header>

   <main>

      <!--Main layout-->
      <div class="container">
         <div class="row">

            <!--Sidebar-->
            <div class="col-lg-4 wow fadeIn" data-wow-delay="0.2s">

            <div class="widget-wrapper">
                  <h4>Task</h4>
                  <br>
                  <div class="list-group">
                     <p style="padding:10px; padding-bottom:0px">Perform a Reflated Cross-Site Scripting (XSS) attacks</p>
                  </div>
               </div>

               <div class="widget-wrapper">
                  <h4>Categories:</h4>
                  <br>
                  <div class="list-group">
                     <a href="#" class="list-group-item active">Woman</a>
                     <a href="#" class="list-group-item">Man</a>
                     <a href="#" class="list-group-item">Shoes</a>
                     <a href="#" class="list-group-item">T-shirt</a>
                     <a href="#" class="list-group-item">Jewellery</a>
                  </div>
               </div>

               <div class="widget-wrapper wow fadeIn" data-wow-delay="0.4s">
                  <h4>Subscription form:</h4>
                  <br>
                  <div class="card">
                     <div class="card-block">
                        <p><strong>Subscribe to our newsletter</strong></p>
                        <p>Once a week we will send you a summary of the most useful news</p>
                        <div class="md-form">
                           <input type="text" id="form1" class="form-control">
                           <label for="form1">Your name</label>
                        </div>
                        <div class="md-form">
                           <input type="text" id="form2" class="form-control">
                           <label for="form2">Your email</label>
                        </div>
                        <button class="btn btn-default">Submit</button>

                     </div>
                  </div>
               </div>

            </div>
            <div class="col-lg-8">

               <!--First row-->
               <div class="row wow fadeIn" data-wow-delay="0.4s">
                  <div class="col-lg-12">
                  <h2 class="h2-responsive" id="result">Search for Anything :)</h2>
                     <div class="divider-new">
                        <h2 class="h2-responsive">What's new?</h2>
                     </div>
                     <!--Carousel Wrapper-->
                     <div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
                        <!--Indicators-->
                        <ol class="carousel-indicators">
                           <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
                           <li data-target="#carousel-example-1z" data-slide-to="1"></li>
                           <li data-target="#carousel-example-1z" data-slide-to="2"></li>
                        </ol>
                        <!--/.Indicators-->
                        <!--Slides-->
                        <div class="carousel-inner" role="listbox">
                           <!--First slide-->
                           <div class="carousel-item active">
                              <img src="./images/img (107).png" alt="First slide">
                              <div class="carousel-caption">
                                 <h4>New collection</h4>
                                 <br>
                              </div>
                           </div>
                           <!--/First slide-->
                           <!--Second slide-->
                           <div class="carousel-item">
                              <img src="./images/img (109).png" alt="Second slide">
                              <div class="carousel-caption">
                                 <h4>Get discount!</h4>
                                 <br>
                              </div>
                           </div>
                           <!--/Second slide-->
                           <!--Third slide-->
                           <div class="carousel-item">
                              <img src="./images/img (36).png" alt="Third slide">
                              <div class="carousel-caption">
                                 <h4>Only now for $10</h4>
                                 <br>
                              </div>
                           </div>
                           <!--/Third slide-->
                        </div>
                        <!--/.Slides-->
                        <!--Controls-->
                        <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
                           <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                           <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
                           <span class="carousel-control-next-icon" aria-hidden="true"></span>
                           <span class="sr-only">Next</span>
                        </a>
                        <!--/.Controls-->
                     </div>
                     <!--/.Carousel Wrapper-->
                  </div>
               </div>
               <!--/.First row-->
               <br>
               <hr class="extra-margins">

               <!--Second row-->
               <div class="row">
                  <!--First columnn-->
                  <div class="col-lg-4">
                     <!--Card-->
                     <div class="card  wow fadeIn" data-wow-delay="0.2s">

                        <!--Card image-->
                        <div class="view overlay hm-white-slight">
                           <img src="./images/img (32).png"
                              class="img-fluid" alt="">
                           <a href="#">
                              <div class="mask"></div>
                           </a>
                        </div>
                        <!--/.Card image-->

                        <!--Card content-->
                        <div class="card-block">
                           <!--Title-->
                           <h4 class="card-title">Watches</h4>
                           <!--Text-->
                           <p class="card-text">It's never too late or too early to get a watch!</p>
                           <a href="#" class="btn btn-default">Buy now for <strong>$10</strong></a>
                        </div>
                        <!--/.Card content-->

                     </div>
                     <!--/.Card-->
                  </div>
                  <!--First columnn-->

                  <!--Second columnn-->
                  <div class="col-lg-4">
                     <!--Card-->
                     <div class="card  wow fadeIn" data-wow-delay="0.4s">

                        <!--Card image-->
                        <div class="view overlay hm-white-slight">
                           <img src="./images/img (38).png"
                              class="img-fluid" alt="">
                           <a href="#">
                              <div class="mask"></div>
                           </a>
                        </div>
                        <!--/.Card image-->

                        <!--Card content-->
                        <div class="card-block">
                           <!--Title-->
                           <h4 class="card-title">Bags</h4>
                           <!--Text-->
                           <p class="card-text">When you really need to carry extra stuff</p>
                           <a href="#" class="btn btn-default">Buy now for <strong>$30</strong></a>
                        </div>
                        <!--/.Card content-->

                     </div>
                     <!--/.Card-->
                  </div>
                  <!--Second columnn-->

                  <!--Third columnn-->
                  <div class="col-lg-4">
                     <!--Card-->
                     <div class="card  wow fadeIn" data-wow-delay="0.6s">

                        <!--Card image-->
                        <div class="view overlay hm-white-slight">
                           <img src="./images/img (1).png"
                              class="img-fluid" alt="">
                           <a href="#">
                              <div class="mask"></div>
                           </a>
                        </div>
                        <!--/.Card image-->

                        <!--Card content-->
                        <div class="card-block">
                           <!--Title-->
                           <h4 class="card-title">Shoes</h4>
                           <!--Text-->
                           <p class="card-text">You might carry it in some comfortable shoes.</p>
                           <a href="#" class="btn btn-default">Buy now for <strong>20$</strong></a>
                        </div>
                        <!--/.Card content-->

                     </div>
                     <!--/.Card-->
                  </div>
                  <!--Third columnn-->
               </div>
               <!--/.Second row-->

            </div>
            <!--/.Main column-->

         </div>
      </div>
      <!--/.Main layout-->

   </main>

   <!-- partial -->
   <script type="text/javascript">
      function validateMyForm() { return false; }
      window.addEventListener("load", (event) => {
         console.clear();
      });
      var xmlHttp = createXmlHttpRequestObject();
      function createXmlHttpRequestObject() {
         var xmlHttp;
         if (window.ActiveXObject) {
            try {
               xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch (e) {
               xmlHttp = false;
            }
         }
         else {
            try {
               xmlHttp = new XMLHttpRequest();
            }
            catch (e) {
               xmlHttp = false;
            }
         }
         if (!xmlHttp)
            alert("Error creating the XMLHttpRequest object.");
         else
            return xmlHttp;
      }
      function process() {
         if (xmlHttp.readyState == 4 || xmlHttp.readyState == 0) {
            title = encodeURIComponent(document.getElementById("title").value);
            xmlHttp.open("GET", "reqHandel.php?title=" + title, true);
            xmlHttp.onreadystatechange = handleServerResponse;
            xmlHttp.send(null);
         }
         else
            setTimeout("process()", 1000);
      }
      function handleServerResponse() {
         if (xmlHttp.readyState == 4) {
            if (xmlHttp.status == 200) {
               <?php
               ?>
               JSONResponse = eval("(" + xmlHttp.responseText + ")");
               <?php
               ?>
               result = JSONResponse.movies[0].response;
               document.getElementById("result").innerHTML = result;
               setTimeout("process()", 1000);
            }
            else {
               alert("There was a problem accessing the server: " + xmlHttp.statusText);
            }
         }
      }
   </script>
</body>

</html>