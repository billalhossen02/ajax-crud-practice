<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Ajax Crud</title>
</head>
<body>
    
            <marquee behavior="" direction="">**********************************************************EID MUBARAK****************************************************</marquee>
            <div class="row mt-lg-5">
            <div class="col-sm-8">
               <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            </tr> --}}
                        </tbody>
                        </table>
            </div>
            <div class="col-sm-4">

                <div class="card">

                    <div class="card-header">
                        <span id="addP">Add Product</span>
                        <span id="updateP">Update Product</span>
                    </div>

                    <div class="card-body">
                        <form id="form">
                            @csrf

                                <div class="form-group">
                                <input type="text" id="name" class="form-control" placeholder="name">
                                </div>
                                <div class="form-group">
                                <input type="text" id="description" class="form-control" placeholder="Description">
                                </div>
                                 <div class="form-group">
                                <input type="number" id="price" class="form-control" placeholder="Price">
                                </div>
                                
                                <input type="hidden" id="id">
                                <button id="addB" type="submit" onclick="addData()" class="btn btn-sm btn-primary">Add</button>
                                <button id="updateB" type="submit" onclick="updateData()" class="btn btn-sm btn-primary">Update</button>
                       
                        </form>
                    </div>

                </div>
               
            </div>
            </div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript"src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>


<script>
                $("#addP").show();
                $("#updateP").hide();
                $("#addB").show();
                $("#updateB").hide();

                function allData(){
                 
                $.ajax({
                    type: "GET",
                    dataType : "json",
                    url: "data/all",
                    success: function(response){
                        var data = ""
                        $.each(response, function(key, value){
                            data = data + "<tr>"

                            data = data + "<td>" + value.name + "</td>"
                            data = data + "<td>" + value.description + "</td>"
                            data = data + "<td>" + value.Price + "</td>"
                            data = data + "<td>"

                                data = data + "<button class='btn btn-sm btn-success mr-2' onclick='editData("+value.id+")'>Edit</button>" 
                                data = data + "<button class='btn btn-sm btn-danger'onclick='deleteData("+value.id+")'>Delete</button>"

                            data = data + "</td>"


                            data = data + "</tr>"

                            console.log(value)

                        });

                        $('tbody').html(data);
                    }

                });
            }

            allData();

            function addData(){
               var name =  $("#name").val();
               var description = $("#description").val();
               var price = $("#price").val();

                $.ajax({

                    type : "POST",
                    url : "add/product",
                    data :  {
                                name:name,
                                description:description,
                                price:price,
                                "_token" : "{{csrf_token()}}"

                            },
                    sucess:function(data){
                         allData();
                        console.log("Success");
                        
                    },
    
                });

            }

             
            
            function editData(id){
            
                $.ajax({
                    type: "GET",
                    url : "edit/data/"+id,
                    success:function(data){
                        $("#addP").hide();
                        $("#updateP").show();
                        $("#addB").hide();
                        $("#updateB").show();

                        $("#id").val(data.id);
                        $("#name").val(data.name);
                        $("#description").val(data.description);
                        $("#price").val(data.Price);
                    }
                })
            }


            function updateData(){
               var id = $("#id").val();
               var name =  $("#name").val();
               var description = $("#description").val();
               var price = $("#price").val();

                $.ajax({

                    type : "POST",
                    url : "update/data/"+id,
                    data :  {
                                name:name,
                                description:description,
                                price:price,
                                "_token" : "{{csrf_token()}}"

                            },
                    sucess:function(data){
                         
                        console.log("Success");
                        
                    },
    
                });

                console.log(id)
            }


            function deleteData(id){
                $.ajax({
                    url : "delete/data/"+id,
                    type : "GET",
                    success:function(data){
                        allData();
                        console.log("Success");
                    }

                })
            }
            

</script>



</body>
</html>