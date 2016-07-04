
<div class="container">
    <h2>入力内容をご確認ください</h2>

    <fieldset>
        <legend>入力内容</legend>
        <table class="table table-striped table-bordered table-hover table-condensed">
            <tbody>
                <tr>
                    <td>お名前</td>
                    <td>{$params.name|escape:'html':'UTF-8'}</td>
                </tr>
                <tr>
                    <td>お名前（カナ）</td>
                    <td>{$params.kana|escape:'html':'UTF-8'}</td>
                </tr>
                <tr>
                    <td>性別</td>
                    <td>{$params.sex_str|escape:'html':'UTF-8'}</td>
                </tr>
                <tr>
                    <td>お住まいの県</td>
                    <td>{$params.city|escape:'html':'UTF-8'}</td>
                </tr>
                <tr>
                    <td>メールアドレス</td>
                    <td>{$params.email|escape:'html':'UTF-8'}</td>
                </tr>
                <tr>
                    <td>TEL</td>
                    <td>{$params.tel|escape:'html':'UTF-8'}</td>
                </tr>
                <tr>
                    <td>連絡時間帯</td>
                    <td>
                        {$params.am_str|escape:'html':'UTF-8'}
                        {$params.pm_str|escape:'html':'UTF-8'}
                    </td>
                </tr>
                <tr>
                    <td>内容</td>
                    <td>{$params.naiyou|escape:'html':'UTF-8'|nl2br}</td>
                </tr>
            </tbody>
        </table>
    </fieldset>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm3 col-xs-5"></div>
        <div class="col-sm2 col-xs-1">
            <form  action="index.php" method="post" >
                <input type="hidden" name="name" value="{$params.name|escape:'html':'UTF-8'}">
                <input type="hidden" name="kana" value="{$params.kana|escape:'html':'UTF-8'}">
                <input type="hidden" name="sex" value="{$params.sex|escape:'html':'UTF-8'}">
                <input type="hidden" name="city" value="{$params.city_str|escape:'html':'UTF-8'}">
                <input type="hidden" name="email" value="{$params.email|escape:'html':'UTF-8'}">
                <input type="hidden" name="tel" value="{$params.tel|escape:'html':'UTF-8'}">
                <input type="hidden" name="am" value="{$params.am_str|escape:'html':'UTF-8'}">
                <input type="hidden" name="pm" value="{$params.pm_str|escape:'html':'UTF-8'}">
                <input type="hidden" name="naiyou" value="{$params.naiyou|escape:'html':'UTF-8'}">
                <input type="submit" class="btn btn-primary" value="訂正">
            </form>
        </div>

        <div class="col-sm2 col-xs-1">
            <form  action="transmit.php" method="post">
                <input type="hidden" name="name" value="{$params.name|escape:'html':'UTF-8'}">
                <input type="hidden" name="kana" value="{$params.kana|escape:'html':'UTF-8'}">
                <input type="hidden" name="sex" value="{$params.sex_str|escape:'html':'UTF-8'}">
                <input type="hidden" name="city" value="{$params.city|escape:'html':'UTF-8'}">
                <input type="hidden" name="email" value="{$params.email|escape:'html':'UTF-8'}">
                <input type="hidden" name="tel" value="{$params.tel|escape:'html':'UTF-8'}">
                <input type="hidden" name="am" value="{$params.am_str|escape:'html':'UTF-8'}">
                <input type="hidden" name="pm" value="{$params.pm_str|escape:'html':'UTF-8'}">
                <input type="hidden" name="naiyou" value="{$params.naiyou|escape:'html':'UTF-8'}">
                <!-- 管理者メール -->
                <input type="hidden" name="kanri" value="kajikajiwara1@yahoo.co.jp">

                <input type='submit' class="btn btn-primary" value='送信'>
            </form>
        </div>
        <div class="col-sm3 col-xs-5"></div>
    </div>
</div>
