<?php

session_start();
if(!isset($_SESSION['userdata'])){
    header("location:online.html");
}
$userdata = $_SESSION['userdata'];
$groupsdata = $_SESSION['groupsdata'];
if($_SESSION['userdata']['status']==0){
    $status = '<b style="color:red">Not Voted</b>';
}
else{
    $status = '<b style="color:green">Voted</b>';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="online.css">
    <title>Online Voting Syste - Dashboard</title>
</head>
<body>
    <style>
#backbtn{
    float:left;
    padding: 5px;
    border-radius: 5px;
    background-color:#3498db;
    color: white;
    font-size: 15px;
    margin:20px;

    

}

#logoutbtn{
    float:right;
    padding: 5px;
    border-radius: 5px;
    background-color:#3498db;
    color: white;
    font-size: 15px;
    margin:20px


}

#profile{
    float:left;
    text-align:left;
    background-color: #fff;
    width: 35%;
    padding: 30px
    

}


#Group{
    width:55%;
    float:right;
    text-align:left;
    padding: 29px;
    background-color: #fff;
    
}

#votebtn{
    padding: 5px;
    border-radius: 5px;
    background-color:#3498db;
    color: white;
    font-size: 15px;
}
#pad{
    padding: 10px;
}

#voted{
    padding: 5px;
    border-radius: 5px;
    background-color:green;
    color: white;
    font-size: 15px;

}
    </style>


    <div id="mainfun">
      <div id="header">
       <a href="online.html"> <button id="backbtn">Back</button></a>
        <a href="logout.php"><button id="logoutbtn">Logout</button></a>
        <h1>Online Voting System</h1>
      </div>

       <hr>
       <div id="pad">
       <div id="profile">
          <center> <img src="uploads/<?php echo $userdata['photo']?>" height="100" width="100"><br><br><br></center>
           <b>Name:   </b> <?php echo $userdata['name']?><br><br>  
           <b>Mobile: </b><?php echo $userdata['mobile']?><br><br>
           <b>Address: </b><?php echo $userdata['address']?><br><br>
           <b>Status: </b><?php echo $status?><br><br>
           

        </div>
        <div id="Group">
            <?php
            if($_SESSION['groupsdata']){
                for($i=0; $i<count($groupsdata); $i++){
                    ?>
                    <div>
                        <img style="float:right" src="uploads/<?php echo $groupsdata[$i]['photo']?>" height="100" width="100">
                        <b>Group Name : </b> <?php echo $groupsdata[$i]['name']?><br><br>
                        <b>Vote : </b><?php echo $groupsdata[$i]['votes']?><br><br>
                        <form action="vote.php" method= "POST">
                            <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes']?>">
                            <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id']?>">
                            <?php
                              if($_SESSION['userdata']['status']==0){
                                  ?>
                                  <input type="submit" name="votebtn" value="vote" id= "votebtn">

                                  <?php
                              }
                              else{
                                  ?>
                              <button disabled type="button" name="votebtn" value="vote" id= "voted">Voted</button>
                            <?php  
                            }

                            ?>
                            
                        </form>
                    </div>
                    <hr>
                    <?php
                }

            }
            else{

            }
            
            ?>

        </div>
        </div>
    </div>
    
</body>
</html>