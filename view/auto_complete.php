<!DOCTYPE html>  
 <html>  
      <head>  
           <title>Maladies chroniques</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css
" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js
"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js
"></script>  
           <style>  
           ul{  
                background-color:#eee;  
                cursor:pointer;  
           }  
           li{  
                padding:12px;  
           }  
           </style>  
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:500px;">  
                <h3 align="center">MALADIE CHRONIQUES</h3><br />  
                <label>Entré Maladie Name</label>  
                <form method="POST" action="search3.php"> 
                     <input type="text" name="nom_maladie" id="nom_maladie" class="form-control" placeholder="Entré votre maladie" /> 
          
                 <input type="submit" name="submit" value="envoyer">  
                <div id="nom_maladieList"></div>  
           </div>  
      </body>  
 </html>  

 <script>  
 $(document).ready(function(){  
      $('#nom_maladie').keyup(function(){  
           var query = $(this).val();  
           if(query != '')  
           {  
                $.ajax({  
                     url:"search.php",  
                     method:"POST",  
                     data:{query:query},  
                     success:function(data)  
                     {  
                          $('#nom_maladieList').fadeIn();  
                          $('#nom_maladieList').html(data);  
                     }  
                });  
           }  
      });  
      $(document).on('click', 'li', function(){  
           $('#nom_maladie').val($(this).text());  
           $('#nom_maladieList').fadeOut();  
      });  
 });  
 </script>