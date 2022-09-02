<?php 
    function RedirectTo($path){
        header("location: ".$path);
    }

    function ShowMessage(){?>
    <div class="row">
        <?php if(isset($_SESSION["msg-err"])){ ?>
                <div class="py-2 mb-2 text-center text-white col-md-12 bg-danger" style="opacity: 0.5">
                    <?php 
                        echo $_SESSION["msg-err"];
                        unset($_SESSION["msg-err"]);
                    ?>
                </div>
        <?php }else if(isset($_SESSION["msg-success"])){ ?>
                <div class="py-2 mb-2 text-center text-white col-md-12 bg-success" style="opacity: 0.5">
                    <?php 
                        echo $_SESSION["msg-success"];
                        unset($_SESSION["msg-success"]);
                    ?>
                </div>
        <?php } ?>
    </div>
<?php } ?>

<?php 
//ref: https://www.php.net/manual/en/ref.datetime.php
function GetCurrentDateTime(){
    date_default_timezone_set("Asia/Dhaka");
    $CurrentTime = time();
    $DateTime = strftime("%d-%m-%Y %H:%M:%S"); //01-09-2022 13:13:06

    return $DateTime;
}
// echo GetCurrentDateTime();
?>