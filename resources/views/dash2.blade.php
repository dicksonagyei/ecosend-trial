<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('asset/style.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->

</head>
<body>
<section class="screen">
    <div class="main-container">
        <form class="container" action="{{route('addproduct')}}" method="post">
            @csrf
            <div class="col">
                <div class="row">
                    <label for="name">Name</label>
                    <input type="text" id="name" placeholder="name" name="name">
                </div>
        
                <div class="row">
                    <label for="desc">Description</label>
                    <input type="text" id="desc" placeholder="description" name="desc">
                </div>
        
                <div class="row">
                    <label for="address">Address</label>
                    <input type="text" id="address" placeholder="address" name="address">
                </div>
        
                <div class="row">
                    <label for="country">Country</label>
                   <select name="country" id="" class="form-control">
                   <option value="" hidden>Select Country</option>
                    <option value="Ghana">Ghana</option>
                    <option value="USA">USA</option>
                    <option value="India">India</option>
                   </select>
                </div>
            </div>
    
            <div class="state">
                <div class="two">
                    <label for="state">State</label>
                    <input type="text"  id="state" placeholder="--Select--" name="state">
                </div>
    
                <div class="two">
                    <label for="city">City</label>
                    <input type="text"  id="city" placeholder="--Select--" name="city">
                </div>
            </div>

            <input type="hidden" id="product-info" value="0" name="totalItems">
    
            <div class="row">
                <label for="name">Zip Code</label>
                <input type="text" id="name" placeholder="postal code" name="zipcode">
            </div>
            
            <div class="btn">
                <button onclick="addProduct()" class="btn-product">
                    <span>Add Product +</span>
                </button>
            </div>
            <!-- <div class="btn">
                <button onclick="deleteProduct('row-4')" class="btn-product">
                    <span>Delete+</span>
                </button>
            </div> -->

    <!--  -->
            <table class="checklist" id="tabl">
                <tr>
                    <th>S.no</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Qt</th>
                    <th>Status</th>
                </tr>
    
                <tr>
                    <td>01</td>
                    <td>Xyzproduct</td>
                    <td>10</td>
                    <td>01</td>
                    <td>
                        <div class="save">
                            <button class="btn-save">
                                <span>Save</span>
                            </button>
                        </div>
                    </td>
                </tr>
    
               
            </table>
        <!--  -->
        @if (\Session::has('message'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('message') !!}</li>
        </ul>
    </div>
@endif
            <div class="sub">
                <button class="btn-sub" type="submit">
                    <span>Submit</span>
                </button>
            </div>
        </form>
    </div>


<!-- ------------------------------------------------------------ -->
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#staticBackdrop1">
    Launch modal login form
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog d-flex justify-content-center">
        <div class="modal-content w-75">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Sign in</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form>
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" id="email1" class="form-control" />
                        <label class="form-label" for="email1">Email address</label>
                    </div>

                    <!-- password input -->
                    <div class="form-outline mb-4">
                        <input type="password" id="password1" class="form-control" />
                        <label class="form-label" for="password1">Password</label>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>
</section>
<!-- Modal -->
<!-- ------------------------------------------------------------ -->

<!-- <script src="script.js"></script> -->
<script>
    var number = 1;
    var tabl = $("#tabl");

    function deleteProduct(idstring){
        event.preventDefault();
        $('#'+idstring).remove();
    }

    function addProduct(){
        event.preventDefault();
        number++;
        tabl.append('<tr id="row-'+number+'"><td>0'+number+'</td><td>Xyzproduct</td><td>10</td><td>01</td><td><button id="edit-'+number+'" class="btn-edit"><span>Edit</span></button><button onclick="deleteProduct(row-'+number+')" id="delete-'+number+'" class="btn-delete"><span>Delete</span></button></td></tr>');
        
        //$('#product-info').val(number);
        //$('#product-info').val("GeeksForGeeks");
        // var vvv = $("#product-info").val;
        //console.log(vvv);
        document.getElementById('product-info').value = number;
        console.log(number);
        console.log(document.getElementById('product-info').value);
    }

</script>

</body>
</html>