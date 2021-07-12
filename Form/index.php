<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <form method="POST">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" id="addName" name="name" class="form-control" placeholder="Enter Your Name">
                        <input type="hidden" id="updateId">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="age">Address:</label>
                        <input type="text" id="addAddress" name="address" class="form-control" placeholder="Enter Your Address">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="contact">Contact Number:</label>
                        <input type="number" id="addContact" name="contact" class="form-control" placeholder="Enter Your Contact Number">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="age">Age: </label>
                        <input type="number" id="addAge" name="age" class="form-control" placeholder="Enter Your Age">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <button class="btn btn-primary" id="submitButton" onclick="addUser()" >Submit</button>
                    <button class="btn btn-primary" id="updateButton" style="display: none;" onclick="addUser()">Update</button>
                </div>
            </div>
        </div>
    </form>

    <table class="table table-striped">
        <thead>
            <th scope="row">#</th>
            <th scope="row">Name
            <input type="text" class="form-control" id="name" onkeyup = 'onLoad()'>
            </th>
            <th scope="row">Address
            <input type="text" class="form-control" id="address" onkeyup = 'onLoad()'>
            </th>
            <th scope="row">Contact Number
            <input type="text" class="form-control" id="contact" onkeyup = 'onLoad()'>
            </th>
            <th scope="row">Age
            <input type="text" class="form-control" id="age" onkeyup = 'onLoad()'>
            </th>
            <th scope="row">Edit
            <input type="text" class="form-control" disabled>
            </th>
        </thead>
        <tbody id="dataContainer">

        </tbody>
    </table>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    <script>
        onLoad();

        function addUser(){
            var name = $("#addName").val();
            var address = $("#addAddress").val();
            var contact = $("#addContact").val();
            var age = $("#addAge").val();
            var id = $("#updateId").val();
            var datastream = "name="+name+"&address="+address+"&contact="+contact+"&age="+age+"&id="+id;
            $.ajax({
                type:"POST",
                url:"add_user.php",
                data: datastream,
                cache:false,
                success: function(){
                    alert("User Added/Updated");
                    onLoad();
                    
                }
            });
        }

        function onLoad(){
            $("#submitButton").show();
            $("#updateButton").hide();
            var name = $("#name").val();
            var address = $("#address").val();
            var contact = $("#contact").val();
            var age = $("#age").val();

            var datastream = "name="+name+"&address="+address+"&contact="+contact+"&age="+age;
            $.ajax({
                type:"POST",
                url:"display.php",
                data: datastream,
                cache:false,
                success: function(data){
                    $("#dataContainer").html(data);
                }
            });
        }

        function deleteUser(id){
            var datastream = "id="+id;
            $.ajax({
                type: "POST",
                url: "delete_user.php",
                cache:false,
                data: datastream,
                success: function(){
                    alert("User Deleted");
                    onLoad();
                }
            });
        }

        function getData(id){
            $("#submitButton").hide();
            $("#updateButton").show();
            var datastream = "id="+id;
            $.ajax({
                type: "POST",
                data: datastream,
                url: "get_data.php",
                cache: false,
                success: function(data){
                    var result = eval('(' + data + ')');
                    document.getElementById('addName').value = result.name;
                    document.getElementById('addAddress').value = result.address;
                    document.getElementById('addContact').value = result.contact;
                    document.getElementById('addAge').value = result.age;
                    document.getElementById('updateId').value = result.id;
                    
                }
            });
        }

    </script>
</body>

</html>