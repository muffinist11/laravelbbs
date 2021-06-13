<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/bbs.css') }}">
    <title>ひとこと掲示板</title>
</head>
<body>
    <h1>TECH I.S. 掲示板</h1>

    <form method="post" action="add">

    @csrf
        <div class="usernameWrapper">
            <div class="form-group">
                <label for="name">表示名</label>
                <input type="text" id="name" name="name" class="form-control username">
                <span style="color:red;"> @error('name') {{ $message }} @enderror</span>
            </div>
        </div> 
        <div class ="messageWrapper">
            <div class="form-group">
                <label for="message">ひとことメッセージ</label>
                <textarea name="message" id="message" class="form-control"></textarea>
                <span style="color:red">@error('message') {{ $message }} @enderror</span>
            </div>
        </div>
        <div class="btnWrapper">
            <button type="submit" class="btn btn-primary">書き込む</button>
        </div>
    </form>

    <div class="bodyWrapper">
        @foreach ($bbs_data as $data)
            <div class="messageRow">
                <div class="message">
                    <div class="user_id">
                        <p>NO.{{ $data->id }}</p>
                    </div>
                    <div class="user_name">
                        <p>NAME:{{ $data->view_name }}</p>
                    </div>
                    <div class="user_message">
                        <p>{{ $data->message }}</p>
                    </div>
                    <div class="timestanp">
                        <p>{{ $data->created_at }}</p>
                    </div>
                    <div class="user_delete">
                        <button class="btn btn-danger" 
                        onclick="bbs_delete('{{ $data->id }}')">削除</button>
                    </div>
                </div>
            </div>
        @endforeach
        {{ $bbs_data->links() }}
    </div>
    <script>
        function bbs_delete(id){
            var bbs_id = id
            if(window.confirm('削除しますか？')){
                alert('削除しました');
                location.href = "/bbs_delete/" + bbs_id;
            }
        }
    </script>


</body>
</html>