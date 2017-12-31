<html>
<head>
<title>Message From Provider</title>
<link rel="stylesheet" href="{{URL::asset('public/css/font.css')}}">
<style>
    .MessageBorder
    {
        padding: 60px 80px 5px 80px;
        background: #F0F0F0;
    }
    .MessageFooter
    {
        background-color: #37a000;
        padding-top: 5px;
        padding-bottom: 5px;
    }
    .MessageContent
    {
        background: white;
    }
    .FontSize
    {
        font-size: 16px;
    }
</style>
</head>
<body>
<div  class="MessageBorder">
    <table>
        <table class="MessageContent">
            <tbody>
                <tr>
                    <td>
                        <center>
                            <table>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div>
                                                <?php echo $header; ?>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </center>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table>
                            <tbody>
                                <tr>
                                    <td>
                                        <div>
                                            <?php
                                                $name=ucfirst($freelancer);
                                                $m = str_replace("{site_name}","RBS",$title);
                                                $n=str_replace("{user_name}",$name,$m);
                                            ?>
                                            <p>
                                                <?php echo " ". str_replace("{message_content}",$msg,$n); ?>
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <center>
                            <table class="MessageFooter">
                                <tbody>
                                    <tr>
                                        <td>
                                            <div>

                                                <?php 
                                                    $facebook = str_replace("{facebook}","<a href='https://www.facebook.com/'><img src='http://demo.cogzidel.com/upc/public/images/FacebookIcon1.png' height='35px'></a>",$footer);
                                                    echo $twitter = str_replace("{twitter}","<a href='https://twitter.com/login'><img src='http://demo.cogzidel.com/upc/public/images/TwitterIcon1.png' height='35px'></a>",$facebook);
                                                ?>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </center>
                    </td>
                </tr>
            </tbody>
        </table>
        <center>
            <table>
                <tbody>
                    <tr>
                        <td class="FontSize">
                            © RBS - All rights reserved    
                        </td>
                    </tr>
                    <tr>
                        <td class="FontSize">
                            <a style="color:#3b5998;text-decoration:none" href="http://demo.cogzidel.com/upc/" target="_blank" data-saferedirecturl="">http://demo.cogzidel.com/upc/</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </center>
    </table>
</div>
</body>
</html>