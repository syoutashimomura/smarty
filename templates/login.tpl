<h2>ログイン</h2>
<div class="kanri">

    {if $errors}
    <div id="error"><p>ユーザー名またはパスワードが正しくありません！</p></div>
    {/if}

    <form action="msg2.php" method="post">
    <div class="kanri">
        <p>
            ユーザー名：
            <input type="text" name = "user">
        </p>
    </div>

    <div class="kanri">
        <p>
            パスワ－ド：
            <input type="password" name = "ps">
        </p>
    </div>

    <div class="kanri">
        <p>
            <input type="submit" value = "ログイン">
        </p>
    </div>
  </form>
</div>
