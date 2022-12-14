<?php
include"inc/header.php";
?>
<div class="row">

    <div class="col-lg-12" id="adminform">
        <section class="panel">
            <header class="panel-heading">
                اضافه کردن استان
            </header>
            <div class="panel-body">
                <div class="alert alert-danger" id="pru" style="display: none">
                    tamam fild ha por she
                </div>
                <div class="alert alert-success" id="prd" style="display: none">
                    ثبت با موفقیت انجام شد.
                </div>



                <div class="form-group">
                    <label for="exampleInputEmail1">نام استان</label>
                    <input type="text" class="form-control" id="provinceName" placeholder="نام استان">
                </div>
                <span class="btn btn-lg btn-login btn-block" onclick="submit()">ثبت</span>
            </div>
        </section>
    </div>

</div>
<!-- js placed at the end of the document so the pages load faster -->
<script src="js/jquery.js"></script>
<script src="js/jquery-1.8.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.scrollTo.min.js"></script>
<script src="js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="js/jquery.sparkline.js" type="text/javascript"></script>
<script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
<script src="js/owl.carousel.js" ></script>
<script src="js/jquery.customSelect.min.js" ></script>

<!--common script for all pages-->
<script src="js/common-scripts.js"></script>

<!--script for this page-->
<script src="js/sparkline-chart.js"></script>
<script src="js/easy-pie-chart.js"></script>
<script src="js/jquery.js"></script>

<script>
    function submit() {
        var provinceName = $("#provinceName").val();
        $.ajax({
            url:"request/addProvince.php",
            data:{
                provinceName:provinceName,
            },
            dataType:'json',
            type:'POST',
            success:function (data) {
                if (data["error"]){
                    $("#pru").show("fast").html(data['MSG']);


                }else  {
                    $("#prd").show("fast");
                }
            }
        });

    }
</script>
</body>
</html>
