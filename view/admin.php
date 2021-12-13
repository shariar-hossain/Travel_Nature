<?php  
session_start();
include "../control/db_conn.php";
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $sql="UPDATE `booking` SET `status`='{$_POST['status']}' WHERE id={$_POST['bookingId']}";
        $conn->query($sql);
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
       <!-- ---------------------- link boostrap ------------------------------ -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>Admin control</title>
    <style>
      *{
        color: white;
      }
      body{
        background-color: rgb(41, 39, 39);
        
      }
      a{
          text-decoration: none;
          background: #555;
          padding: 10px 15px;
          color: #fff;
          border-radius: 5px;
          
          border: none;

      }
      a:hover{
        background: white;
        color: black;
        box-shadow: 0 0 10px white;
      }
    </style>
</head>
<body>
    <nav class="d-flex align-items-center justify-content-around">
        <div></div>
        <h1 class="">Hello Admin</h1>
        <a href="../control/logout.php">Logout</a>
    </nav>
   
    <section class="container py-4 table-responsive">
        
      
        <table class="table table-striped text-center" id="myTable">
        <thead class="table-dark">
            <tr>
                <th scope="col">Booking Id</th>
                <th scope="col">User Id</th>
                <th scope="col">Booking Date</th>
                <th scope="col">Location</th>
                <th scope="col">Schedule</th>
                <th scope="col">Status</th>
                <th scope="col"> </th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i=0;
                
                $sql = "Select 	id , user_id, dateTime, package, schedule, status from booking ORDER BY schedule";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0){
                    while($row = $result->fetch_assoc()){
                        echo "<tr id='{$i}'> <td class='row-data'> {$row["id"]} </td> <td class='row-data'> {$row["user_id"]} </td> <td> {$row["dateTime"]} </td> <td class='row-data'> {$row["package"]} </td> <td> {$row["schedule"]}   </td><td> {$row["status"]}   </td> <td><button type='button' class='btn btn-warning rounded-1 cancel-btn' data-bs-toggle='modal' data-bs-target='#exampleModal' onclick='updateStatus()' ><i class='far fa-times-circle me-1'></i>change</button>  </td> </tr>";
                    $i++;
                    }
                }
            
            ?>
        </tbody>
        </table>
      
    </section>
    <form action="" method="POST">
    <div class="modal fade text-secondary" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">Change status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="model-body container mb-3">
                  <label for="disabledTextInput" class="form-label" style="color:black">Booking Id</label>
                  <input type="text" name="bookingId"  readonly="readonly" id="bookingId" class="form-control" value="1">
                  <div class="form-check mt-3">

                        <input class="form-check-input" type="radio" value="Confirm" name="status" id="status1" checked>
                        <label class="form-check-label" for="status1" style="color: white; background-color:green; border-radius:10px; padding:0 5px">
                        Confirm
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" value="Cancel" name="status" id="status2">
                        <label class="form-check-label" for="status2" style="color: white; background-color:red; border-radius:10px; padding:0 5px">
                        Cancel
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" value="Done" name="status" id="status2">
                        <label class="form-check-label" for="status2" style="color: white; background-color:blue; border-radius:10px; padding:0 5px">
                         Done
                        </label>
                </div>
              </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger text-light me-3" data-bs-dismiss="modal"><i class="far fa-times-circle me-1"></i>Close</button>
                    <button type="submit" class="btn btn-success text-light"><i class="far fa-check-circle me-1"></i>Confirm</button>
                  </div>
              </div>
          </div>
    </div>
    </form>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<script>
    function updateStatus(){
  var rowId =event.target.parentNode.parentNode.id;

  var data = document.getElementById(rowId).querySelectorAll(".row-data"); 

   var id = data[0].innerHTML;
   document.getElementById("bookingId").value = id;

}

</script>

</body>
</html>