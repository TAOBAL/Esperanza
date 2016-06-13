<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Dashboard</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/dataTables.bootstrap.min.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="css/fontawesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<style>
    .container textarea{
        font-size: 15px;
    }
</style>
<body style=" background-color: #f4f4f4">
<div class="top_bg" style="height: 70px">
    <div class="wrap">
        <div class="header">
            <div class="logo">
                <a href="index.php"><img src="images/col1.png" width="150px" height="50px" alt=""/></a>
            </div>
        </div>
    </div>
</div><br><br>
<div class="container">
<div class="row">
    <div class=" col-md-offset-1 col-md-6">
        <form>
            <select class="pull-right btn-lg">
                <option>Blog</option>
                <option>Shoe</option>
            </select><br><br><br>
            <textarea class="form-control" rows="7">
            </textarea><br>
            <input type="file" onchange="readURL(this)"><br>
            <input type="text" placeholder="Price">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="text" placeholder="Available"><br>
            <input type="button" class="btn btn-default btn-lg pull-right" value="Post"><br>
        </form>
    </div>
    <div class="col-md-5" style="margin-top: 60px;">

        <img id="blah" src="#" alt="your image"/>
    </div>

</div>
</div><br><br>
<div class="table-responsive">
    <table id='table_1' class='table table-striped table-bordered table-hover' cellspacing='0' width='100%'>
        <thead class='primary' >
        <tr>
            <th>id</th>
            <th>User</th>
            <th>Date Joined</th>
            <th>Status</th>
            <th>Email Address</th>
            <th>Order</th>
            <th style="display: <?php echo $display_cell; ?>"></th>
        </tr>
        </thead>
<tbody>
<td>1</td>
<td>Taofeeqah Balogun</td>
<td></td>
<td>member</td>
<td>taofeeqah.balogun@gmail.com</td>
<td></td>
<td></td>
</tbody>
       </table>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(200)
                    .height(250);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

</script>
<script src="css/bootstrap-3.3.5-dist/js/bootstrap.js"></script>
<script src="css/bootstrap-3.3.5-dist/js/jquery.js"></script>
<script src="js/jQuery.dataTables.js"></script>
</body>
</html>