<?php
include "../admin/class/dataBase.php";
$db = new dataBase();
if (isset($_POST['name']) &&
    !empty($_POST['name'])
) {
    $result = $db::RealString($_POST);
    $name = $result['name'];

    $select = $db::Query("SELECT productName,productId FROM product WHERE 
                (product.productName like '%$name%')");
    $fetch = mysqli_fetch_assoc($select);
    $proId = $fetch['productId'];


    $qu = $db::Query("SELECT subName,subId FROM subcategory  WHERE 
                                   (subcategory.subName like '%$name%')");

    if (mysqli_num_rows($select)==0 && mysqli_num_rows($qu)==0){
        $data = array("error" =>true,"MSG" => "چیزی یافت نشد");
        echo json_encode($data);
        return;
    }else{
        $productName = "";
        $subName = "";
        while ($row = mysqli_fetch_assoc($select)){
            $productName.='
<p id="hov" style=""><a class="nodectrion" href="Product.php?$proId='.$row["productId"].'">

<div style="float: right;
    width: 20px;
    margin-left: 10px;">
<svg version="1.1" id="Capa_1"  x="0px" y="0px"
	 viewBox="0 0 480.356 480.356" style="enable-background:new 0 0 480.356 480.356;" xml:space="preserve" height="20px" width="20px">
<g>
	<g>
		<path d="M469.725,418.417l-125.32-125.328c57.936-86.275,34.963-203.18-51.312-261.116S89.913-2.989,31.977,83.286
			s-34.963,203.18,51.312,261.116c63.446,42.605,146.358,42.605,209.804,0l125.32,125.328c14.169,14.169,37.143,14.169,51.312,0
			S483.895,432.587,469.725,418.417z M188.357,360.353c-94.949-0.106-171.894-77.051-172-172c0-94.993,77.007-172,172-172
			s172,77.007,172,172S283.35,360.353,188.357,360.353z M458.421,458.41c-3.805,3.808-8.969,5.946-14.352,5.944
			c-5.382,0.016-10.547-2.121-14.344-5.936L307.669,336.353l28.688-28.688l122.056,122.064
			C466.335,437.647,466.339,450.488,458.421,458.41z"/>
	</g>
</g>
<g>
	<g>
		<path d="M192.573,32.409l-0.424,16c41.401,1.072,80.192,20.463,105.896,52.936l12.528-9.952
			C281.926,55.215,238.705,33.61,192.573,32.409z"/>
	</g>
</g>
<g>
	<g>
		<path d="M322.245,108.233l-13.72,8.232c2.981,4.953,5.653,10.085,8,15.368l14.592-6.464
			C328.513,119.481,325.551,113.758,322.245,108.233z"/>
	</g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
</svg>

</div>
<span class="c-search__result-item c-search__result-icon c-search__result-icon--history">'.$row['productName'].'</span></a></p>
';


        }

        while ($row1 = mysqli_fetch_assoc($qu)){
            $subName.='
<p  id="hov" style=""><a class="nodectrion" href="search.php?subId='.$row1["subId"].'">
<div>
<svg version="1.1" id="Capa_1"  x="0px" y="0px"
	 viewBox="0 0 480.356 480.356" style="enable-background:new 0 0 480.356 480.356;" xml:space="preserve" height="20px" width="20px">
<g>
	<g>
		<path d="M469.725,418.417l-125.32-125.328c57.936-86.275,34.963-203.18-51.312-261.116S89.913-2.989,31.977,83.286
			s-34.963,203.18,51.312,261.116c63.446,42.605,146.358,42.605,209.804,0l125.32,125.328c14.169,14.169,37.143,14.169,51.312,0
			S483.895,432.587,469.725,418.417z M188.357,360.353c-94.949-0.106-171.894-77.051-172-172c0-94.993,77.007-172,172-172
			s172,77.007,172,172S283.35,360.353,188.357,360.353z M458.421,458.41c-3.805,3.808-8.969,5.946-14.352,5.944
			c-5.382,0.016-10.547-2.121-14.344-5.936L307.669,336.353l28.688-28.688l122.056,122.064
			C466.335,437.647,466.339,450.488,458.421,458.41z"/>
	</g>
</g>
<g>
	<g>
		<path d="M192.573,32.409l-0.424,16c41.401,1.072,80.192,20.463,105.896,52.936l12.528-9.952
			C281.926,55.215,238.705,33.61,192.573,32.409z"/>
	</g>
</g>
<g>
	<g>
		<path d="M322.245,108.233l-13.72,8.232c2.981,4.953,5.653,10.085,8,15.368l14.592-6.464
			C328.513,119.481,325.551,113.758,322.245,108.233z"/>
	</g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
</svg>

</div>
<span class="c-search__result-item c-search__result-icon c-search__result-icon--history">'.$row1['subName'].'</span></a></p>
';
        }
        $call=array("ok"=>true);
        $call["productName"]=$productName;
        $call["subName"]=$subName;
        echo json_encode($call);
        return;

    }
}