<p id="log">ログイン！</p>
<p id="kanri">{$user}さんの管理画面</p>


<table  id="todos" class="table table-striped table-bordered table-hover table-condensed">
    <thead>
        <tr>
            <th>id</th><th>氏名</th><th>氏名（カナ）</th><th>性別</th><th>住所</th>
            <th>アドレス</th><th>電話番号</th><th>午前</th><th>午後</th><th>内容</th><th>削除</th>
        </tr>
        <tbody>
{for $v=0 to $i}
    <tr id="todo_{$params.id[$v]}" data-id= {$params.id[$v]}>
        <td>{$params.id[$v]}</td>
        <td>{$params.name[$v]}</td><td>{$params.kana[$v]}</td>
        <td>{$params.sex[$v]}</td><td>{$params.city[$v]}</td><td>{$params.email[$v]}</td>
        <td>{$params.tel[$v]}</td><td>{$params.am[$v]}</td><td>{$params.pm[$v]}</td>
        <td>{nl2br($params.naiyou[$v])}</td>
            <td class="delete_todo close" type="button" >
                &times;
            </td>
    </tr>
{/for}
        </tbody>
    </thead>
</table>
<button class="btn btn-default center-block"><a href= "home.php">HOME</a></button>
<!-- <a href= "index.php">HOME</a> -->

<input type="hidden" id="token" value={$_SESSION.token}>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="JS/delete.js"></script>
