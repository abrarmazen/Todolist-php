<?php 
require_once 'inc/header.php';
require_once 'inc/connection.php';
//insert(validition) , update note, update status , delete
?>
<body>
    
    <div class="container my-3 ">    
        <div class="row d-flex justify-content-center">
               
                <div class="container mb-5 d-flex justify-content-center">
                    <div class="col-md-4">
                        <form action="handle/addToDo.php" method="post">
                        <textarea type="text" class="form-control" rows="3" name="title" id="" placeholder="enter your note here"></textarea>
                        <div class="text-center">
                            <button type="submit" name="submit" class="form-control text-white bg-info mt-3 " >Add To Do</button>
                        </div>
                        </form>
                    </div>
                </div>
               

        </div>
        <div class="row d-flex justify-content-between">   
            <!-- all -->
            <div class="col-md-3 "> 
                <h4 class="text-white">All Notes</h4>

                
                
                            <?php
                         $stm =  $conn->query("select * from `to-do-list` where `status` = 'all'");
                         if($stm->rowCount()>0):
                             $allnotes= $stm->fetchAll();
                             foreach($allnotes as $all):?>
                              <div class="alert alert-info p-2">
                                <h4 ><?php echo $all['title']?></h4>
                                <h5><?php echo $all['ctreated-at']?></h5>
                                <div class="d-flex justify-content-between mt-3">
                                    <a href="edit.php?id=<?php echo $all['id']?>"class="btn btn-info p-1 text-white" >edit</a>
                                   
                                    <a href="handle/goto.php?name=doing&id=<?php echo $all['id']?>"class="btn btn-info p-1 text-white" >doing</a>
                                </div>
                            
                        </div>
                            

                             <?php endforeach?>
                             <?php

                             else:?>
                        
                        <div class="item">
                                <div class="alert-info text-center ">
                                 empty to do
                                </div>
                            </div>

                      <?php endif;
                            
                            ?>
                             <div class="m-2  py-3">
                    <div class="show-to-do">

                    
                       
                    </div>
                </div>

            </div>

            <!-- doing -->
            <div class="col-md-3 ">
            
                <h4 class="text-white">Doing</h4>

                
                <div class="m-2 py-3">
                    <div class="show-to-do">
                        <?php
                        $stm = $conn->query("select * from `to-do-list` where `status` = 'doing'");
                        if($stm->rowCount()>0):
                            $alldoing = $stm->fetchAll();
                            foreach($alldoing as $doing):?>
                             <div class="alert alert-success p-2">
                                <h4 ><?php echo $doing['title']?></h4>
                                <h5><?php echo $doing['ctreated-at']?></h5>
                                <div class="d-flex justify-content-between mt-3">
                                    <a></a>
                                    <a href="handle/goto.php?name=doin&id=<?php echo $doing['id']?>"class="btn btn-success p-1 text-white" >Done</a>
                                </div>
                            
                        </div>
                           <?php endforeach;
                        else:?>
                          <div class="item">
                                <div class="alert-success text-center ">
                                 empty to do
                                </div>
                            </div>
                     <?php   endif;
                        ?>                       
                    </div>
                </div>
            
            </div>
           
            <!-- done -->
            <div class="col-md-3">
                <h4 class="text-white">Done</h4>

                <div class="m-2 py-3">
                    <div class="show-to-do">
                  
                            <?php
                        $stm = $conn->query("select * from `to-do-list` where `status` = 'doin'");
                        if($stm->rowCount()>0):
                            $alldoin = $stm->fetchAll();
                            foreach($alldoin as $doin):?>
                    
                        <div class="alert alert-warning p-2">
                                <a href="handle/delete.php?id=<?php echo $doin['id']?>" onclick="confirm('are your sure')"  class="remove-to-do text-dark d-flex justify-content-end " ><i class="fa fa-close" style="font-size:16px;"></i></a>                                                                
                                <h4 ><?php echo $doin['title']?></h4>
                               <h5><?php echo $doing['ctreated-at']?></h5>
                               
                            
                        </div>
                        <?php endforeach;
                        else:?>

                            <div class="item">
                                <div class="alert-warning text-center ">
                                 empty to do
                                </div>
                            </div>
                            <?php   endif;
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>