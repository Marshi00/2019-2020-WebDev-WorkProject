<?php
include "loginCheckAdmin.php";
$userId = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>اطلاعات جشواره</title>
    <link rel="stylesheet" href="Css/kala.css">
    <link rel="stylesheet" href="dist/css/CSSfnts.css">
    <link rel="stylesheet" href="dist/css/newcss.css">

    <?php
    include "link.php"
    ?>

</head>

<body class="hold-transition sidebar-mini bsk">

<?php
include "nav.php";
?>
<div class="content-wrapper">
    <div class="col-12">
        <button type="button" class="btn btn-primary col-12 btnl48"><h3>اطلاعات مورد تایید می باشد ؟</h3></button>
    </div>

    <div class="col-12" align="center">
        <div class="col-lg-8 div01">
            <?php
            $select=$A->Query("SELECT * FROM events WHERE ID='$userId'");
            $select2=$A->FetchAssoc($select);?>
            <input type="text"  value="<?php echo $select2['StartDate']?>" disabled name="lastname" >

            <input type="text"  value="<?php echo $select2['ExpireDate']?>" disabled name="lastname" >

            <input type="text"  value="<?php echo $select2['Multiplier']?>" disabled name="lastname" >
            <input type="text"  value="<?php echo $select2['EventName']?>" disabled name="lastname" >


            <br>

            <input id="AAA" type="submit" class="btn-primary" onclick="sendParams()" value="ثبت">
            <div class="col-12">
                <div class="col-6 alert warning" id="Wrong" align="center">
                    سلام
                </div>
                <div class="col-6 alert success" id="Success" align="center">
                    سلام
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // trigger
    var input11 = document.getElementById("A4");
    input11.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            document.getElementById("AAA").click();
        }
    });
</script>
<script>
    function sendParams() {
        var ID;
        ID = <?php echo $userId?> ;
            $.ajax({
                url: "Start.php",
                data: {
                    ID: ID,
                },
                dataType: "json",
                type: "POST",
                success: function (jsonData) {
                    if (jsonData['error']) {
                        document.getElementById('Success').style.visibility = 'hidden';
                        document.getElementById('Wrong').style.display = 'block';
                        document.getElementById('Wrong').innerText = jsonData['MSG'];
                        $( "div.warning" ).delay( 1900 ).fadeOut( 400 );
                    } else {
                        document.getElementById('Success').style.visibility = 'visible';
                        document.getElementById('Success').innerText = jsonData['MSG'];
                        $( "div.success" ).delay( 1900 ).fadeOut( 400 );
                    }

                }
            });
    }
</script>
</body>

</html>