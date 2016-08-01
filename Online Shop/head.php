<?php

    echo"<meta charset=\"utf-8\"/>
  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Main</title>

  <script src=\"js/jquery-2.1.4.js\"></script>
  <script src=\"js/bootstrap.js\"></script>
  <script type=\"text/javascript\">
        $(document).ready(function(){

            $(\"#search_box\").keyup(function(){

                var search=$(\"#search_box\").val();
                $.ajax({
                    type:\"POST\",
                    url:\"search.php\",
                    data:{search:search},
                    success:function(res){
                        $(\"#search_list\").html(res);
                    }
                });
            });
        });
    </script>

  <link href=\"css/bootstrap.css\" rel=\"stylesheet\"/>
  <link href=\"css/bootstrap-theme.css\" rel=\"stylesheet\"/>
  <link href=\"css/boot.css\" rel=\"stylesheet\"/>
"
?>