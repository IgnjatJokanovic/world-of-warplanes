<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form>
                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label myClass">Email:</label>
                      <input type="text" class="form-control" id="loginMail">
                      <p class="text-danger" name="err"></p>
                    </div>
                    <div class="form-group">
                            <label for="recipient-name" class="col-form-label myClass">Password:</label>
                            <input type="text" class="form-control" id="loginPass">
                            <p class="text-danger" name="err"></p>
                    </div>
                    <div class="form-group">
                      <div id="responseLogin">
                      </div>
                      
                            <button type="submit" class="btn btn-primary" id="login">Login</button>
                    </div>
                   
                  </form>
                </div>
                
              </div>
            </div>
          </div>
          
          <div class="modal fade" id="rateusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form>
                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Rate us:</label>
                      <select id="ddl">
                          <option value="0">Choose</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                      </select>
                    </div>
                    <div id="responseRate">
                      </div>
                    <div class="form-group">
                            <button type="submit" class="btn btn-primary" id="rate">Rate us</button>
                    </div>
                  </form>
                </div>
                
              </div>
            </div>
          </div>
          <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form>
                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Email:</label>
                      <input type="text" class="form-control" id="registerMail">
                      <p class="text-danger" name="errReg"></p>
                    </div>
                    <div class="form-group">
                      <label for="message-text" class="col-form-label">Password:</label>
                      <input type="text" class="form-control" id="registerPass"/>
                      <p class="text-danger" name="errReg"></p>
                    </div>
                    <div class="form-group">
                    <div id="responsereg">
                      </div>
                            <button type="submit" class="btn btn-primary" id="register">Register</button>
                    </div>
                  </form>
                </div>
                
              </div>
            </div>
          </div>
        <!--End of contact-->
		



        <!--Start of footer-->
        <section id="footer">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-6">
                        <div class="copyright">
                            <p>&copy; Ignjat Jokanovic 311/16 </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="designer">
                        <?php if(isset($_SESSION['user']) && $_SESSION['user']->name == 'admin'): ?>

                         <a href="documentation.pdf">DOCUMENTATION</a>

                          <?php endif; ?>
                        </div>
                    </div>
                </div>
                <!--End of row-->
            </div>
            <!--End of container-->
        </section>
		
		
        <!--End of footer-->



        <!--Scroll to top-->
        <a href="#" id="back-to-top" title="Back to top">&uarr;</a>
        <!--End of Scroll to top-->


        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <!-- <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>-->
        <script src="js/jquery-1.12.3.min.js"></script>
        <script src="js/code.js"></script>

        <!--Counter UP Waypoint-->
        <script src="js/waypoints.min.js"></script>
        <!--Counter UP-->
        <script src="js/jquery.counterup.min.js"></script>

        <script>
            //for counter up
            $('.counter').counterUp({
                delay: 10,
                time: 1000
            });
        </script>

        <!--Gmaps-->
        <script src="js/gmaps.min.js"></script>
        
        <!--Google Maps API-->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBjxvF9oTfcziZWw--3phPVx1ztAsyhXL4"></script>


        <!--Isotope-->
        <script src="js/isotope/min/scripts-min.js"></script>
        <script src="js/isotope/cells-by-row.js"></script>
        <script src="js/isotope/isotope.pkgd.min.js"></script>
        <script src="js/isotope/packery-mode.pkgd.min.js"></script>
        <script src="js/isotope/scripts.js"></script>


        <!--Back To Top-->
        <script src="js/backtotop.js"></script>


        <!--JQuery Click to Scroll down with Menu-->
        <script src="js/jquery.localScroll.min.js"></script>
        <script src="js/jquery.scrollTo.min.js"></script>
        <!--WOW With Animation-->
        <script src="js/wow.min.js"></script>
        <!--WOW Activated-->
        <script>
            new WOW().init();
        </script>


        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        <!-- Custom JavaScript-->
        <script src="js/main.js"></script>
        

        <script src="js/lightbox.js"></script>
		
		
    </body>

</html>