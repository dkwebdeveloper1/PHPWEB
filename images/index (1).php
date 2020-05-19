<?php
include("header.php");
//$fetchProducList=FetchProducList("productList","porderby");
//$serviceType=$fetchProducList[0]['serviceType'];
$serviceMaster=FetchProducList("serviceMaster","1");

//print_r($serviceMaster);
$fetchProducList=FetchProducDetails($serviceMaster[0]['Id'],$oid="");
$FetchMarketingDetails=FetchMarketingDetails();
//print_r($fetchProducList);
$serviceType=$fetchProducList[0]['serviceCompany'];

?>
<style>
    a:link {
  text-decoration: none;
}

a:visited {
  text-decoration: none;
}

a:hover {
  text-decoration: underline;
}

a:active {
  text-decoration: underline;
}
</style>
				<header>
					<h2>Welcome to MFB</h2>
				</header>
				<header>
					<h3>Indian Spices are famous for it's quality, scents. In every home & in every province across the country, different spices and blends are used to create different and distinctive tastes in dishes. Several decades ago, housewives used to grind their spices manually at home and make their own blends for use in their cooking. To make this process easier for the housewife, ’Magadha Food & Beverages’ (MFB) visualised the concept of ready-to-use ground spices. All automated machines are meet the fast growing demand for MFB Spices.These machines having a capacity of producing 10 tones of spices in powders packed in beautiful consumer pack of different sizes in a day.Thare are 100 Stockists and huge number of retails wholesellers gradually imroving MFB brand to reach over world.</h3>
				</header>
				<div class="row" style="text-align:center; border:0px solid red; margin-left:0px;">
				    
				    <div style="text-align:left; border:2px solid #EEEEEE; width:18%; float:left; border-top-left-radius: 5px;border-top-right-radius: 5px;
    border-bottom-right-radius: 5px;border-bottom-left-radius: 5px; 
    background-color: #ffffff; padding:0px;">
                   <?php
                     
                    print "<table style='border: 0px solid black; margin:0px; text-align:center;' align='right'>\n";
                        print "<tr>\n";
                        
                            print "<td style='text-align:left; font-size:18px; font-family:verdana; font-weight:bold;padding-left:5px;'>" . " Food & Beverages Products" . "</td>\n";
                        
                        print "</tr>\n";
                        print "<tr>\n";
                        
                            print "<td style='text-align:left; font-size:18px; font-family:verdana; font-weight:bold;'>" . " <hr>" . "</td>\n";
                        
                        print "</tr>\n";
                        
                            foreach($FetchMarketingDetails as $pList)
                                { 
                        print "<tr>\n";
                        
                            print "<td style='text-align:left; text-decoration: none; padding-left:5px;'>" . "<a href='{$pList['indiamart']}' style='text-decoration: none;  color:#000000; font-size:12px;' target='_blank'>{$pList['ptitle']}</a>" . "</td>\n";
                        
                        print "</tr>\n";
                                }
                    print "</table>\n"; 
                    
                        
                ?>
                     </div>
                     <div style="text-align:left; border:2px solid #EEEEEE; width:80%; height:auto; float:right;border-top-left-radius: 5px;border-top-right-radius: 5px;
    border-bottom-right-radius: 5px;border-bottom-left-radius: 5px;
    background-color: #FEFEFE;padding: 15px 15px 15px 0px;">
				
				<?php
				
	                $i=0;
                    $path="images/";
                    $barcodepath="barcode/";
	
	                   
                    
                    foreach($fetchProducList as $pList)
                        {  
                        
                        
                        $imageLogo=$path.$pList['clogo'];
                        $barcode=$barcodepath.$pList['barcode'];
                                
                                
                        $values = range(1, $fetchProducList);
                        $rows = array_chunk($values, 3);
                    
                    print "<table style='border: 0px solid black; margin:5px; text-align:center;' align='right'>\n";
                    foreach ($rows as $row) {
                        print "<tr>\n";
                        foreach ($row as $value) {
                            print "<td>" . "<a href='productdetails.php?oid={$pList['Id']}&prodNum={$pList['pcode']}'><img src='{$imageLogo}' width='210px' height='250px'/></a>
                            <p><span style='color:#D43430; font-weight:bold; font-size:18px;'>{$pList['ptitle']}</span>
                    		<br>
                    		<span style='color:green;'>Product Number : {$pList['pcode']}</span>
                    		
                    		</p>
                            " . "</td>\n";
                        }
                        print "</tr>\n";
                    }
                    print "</table>\n"; 
                    
                        //if($i%3==1) {
                		//echo "<div class='3u'><section>"; 
                                                   		    
            		     //}
                            
                            //if($pList['serviceType'] =='1')
                            //{
                                
                     //echo "<div style='margin-top:10px; margin-bottom:10px;'>
//<a href='productdetails.php?oid={$pList['Id']}&prodNum={$pList['pcode']}'><img src='{$imageLogo}' width='290px' height='300px'/></a>
                    		//<p><span style='color:#D43430; font-weight:bold; font-size:18px;'>{$pList['ptitle']}</span>
                    	//	<br>
                    	//	<span style='color:green;'>Product Number : {$pList['pcode']}</span>
                    	//	</p>
                     	//	<!--<a href='#' class='button'>Read More</a>-->
                     	//	</div>";
                     //if($i%5==0)
                         				
                         //if($i%3==1) {
                             
		  //echo '<section></div>';
		  
		 //}  
		 // $i++;
		  //echo "&nbsp";
                           //}
                     }
                    //echo "</div>";
                ?>
				
				
				
				
				
					
				</div>
			</div>
		</div>
	<!-- Main -->

	<?php
    include("footer.php");
    ?>

	</body>
</html>