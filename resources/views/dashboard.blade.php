<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="{{asset('asset/style.css')}}">
    <title>Table with Edit and Delete Buttons</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .edit-input {
            display: none;
        }

        .error-border {
            border: 2px solid red;
        }

        .error-prompt {
            color: red;
            font-size: 12px;
            display: none;
        }

        .alert-danger{
            color: red;
            margin-left: 30px;
        }

        .alert-success{
            color: green;
            margin-left: 30px;
        }
    </style>
        <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->

</head>
<body>
<section class="container">
    <div>
    <div class="log-out-button">
    <a class="log-out" href="/logout">Logout</a>
    </div>
    
    <form id="data-form" action="{{route('addproduct')}}" method="post">
        @csrf
                <div class="row">
                    <label for="name">Name</label>
                    <input type="text" id="name" placeholder="name" name="name">
                </div>

         @if (\Session::has('name'))
    <div class="alert alert-danger">
        <ul>
            <li>{!! \Session::get('name') !!}</li>
        </ul>
    </div>
@endif
                <div class="row">
                    <label for="desc">Description</label>
                    <input type="text" id="desc" placeholder="description" name="desc">
                </div>
                @if (\Session::has('description'))
    <div class="alert alert-danger">
        <ul>
            <li>{!! \Session::get('description') !!}</li>
        </ul>
    </div>
@endif
        
                <div class="row">
                    <label for="address">Address</label>
                    <input type="text" id="address" placeholder="address" name="address">
                </div>
                @if (\Session::has('address'))
    <div class="alert alert-danger">
        <ul>
            <li>{!! \Session::get('address') !!}</li>
        </ul>
    </div>
@endif
        
                <div class="row">
                    <label for="country">Country</label>
                   <select name="country" id="country" class="form-control">
                   <option value="" hidden>Select Country</option>
                    <option value="Ghana">Ghana</option>
                    <option value="USA">USA</option>
                    <option value="India">India</option>
                   </select>
                </div>
            </div>
            @if (\Session::has('country'))
    <div class="alert alert-danger">
        <ul>
            <li>{!! \Session::get('country') !!}</li>
        </ul>
    </div>
@endif
            <div class="state">
                <div class="two">
                    <label for="state">State</label>
                    <input type="text"  id="state" placeholder="State" name="state">
                </div>
                @if (\Session::has('state'))
    <div class="alert alert-danger">
        <ul>
            <li>{!! \Session::get('state') !!}</li>
        </ul>
    </div>
@endif
                <div class="two">
                    <label for="city">City</label>
                    <input type="text"  id="city" placeholder="City" name="city">
                </div>
            </div>
            @if (\Session::has('city'))
    <div class="alert alert-danger">
        <ul>
            <li>{!! \Session::get('city') !!}</li>
        </ul>
    </div>
@endif
            <input type="hidden" id="product-info" value="0" name="totalItems">
    
            <div class="row">
                <label for="name">Zip Code</label>
                <input type="text" id="zipcode" placeholder="postal code" name="zipcode">
            </div>
            @if (\Session::has('zipcode'))
    <div class="alert alert-danger">
        <ul>
            <li>{!! \Session::get('zipcode') !!}</li>
        </ul>
    </div>
@endif

    </div>
    @if (\Session::has('prodMsg'))
    <div class="alert alert-danger">
        <ul>
            <li>{!! \Session::get('prodMsg') !!}</li>
        </ul>
    </div>
@endif
    @if (\Session::has('message'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('message') !!}</li>
        </ul>
    </div>
@endif


    <div class="add-and-save">
        <div class="add-prod">
            <button onclick="addNewRow()">Add Product +</button>
        </div>
        <div class="save-changes">
            <button onclick="saveAllChanges()">Save Changes</button>
        </div>
    </div>
    <table id="data-table" class="table">
        <tr>
            <th>S. no</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Qt.</th>
            <th>Status</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Xyzproduct</td>
            <td>10</td>
            <td>01</td>
            <td>
                <button id="edit" onclick="editRow(this)">Edit</button>
                <button id="delete" onclick="deleteRow(this)">Delete</button>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>Xyzproduct</td>
            <td>10</td>
            <td>01</td>
            <td>
                <button id="edit"  onclick="editRow(this)">Edit</button>
                <button id="delete"  onclick="deleteRow(this)">Delete</button>
            </td>
        </tr>
        <!-- Add more rows here if needed -->


    </table>
    <div class="sub">
       <input type="hidden" id="data-json" name="data">
        <button type="submit" onclick="submitData()">Submit</button>
       </div>

    </form>

    <div class="error-prompt">Input box cannot be empty.</div>
    </section>
    <!-- Add the form and submit button -->
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    
    <script type="text/javascript">

        currentRowNumber = 3;

        function addNewRow() {
            event.preventDefault();
            var table = document.getElementById("data-table");
            var newRow = table.insertRow(table.rows.length);
            var columnsCount = 5;
        
            var numberCell = newRow.insertCell(0);
            numberCell.textContent = currentRowNumber;
            currentRowNumber++;

            for (var i = 1; i < columnsCount; i++) {
                var cell = newRow.insertCell(i);
                cell.innerHTML = "new";
            }

            var actionsCell = newRow.cells[columnsCount - 1];
            actionsCell.innerHTML = `
                <button id="edit" onclick="editRow(this)">Edit</button>
                <button id="delete" onclick="deleteRow(this)">Delete</button>
            `;
        }

        function editRow(button) {
            event.preventDefault();
            var row = button.parentNode.parentNode;
            var cells = row.querySelectorAll("td:not(:last-child)");

            for (var i = 1; i < cells.length; i++) {
                var cellText = cells[i].textContent;
                cells[i].innerHTML = `<input type="text" value="${cellText}">`;
            }
        }

        // function saveChanges(input) {
        //     var cell = input.parentNode;
        //     var editedValue = input.value;
        //     cell.textContent = editedValue;
        // }

        function deleteRow(button) {
            event.preventDefault();
            var row = button.parentNode.parentNode;
            var rowIndex = row.rowIndex;
            row.parentNode.removeChild(row);

            var rows = document.querySelectorAll('#data-table tbody tr');
            currentRowNumber = 1;
            for(var i = 1; i < rows.length; i++){
                rows[i].cells[0].textContent = currentRowNumber++;
            }
        }

        function saveAllChanges() {
            event.preventDefault();
            var inputs = document.querySelectorAll("td input");
            var errorPrompt = document.querySelector(".error-prompt");
            var hasEmptyInput = false;

            inputs.forEach(function (input) {
                var cell = input.parentNode;
                var editedValue = input.value.trim();

                if (editedValue === "") {
                    hasEmptyInput = true;
                    cell.classList.add("error-border");
                } else {
                    cell.classList.remove("error-border");
                    cell.textContent = editedValue;
                }
            });

            if (hasEmptyInput) {
                errorPrompt.style.display = "block";
            } else {
                errorPrompt.style.display = "none";
            }
        }

        function submitData() {
           
            var rows = document.querySelectorAll("#data-table tbody tr");
            var data = [];

            rows.forEach(function (row) {
                var cells = row.querySelectorAll("td:not(:last-child)");
                var rowData = [];
                cells.forEach(function (cell) {
                    rowData.push(cell.textContent.trim());
                });
                data.push(rowData);
            });

            var dataJsonInput = document.getElementById("data-json");
            dataJsonInput.value = JSON.stringify(data);
            console.log(data)

        //   var name  = document.getElementById("name").val;
        //   var desc  = document.getElementById("desc").val;
        //   var state  = document.getElementById("state").val;
        //   var address  = document.getElementById("address").val;
        //   var city  = document.getElementById("city").val;
        //   var zipcode  = document.getElementById("zipcode").val;
        //   var country  = document.getElementById("country").val;
        //   var userinfo = [];
        //   userinfo
        //     console.log(data)
        //                  $.ajax({
        //         type: "POST",
        //         url: "http://127.0.0.1:8000/save-product",
        //         data: data,
        //         success: function(){
        //              alert("Save Complete");
        //           }
                
        //         });

        }
    </script>
</body>
</html>
