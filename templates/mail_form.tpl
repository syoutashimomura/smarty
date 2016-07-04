<!DOCTYPE html>
{config_load file = 'title.conf'}
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>{#title#}</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" media = "screen">
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top">
    <div class="navbar-header">
        <button class="navbar-toggle" data-toggle="collapse" data-target=".target">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="home.php">HOME</a>
    </div>

    <div class="collapse navbar-collapse target">
        <ul class="nav navbar-nav">
            <li class=""><a href="index.php">問い合わせ</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="mgs.php">管理画面</a></li>
        </ul>
    </div>
</nav>

    <div class="container" style="padding:60px 0">


    {include file = $content_tpl params = $params}
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="JS/bootstrap.min.js"></script>
    <script src="JS/login.js"></script>
    <script>
    $(function(){
        $("[data-toggle=tooltip]").tooltip({
            placement: "bottom"
        });

        $("[data-toggle=popover]").popover({
            placement: "bottom"
        });
    });
</script>

</body>
</html>
