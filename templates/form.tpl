<div class="center-block" style="text-align: center;"><strong>お問い合わせフォーム＊は必須入力です。</strong></div>

<form action="post.php" method="post" class="form-horizontal" style="margin-bottom:15px;">
<div class="container">

    <div class="form-group" style ="margin-bottom: 5px;">
        <div class="col-sm-4">
            <label for="user" class="control-label">お名前*</label>
            {if ($params.errors.name)}
            <label class="text-danger">未入力！</label>
            {/if}
            <input id="user" type="text" name="name" class="form-control input-sm" placeholder="名前" value= {if $params.name}"{$params.name|escape:'html':'UTF-8'}"{/if} >
        </div>
    </div>

    <div class="form-group" style ="margin-bottom: 5px;">
        <div class="col-sm-4">
            <label for="kana" class="control-label">お名前（カナ）*</label>
            {if $params.errors.kana}
            <label class="text-danger">未入力！</label>
            {/if}
            {if $params.errors.katakana}
            <label class="text-danger">カタカナで入力してください！</label>
            {/if}
            <input id="kana" type="text" name="kana" class="form-control input-sm" placeholder="名前(カナ)" value="{$params.kana|escape:'html':'UTF-8'}" >
        </div>
    </div>

    <div class="form-group" style ="margin-bottom: 5px;">
        <div class="col-sm-4">
            <label for="" class="control-label">性別</label>
            <div class="radio">
                {html_radios  name='sex' options=$sex selected={$params.sex|escape:'html':'UTF-8'} label_ids=true}
            </div>
        </div>
    </div>

    <div class="form-group" style ="margin-bottom: 5px;">
        <div class="col-sm-2">
            <label for="city" class="control-label">お住まいの県</label>
            {html_options id="city" class="form-control input-sm" name="city" options=$city selected={$params.city_str|escape:'html':'UTF-8'}}
        </div>
    </div>

    <div class="form-group" style ="margin-bottom: 5px;">
        <div class="col-sm-4">
            <label for="email" class="control-label">メールアドレス*</label>
            {if $params.errors.email}
            <label class="text-danger">アドレスが正しくありません</label>
            {/if}
            <input id="email" type="text" name="email" class="form-control input-sm" placeholder="メールアドレス" value="{$params.email|escape:'html':'UTF-8'}" >
        </div>
    </div>

    <div class="form-group" style ="margin-bottom: 5px;">
        <div class="col-sm-4">
            <label for="tel" class="control-label">TEL*</label>
            {if $params.errors.tel}
            <label class="text-danger">電話番号が正しくありません</label>
            {/if}
            <input id="tel" type="tel" name="tel" class="form-control input-sm" placeholder="電話番号" value="{$params.tel|escape:'html':'UTF-8'}" >
        </div>
    </div>

    <div class="form-group" style ="margin-bottom: 5px;">
        <div class="col-sm-4">
            <label for="time" class="control-label">連絡時間帯</label>
            <div class="checkbox">
                {html_checkboxes name="am" options=$am selected={$params.am|escape:'html':'UTF-8'}}
                {html_checkboxes name="pm" options=$pm selected={$params.pm|escape:'html':'UTF-8'}}
            <!-- </div>
            <div class="checkbox"> -->
            </div>
        </div>
    </div>


    <div class="form-group" style ="margin-bottom: 5px;">
        <div class="col-sm-4">
            <label for="naiyou" class="control-label">内容</label><br>
            <textarea  id="naiyou" class="form-control" name="naiyou" cols="80" rows="3">{$params.naiyou|escape:'html':'UTF-8'}</textarea >
        </div>
    </div>

<input type="submit" class="btn btn-primary" value="確認">
</form>


    <!-- <a href = "mgs.php" id="mgs" class="btn btn-primary pull-right" data-toggle="modal">管理画面</a> -->

</div>
