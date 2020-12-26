
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>todo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
   -->
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous">
    </script>
</head>
<body">


    <!-- form send data to process page -->
    <div class="row justify-content-center" style="margin-top:100px !important; ">
            <form id="form" class="col-md-8" >
                <div class="form-group">
                    <input class="form-control"  placeholder="Enter Your Data" id="todo">
                </div>
                <div class="form-group">
                    <button id="create" disabled  name="create" type="submit" class="btn btn-default" style="background: #333333;color:white;">Submit</button>
                </div>
            </form>
    </div>

    <!-- area that dispaly data  -->
    <div class="row justify-content-center col-md-6">
        <table class="table">
            <thead>
                <tr>
                    <th></th>
                    <th>id</th>
                    <th>Note</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="result"></tbody>
        </table>
    </div> 


    <script>
         $(function() {
            //check input if empty
            $("#todo").keyup(function () {
                if ($("#todo").val() != "") {
                    $("#create").removeAttr('disabled');
                } else {
                    $("#create").attr('disabled','disabled');
                }
                
            });
            //on load
            $.ajax({
                method:'POST',
                url:'server.php',
                success:function (data) {
                    $('#result').html(data);
                }
            });


            $('#form').submit(function (e) {
                e.preventDefault();
                $.ajax({
                    method:'POST',
                    url:'server.php',
                    data:{todo:$('#todo').val()},
                    success:function (data) {
                        $('#result').html(data);
                    }
                });
            });


        });

        function del(id) {
            var r = confirm('are you sure to delete?');
            if (r==true) {
                $.ajax({
                    method:'POST',
                    url:'server.php',
                    data:{"del":id},
                    success:function (data) {
                        $('#result').html(data);
                        // console.log(data);
                    }
                });
            }    
        }

    </script>

</body>
</html>