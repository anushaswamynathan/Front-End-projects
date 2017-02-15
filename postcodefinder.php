<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link href="scraper.php">
  <style>



  html,body
  {
    height: 100%;
  }
      .container
      {
        background-image: url("images/weather1.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        width: 100%;
        height: 100%;
        background-position: center;
        padding-top: 200px; 
      }
      .center
      {
        text-align: center;
      }
      .white
      {
        color: white;
      }

      #alert
      {
        margin-top: 20px;
        display: none;
      }
      #success
      {
        display: none;
        margin-top: 20px;
      }
      #danger1
      {
        display: none;
        margin-top: 20px;
      }
      #danger2
      {
        display: none;
        margin-top: 20px;
      }
      #address
      {
        width: 50%;
        height: 40px;
      }
      .whiteBackground
      {
        background-color: white;
        padding: 20px;
        border-radius: 20px;
      }
      
      
  </style>
  </head>
  <body>
      <div class="container">
          <div class="row">
              <div class="col-md-6 col-md-offset-3 whiteBackground" >
                  <h1 class="center ">
                      Postcode finder
                      </h1>
                      <p class="lead center ">
                          Enter any address to find the postcode
                      </p>
                      <form>
                      <div class="form-group center" >
                          <input type="text" name="Address" id="address" placeholder="Eg. Adi apartments, ...">
                    </div>
                    <div class="center">
                      <button class="btn btn-success btn-lg center" id="button1" >
                          Find my postcode
                      </button>
                      </div>

                      </form>
                 <div class="alert alert-success" id="success">
            Success
        </div>
        <div class="alert alert-danger" id="danger1">
            Could not find post code
        </div>
        <div class="alert alert-danger" id="danger2">
            Could not connect to server
        </div>
        
        
              </div>

        
          </div>
      </div>

      

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript">
    $("#button1").click(function(event)
    {

      event.preventDefault();
      $(".alert").hide();
      var result=0;
      
      $.ajax({
      type:"GET",
      url:"https://maps.googleapis.com/maps/api/geocode/xml?address="+encodeURIComponent($('#address').val())+"&key=AIzaSyCM6YQ0sfTGqFPDBsX36v3hZSfw1SLH39k",
      dataType:"xml",
      success: processXML,
      error: error
    });

    function error()
    {
      $("#danger2").fadeIn();
    }
     function processXML(xml)
     {
       $(xml).find("address_component").each(function()
        {
          if($(this).find("type").text()=="postal_code")
          {
            
            $("#success").html("The post code you need is "+ $(this).find('long_name').text()).fadeIn();
            result=1;
           
          }
        });
       if(result==0)
       {
         $("#danger1").fadeIn();
       }
     }

    });
    


</script>

  </body>
  </html>
