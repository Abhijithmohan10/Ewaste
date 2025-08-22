<?php

$newtable="select * from selling_request r inner join customers c inner join schedule_employee e inner join employee y on r.comp_email=c.email where r.req_status='collected' and e.req_id=r.request_id and e.sch_status='completed' and e.emp_id=y.emp_id";
$newresult=$obj->GetTable($newtable);
//var_dump($newresult);
if($newresult!=NULL)
{

?>    
               <h3 class="w3_inner_tittle two"> Collected E-Waste Details</h3>   
            <div class="agile-tables">
                    
                      <table class="table table-bordered table-responsive">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Company Name</th>
                  <th>Requested Date</th>                  
                  <th>Total Amount</th>
                  <th>Collected By</th>
                          <th>Collected Date</th>

                  <th>Item Details</th>
                      
                </tr>
              </thead>
              <tbody>
<?php
$i=0;
foreach($newresult as $row)
{
  //price
  $i++;
  ?>              <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $row['company_name']?> (<?php echo $row['location']?>)</td>
                  <td><?php echo date('d-m-Y',strtotime($row["req_date"])); ?></td>                 
                  <td><?php
                     $itemdata="select * from request_items where req_id=".$row['request_id'];
                     $unt=$obj->GetTable($itemdata);
                     //var_dump($unt);
                     $amt=0;
                     foreach ($unt as $k) 
                     {
                       $amt=$amt+$k['amount'];
                     }
                     echo $amt; 
                     ?>
                  </td>
                  <td><?php echo "Field Officer: ".$row['emp_name']?><br><?php echo "Email: ".$row['email']."<br>Contact No: ".$row['phone']; ?></td>

                   <td><?php echo date('d-m-Y',strtotime($row["collected_date"])); ?></td> 
                   
                  <td><a href="viewitems.php?req_id=<?php echo $row['request_id']; ?>&type=collected">View Item Details</a></td>
          
                  
                  
                </tr>
    <?php } ?>
                
                
                
              </tbody>
            </table> 
                </div>  
                 <?php }
                 else
                          {
                   ?>
             <h3 class="w3_inner_tittle two"> No Details Found</h3>   
             <?php
                  } ?>