

<table >
    <tbody>
    <th>id</th><th>氏名</th><th>氏名（カナ）</th><th>性別</th><th>住所</th>
        <th>アドレス</th><th>電話番号</th><th>午前</th><th>午後</th><th>内容</th>

    <tr>
        <td>{$user.id}</td><td>{$user.name}</td><td>{$user.kana}</td>
        <td>{$user.sex}</td><td>{$user.city}</td><td>{$user.email}</td>
        <td>{$user.tel}</td><td>{$user.am}</td><td>{$user.pm}</td>
        <td>{$user.naiyou}</td>
    </tr>
    </tbody>
</table>
<br>
<form action="reply.php">
    <input type="text" name="name">

</form>
